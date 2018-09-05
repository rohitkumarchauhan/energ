<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
            $table->integer('parent_id')->default(0);
            $table->integer('category_id')->default(0);
            $table->timestamps();
        });


        Schema::create('design_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sub_category_id')->nullable();
            $table->text('design_id')->nullable();
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
        Schema::dropIfExists('sub_categories');
        Schema::dropIfExists('design_options');
    }
}
