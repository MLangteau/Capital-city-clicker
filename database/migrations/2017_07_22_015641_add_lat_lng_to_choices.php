<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLatLngToChoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('choices', function($table){
            $table->float('lat', 10, 6)->nullable();
            $table->float('lng', 10, 6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('choices', function($table){
            $table->dropColumn('lat', 10, 6)->nullable();
            $table->dropColumn('lng', 10, 6)->nullable();
        });
    }
}
