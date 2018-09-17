<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'salary_payments';

    public function employee() {
        return $this->belongsTo(Employee::class, 'emp_id', 'id');
    }
}
