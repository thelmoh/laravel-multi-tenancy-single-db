<?php

namespace App\Rules\Tenant;

use App\Tenant\ManagerTenant;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class TenantUnique implements ValidationRule
{
    private $table, $column, $columnValue;

    public function __construct($table, $column = null, $columnValue = null)
    {
        $this->table = $table;
        $this->column = $column;
        $this->columnValue = $columnValue;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        
        $tenant = app(ManagerTenant::class)->getTenantIdentify();

        $result = DB::table($this->table)
                    ->where($attribute, $value)
                    ->where('tenant_id', $tenant)
                    ->first();

        if (!is_null($result) && $result->{$this->column} != $this->columnValue) {
            $fail('O valor do '.$attribute.' já está em uso.');
        }
    }
}
