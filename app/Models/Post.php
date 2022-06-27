<?php

namespace App\Models;

use App\Models\User;
use App\Scopes\Tenant\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\TenantTrait;

class Post extends Model
{
    use HasFactory;
    use TenantTrait;
    
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'image'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
