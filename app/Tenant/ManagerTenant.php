<?php

namespace App\Tenant;

use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;

class ManagerTenant
{
    public function getTenantIdentify()
    {
        return $this->getTenant()->id;
    }

    public function getTenant() : Tenant
    {
        return Auth::user()->tenant;
    }
}
