<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeOfPageIdToPostsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('type-of-page_id')->unsigned();
            $table->foreign('type-of-page_id')->references('id')->on('type-of-page');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
         Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('type-of-page_id');
        });
    }

}
