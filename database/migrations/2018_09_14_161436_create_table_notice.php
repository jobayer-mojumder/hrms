<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNotice extends Migration
{

    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->unsigned(true);
            $table->string('title');
            $table->text('short_details')->nullable(true);
            $table->text('details')->nullable(false);
            $table->integer('publish')->nullable(false);
            $table->timestamps();
        });

        Schema::table('notices', function($table){
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notices');
    }
}
