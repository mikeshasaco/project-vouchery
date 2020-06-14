<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserSubscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('subscription_price')->nullable();
            $table->string('stripe_plan')->nullable();
            $table->string('bank_accountname')->nullable();
            $table->integer('bank_routingnumber')->nullable();
            $table->integer('bank_accountnumber')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table){
            $table->dropColumn('subscription_price');
            $table->dropColumn('stripe_plan');
            $table->dropColumn('bank_accountname');
            $table->dropColumn('bank_routingnumber');
            $table->dropColumn('bank_accountnumber');
        });
        
    }
}
