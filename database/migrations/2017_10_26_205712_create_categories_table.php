<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name', 100);
            $table->string('slug', 100)->index()->unique();
            $table->char('type', 20)->default('post');
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->string('banner')->nullable();
            $table->char('district_cd', 10)->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_home')->default(true);
            $table->boolean('is_page')->default(false);
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
        Schema::dropIfExists('categories');
    }
}
