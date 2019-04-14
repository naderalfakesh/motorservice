<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //activating foreign keys check
        DB::statement('SET FOREIGN_KEY_CHECKS=1');



        Schema::table('service_pictures', function($table){
            $table->foreign('serviceId')->references('id')->on('services');

        });

        Schema::table('purchase_offers', function($table){
            $table->foreign('companyId')->references('id')->on('companies');
            $table->foreign('personId')->references('id')->on('users');
            $table->foreign('userId')->references('id')->on('users');

        });

        Schema::table('purchase_orders', function($table){
            $table->foreign('companyId')->references('id')->on('companies');
            $table->foreign('personId')->references('id')->on('users');
            $table->foreign('userId')->references('id')->on('users');

        });

        Schema::table('product_service', function($table){
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('service_id')->references('id')->on('services');

        });
        Schema::table('company_addresses', function($table){
            $table->foreign('company_id')->references('id')->on('companies');

        });

        Schema::table('company_service', function($table){
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('company_id')->references('id')->on('companies');

        });

        Schema::table('contact_service', function($table){
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->foreign('service_id')->references('id')->on('services');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //overriding foreign keys temporarly
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Schema::table('service_pictures', function($table){
        //     $table->dropForeign(['serviceId']);

        // });

        // Schema::table('purchase_offers', function($table){
        //     $table->dropForeign(['companyId']);
        //     $table->dropForeign(['personId']);
        //     $table->dropForeign(['userId']);

        // });

        // Schema::table('purchase_orders', function($table){
        //     $table->dropForeign(['companyId']);
        //     $table->dropForeign(['personId']);
        //     $table->dropForeign(['userId']);

        // });

        // Schema::table('product_service', function($table){
        //     $table->dropForeign(['product_id']);
        //     $table->dropForeign(['service_id']);

        // });
        // Schema::table('company_addresses', function($table){
        //     $table->dropForeign(['company_id']);

        // });

        // Schema::table('company_service', function($table){
        //     $table->dropForeign(['service_id']);
        //     $table->dropForeign(['company_id']);

        // });
        // Schema::table('contact_service', function($table){
        //     $table->dropForeign(['service_id']);
        //     $table->dropForeign(['contact_id']);

        // });
    }
}
