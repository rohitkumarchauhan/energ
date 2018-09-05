<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('contact_no')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('contact_no');
            $table->dropColumn('address1');
            $table->dropColumn('address2');
            $table->dropColumn('lat');
            $table->dropColumn('lat');
        });
    }
}
