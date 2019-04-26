<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('service_id')->unsigned();

            $table->bigInteger('company_id')->unsigned();
            
            $table->bigInteger('contact_id')->unsigned();

            $table->bigInteger('authorizedPersonId')->unsigned();
            
            $table->string('referance');
            
            $table->float('total');
            
            $table->float('totalTax');
            
            $table->float('totalCurrency');
            
            $table->string('deliveryTerms');
            
            $table->string('deliveryTime');
            
            $table->string('paymentType');
            
            $table->string('validTime');
            
            $table->string('commercialTerms');
            
            $table->string('status');

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
        Schema::dropIfExists('service_orders');
    }
}
