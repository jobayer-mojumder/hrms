<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(true);
            $table->integer('emp_id')->unsigned(true);
            $table->string('appointment')->nullable(true);
            $table->string('cv')->nullable(true);
            $table->string('nid')->nullable(true);

            $table->timestamps();
        });
        
        Schema::table('employee_documents', function($table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('employee_documents', function($table){
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
        Schema::dropIfExists('employee_documents');
    }
}
