<?php

namespace App\Tenant\Traits;

use App\Observers\TenantObserver;
use App\Scope\Tenant\TenantScope;

trait TenantTrait {

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new TenantScope);

        static::observe(new TenantObserver);
    }

}