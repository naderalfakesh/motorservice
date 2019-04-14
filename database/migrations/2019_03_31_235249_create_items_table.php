<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('type'); // 1. Purchase order 2. Purchase offer 3. Customer invoice 4. Customer offer

            $table->integer('orderId'); // figure it out withou forign key

            $table->string('productCode');

            $table->text('description');

            $table->integer('amount');

            $table->string('unit');

            $table->float('unitPrice');

            $table->float('discount');

            $table->string('currency');

            $table->string('deliveryTime');

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
        Schema::dropIfExists('items');
    }
}
