<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ceo_title', 100)->nullable();
            $table->string('ceo_description', 200)->nullable();
            $table->string('ceo_keywords', 150)->nullable();
            $table->string('name', 100);
            $table->string('slug', 100)->index()->unique();
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->text('description')->nullable();
            $table->boolean('locked')->default(false);
            $table->boolean('is_home')->default(false);
            $table->integer('category_id')->index()->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('pages');
    }
}
