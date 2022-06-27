<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateFormPostRequest;
use App\Models\Post;
use App\Tenant\ManagerTenant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $model;

    public function __construct(Post $post)
    {
        $this->middleware(['auth','tenant.filesystems']);
        $this->model = $post;
    }
    
    public function index()
    {
        $posts = $this->model->with(['user'])->where('tenant_id',Auth::user()->tenant_id)->paginate();

        return view('posts.index',compact('posts'));
    }

    public function show($id)
    {
        //
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StoreUpdateFormPostRequest $request)
    {
        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $name = Str::slug($request->title,'-');
            $extension = $request->image->extension();
            $nameImage = "$name.$extension";
            $data['image'] = $nameImage;

            $upload = $request->image->storeAs('/tenants/'.app(ManagerTenant::class)->getTenant()->uuid,$nameImage);

            if(!$upload) {
                return redirect()->back()->with('errors',['Falha no Upload']);
            }
        }

        $post = $request->user()->posts()->create($request->validated());

        return redirect()->back()->withSuccess('Cadastro Realizado Com Sucesso');
    }

    public function edit($id)
    {
        $post = $this->model->find($id);

        return view('posts.edit',compact('post'));
    }

    public function update(StoreUpdateFormPostRequest $request,$id)
    {
        $post = $this->model->find($id);

        $post->update($request->validated());

        return redirect()->back()->withSuccess('Atualizado Com Sucesso');
    }
}

