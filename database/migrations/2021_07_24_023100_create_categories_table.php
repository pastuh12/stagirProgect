<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('is_published')->default(1);
        });

        Schema::create('categories_galleries', function (Blueprint $table) {
            $table->bigInteger('category_id');
            $table->bigInteger('gallery_id');
        });

        Schema::create('categories_news', function (Blueprint $table) {
            $table->bigInteger('category_id');
            $table->bigInteger('news_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_news');
        Schema::dropIfExists('categories_galleries');
        Schema::dropIfExists('categories');
    }
}
