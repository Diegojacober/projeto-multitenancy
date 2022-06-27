<?php

namespace App\Tenant\Traits;
use App\Scopes\Tenant\TenantScope;

trait TenantTrait
{
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new TenantScope);
    }
}
