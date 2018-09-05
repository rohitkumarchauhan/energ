<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('type_id')->default(1);
            $table->text('cookie_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('amount')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fabric_id')->nullable();
            $table->integer('cart_id')->nullable();
            $table->integer('linining_material_id')->nullable();
            $table->string('style')->nullable();
            $table->text('measurement')->nullable();
            $table->integer('back_id')->nullable();
            $table->integer('side_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
        Schema::dropIfExists('cart_items');

    }
}
