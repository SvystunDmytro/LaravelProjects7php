<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('short_name', 255);
            $table->longText('content');
            $table->string('short_discription', 255);

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            
            $table->string('img_path', 255);
            $table->timestamps();

        });

//        Schema::create('news', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('title', 255);
//            $table->string('short_name', 255);
//            $table->text('content');
//            $table->string('short_description', 255);
//            $table->integer('user_id');
//            $table->integer('category_id');
//            $table->string('img_path');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
