<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('service_id')->unsigned();
            
            $table->string('refereance');
            
            $table->float('total');
            
            $table->integer('tax');
            
            $table->string('deliveryTerms');
            
            $table->string('deliveryTime');
            
            $table->string('paymentType');
            
            $table->string('validTime');
            
            $table->string('commercialTerms');
            
            $table->bigInteger('authorizedPersonId')->unsigned();

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
        Schema::dropIfExists('service_offers');
    }
}
