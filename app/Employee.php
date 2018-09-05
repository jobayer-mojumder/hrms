<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function user() {
        return $this->hasOne(User::class, 'emp_id', 'id');
    }

    public function officeinfo() {
        return $this->hasOne(Officeinfo::class, 'emp_id', 'id');
    }

    public function contactinfo() {
        return $this->hasOne(Contactinfo::class, 'emp_id', 'id');
    }

    public function documentinfo() {
        return $this->hasOne(Documentinfo::class, 'emp_id', 'id');
    }
}
