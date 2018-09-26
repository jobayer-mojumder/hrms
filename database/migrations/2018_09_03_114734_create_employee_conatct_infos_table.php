<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeConatctInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_contact_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(true);
            $table->integer('emp_id')->unsigned(true);
            $table->text('present_address')->nullable(false);
            $table->string('city')->nullable(false);
            $table->string('country')->nullable(false);
            $table->string('mobile')->nullable(false);
            $table->string('phone')->nullable(true);
            $table->timestamps();
        });

        Schema::table('employee_contact_infos', function($table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('employee_contact_infos', function($table){
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
        Schema::dropIfExists('employee_contact_infos');
    }
}
