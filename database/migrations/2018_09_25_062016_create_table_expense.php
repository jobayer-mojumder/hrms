<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExpense extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_id')->unsigned(true);
            $table->string('title')->nullable(false);
            $table->double('amount')->nullable(false);
            $table->date('date')->nullable(false);
            $table->text('comments')->nullable(true);
            $table->tinyInteger('status')->default(1)->nullable(false);
            $table->timestamps();
        });

        Schema::table('expenses', function($table){
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
        Schema::dropIfExists('expenses');
    }
}
