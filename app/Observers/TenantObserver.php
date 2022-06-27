<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\tenant;

class TenantObserver
{
    public function creating(tenant $tenant)
    {
        $tenant->uuid = Str::uuid();
    }

    /**
     * Handle the tenant "updated" event.
     *
     * @param  \App\Models\tenant  $tenant
     * @return void
     */
    public function updating(tenant $tenant)
    {
        //
    }

    /**
     * Handle the tenant "deleted" event.
     *
     * @param  \App\Models\tenant  $tenant
     * @return void
     */
    public function deleted(tenant $tenant)
    {
        //
    }

    /**
     * Handle the tenant "restored" event.
     *
     * @param  \App\Models\tenant  $tenant
     * @return void
     */
    public function restored(tenant $tenant)
    {
        //
    }

    /**
     * Handle the tenant "force deleted" event.
     *
     * @param  \App\Models\tenant  $tenant
     * @return void
     */
    public function forceDeleted(tenant $tenant)
    {
        //
    }
}
