<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewClickIdsToClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clicks', function ($table) {
            $table->integer('click_auth_user_id')->nullable();
            $table->integer('click_product_user_id')->unsigned();
           

        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clicks', function ($table) {
            $table->dropColumn('click_auth_user_id');
            $table->dropColumn('click_product_user_id');
        });
    }
}
