<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeBankInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_bank_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(true);
            $table->integer('emp_id')->unsigned(true);
            $table->string('bank_name')->nullable(true);
            $table->string('branch_name')->nullable(true);
            $table->string('account_name')->nullable(true);
            $table->string('account_number')->nullable(true);
            $table->timestamps();
        });

        Schema::table('employee_bank_infos', function($table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('employee_bank_infos', function($table){
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
        Schema::dropIfExists('employee_bank_infos');
    }
}
