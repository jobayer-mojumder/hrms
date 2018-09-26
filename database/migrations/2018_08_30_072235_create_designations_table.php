<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('designations')){
            Schema::create('designations', function (Blueprint $table) {
                $table->increments('id');
                $table->string('rank')->nullable(false);
                $table->integer('department_id')->unsigned();
                $table->string('name')->nullable(false);
                $table->text('description')->nullable(true);
                $table->timestamps();
            });

            Schema::table('designations', function($table){
                $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('designations');
    }
}
