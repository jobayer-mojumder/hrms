<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeOfficialInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_official_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(true);
            $table->integer('emp_id')->unsigned(true);
            $table->string('employee_id')->nullable(false);
            $table->string('email')->nullable(false)->unique();
            $table->integer('designation_id')->unsigned();
            $table->date('joining_date')->nullable(true);
            $table->timestamps();
        });

        Schema::table('employee_official_infos', function($table){
            $table->foreign('designation_id')->references('id')->on('designations');
        });

        Schema::table('employee_official_infos', function($table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('employee_official_infos', function($table){
            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_official_infos');
    }
}
