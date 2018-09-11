<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $table = 'employee_payroll';

    public function department() {
        return $this->belongsTo(Employee::class);
    }
}
