<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {


	public function designation() {
		return $this->hasMany(Designation::class);
	}
}
