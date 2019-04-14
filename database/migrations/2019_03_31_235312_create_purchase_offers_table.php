<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_offers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title');

            $table->bigInteger('companyId')->unsigned();
            
            $table->bigInteger('personId')->unsigned();  //seller
            
            $table->string('deliveryTime');

            $table->string('paymentType');

            $table->float('totalPrice');

            $table->float('tax');

            $table->string('offerReferance');

            $table->string('status'); // accepted , denied , ignored

            $table->bigInteger('userId')->unsigned();  // buyer
            
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
        Schema::dropIfExists('purchase_offers');
    }
}
