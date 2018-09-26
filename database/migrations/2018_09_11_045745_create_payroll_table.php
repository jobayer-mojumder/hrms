<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_payroll', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_id')->unsigned(true);
            $table->double('basic_salary')->nullable(false);
            $table->double('house_rent_allowance')->nullable(true);
            $table->double('medical_allowance')->nullable(true);
            $table->double('special_allowance')->nullable(true);
            $table->double('fuel_allowance')->nullable(true);
            $table->double('phone_bill_allowance')->nullable(true);
            $table->double('other_allowance')->nullable(true);
            $table->double('tax_deduction')->nullable(true);
            $table->double('provident_fund')->nullable(true);
            $table->double('other_deduction')->nullable(true);
            $table->double('total_allowance')->nullable(false);
            $table->double('total_deduction')->nullable(false);
            $table->double('gross_salary')->nullable(false);
            $table->double('net_salary')->nullable(false);
            $table->tinyInteger('employment_type')->nullable(false);
            $table->timestamps();
        });

        Schema::table('employee_payroll', function($table){
            $table->foreign('emp_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_payroll');
    }
}
