<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(true);
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->date('dob')->nullable(false);
            $table->string('gender')->nullable(false);
            $table->string('marital_status')->nullable(false);
            $table->string('father_name')->nullable(false);
            $table->string('nationality')->nullable(false);
            $table->string('nid')->nullable(true);
            $table->string('photo')->nullable(true);
            $table->string('photo_path')->nullable(true);
            $table->tinyInteger('status')->nullable(false)->default(1);

            $table->timestamps();
        });

        Schema::table('employees', function($table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
