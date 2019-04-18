<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');

            // $table->bigInteger('enduserId')->unsigned();// change it to user roles

            $table->text('failureDescription');

            $table->text('rootCause');

            $table->text('warrantyStatus');

            $table->string('warrantyGENumber');

            $table->dateTime('WarrantyAcceptingDate');

            // $table->bigInteger('personInContactId')->unsigned(); // change it to user reoles

            // $table->bigInteger('warrantyGiverPersonId')->unsigned(); // change it to user reoles

            $table->text('serviceAction');

            $table->float('costAmount'); // change it to the active invoice

            $table->string('costCurrency'); // change it to the active invoice

            $table->float('taxAmount'); // change it to the active invoice

            $table->string('bankBranch'); // change it to the active invoice

            // $table->text('personalIds');// change it to user roles

            //$table->text('activePictursIds'); // change it to active pictures

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
        Schema::dropIfExists('services');
    }
}
