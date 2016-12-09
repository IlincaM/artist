<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('subcategory_id')->unsigned()->nullable();
            $table->boolean('show_nav');

            $table->string('title');
            $table->string('body');
            $table->string('slug')->unique();

            $table->string('dimension')->nullable();
            $table->integer('year')->nullable();
            $table->integer('price')->nullable();
            $table->string('img')->nullable();


            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('posts', function($table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });
        Schema::table('posts', function($table) {
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('posts');
    }

}
