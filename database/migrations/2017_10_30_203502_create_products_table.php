<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ceo_title', 100)->nullable();
            $table->string('ceo_description', 200)->nullable();
            $table->string('ceo_keywords', 150)->nullable();
            $table->string('name', 100);
            $table->string('slug', 100)->index()->unique();
            $table->string('image')->nullable();
            $table->string('feature_1')->nullable();
            $table->string('feature_2')->nullable();
            $table->text('advantage')->nullable();
            $table->text('information')->nullable();
            $table->text('conduct')->nullable();
            $table->text('produce')->nullable();
            $table->text('coordination')->nullable();
            $table->boolean('locked')->default(false);
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
        Schema::dropIfExists('products');
    }
}
