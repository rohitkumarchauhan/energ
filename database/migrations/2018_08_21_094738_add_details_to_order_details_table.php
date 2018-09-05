<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetailsToOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            //
            $table->integer('fabric_id');
            $table->integer('linining_material_id');
            $table->text('measurement');
            $table->integer('back_id')->nullable();
            $table->integer('side_id')->nullable();
            $table->string('style');
            $table->string('monogram');
            $table->string('lining_color');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropColumn('fabric_id');
            $table->dropColumn('linining_material_id');
            $table->dropColumn('measurement');
            $table->dropColumn('side_id');
            $table->dropColumn('monogram');
            $table->dropColumn('lining_color');
        });
    }
}
