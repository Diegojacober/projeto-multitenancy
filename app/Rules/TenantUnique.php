<?php

namespace App\Rules;

use App\Tenant\ManagerTenant;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class TenantUnique implements Rule
{
    private $table,$col,$val;
    
    public function __construct($table, $val = null,$col = 'id')
    {
        $this->table = $table;
        $this->col = $col;
        $this->val = $val;
    }

    public function passes($attribute, $value)
    {
        $tenant = app(ManagerTenant::class)->getTenantIdentify();
        $result = DB::table($this->table)->where($attribute,$value)->where('tenant_id',$tenant)->first();

        if($result && $result->{$this->col} == $this->val) {
            return true;
        }

        return is_null($result);
    }

    public function message()
    {
        return "O valor para :attribute já existe";
    }
}
