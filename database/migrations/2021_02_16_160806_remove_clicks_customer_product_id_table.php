<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveClicksCustomerProductIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clicks', function (Blueprint $table) {
            $table->dropColumn('click_user_id');
            $table->dropColumn('click_customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clicks', function (Blueprint $table) {
            $table->integer('click_user_id')->nullable();
            $table->integer('click_customer_id')->unsigned();
        });
       
        
    }
}
