<?php

namespace App\Http\Middleware\Tenants;

use App\Tenant\ManagerTenant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantFileSystem
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()) {
           $this->setFilesystemRoot();
        }
        return $next($request);
    }

    public function setFilesystemRoot()
    {
        $tenant = app(ManagerTenant::class)->getTenant();
        config()->set('filesystems.disks.tenant.root', "app/public/tenants/{$tenant->uuid}");
    }
}
