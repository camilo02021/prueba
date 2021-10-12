<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_book', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('book_id')->unsigned();
            $table->foreign('book_id')->references('id')
            ->on('books')->onDelete('cascade');

            $table->string('book_slug', 100)->nullable();
            $table->foreign('book_slug')->references('slug')
            ->on('books')->onDelete('cascade');

            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')
            ->on('category')->onDelete('cascade');

            $table->string('category_slug', 100);
            $table->foreign('category_slug')->references('slug')
            ->on('category')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_book');
    }
}
