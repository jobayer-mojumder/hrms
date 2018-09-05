<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Officeinfo extends Model
{
    protected $table = 'employee_official_infos';

    public function designation() {
        return $this->belongsTo(Designation::class);
    }
}
