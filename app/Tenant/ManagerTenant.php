<?php
namespace App\Tenant;

use App\Models\Models\Tenant;

class ManagerTenant
{
    public function getTenantIdentify()
    {
        return auth()->user()->tenant->id;
    }

    public function getTenant(): Tenant
    {
        return auth()->user()->tenant;
    }

}