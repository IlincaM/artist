<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('subcategory_id')->unsigned()->nullable();
            $table->integer('type-page_id')->unsigned();

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

        Schema::table('pages', function($table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });
        Schema::table('pages', function($table) {
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
        });
        Schema::table('pages', function($table) {
            $table->foreign('type-page_id')->references('id')->on('type-page');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('pages');
    }

}
