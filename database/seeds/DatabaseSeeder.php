<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        // cleaning tables
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();printf("Truncating users ... \n");
        DB::table('companies')->truncate();printf("Truncating companies ... \n");
        DB::table('services')->truncate();printf("Truncating services ... \n");
        DB::table('products')->truncate();printf("Truncating products ... \n");
        DB::table('product_service')->truncate();printf("Truncating product_service ... \n");
        DB::table('company_service')->truncate();printf("Truncating company_service ... \n");
        DB::table('contacts')->truncate();printf("Truncating contacts ... \n");
        DB::table('contact_service')->truncate();printf("Truncating contact_service ... \n");


        DB::statement('SET FOREIGN_KEY_CHECKS=1');


        // seeding parents
        $this->call(userSeeder::class);
        $this->call(serviceSeeder::class);
        $this->call(productSeeder::class);
        $this->call(companySeeder::class);
        $this->call(contactSeeder::class);

        // seeding company service relation
        $role=array('enduser','requestingCompany','wegBranch');
        for ($i=0; $i < 50 ; $i++) {
            $randkeys=array_rand($role);
            DB::table('company_service')->insert(
                [
                    'company_id' => App\company::select('id')->orderByRaw("RAND()")->first()->id,
                    'service_id' => App\service::select('id')->orderByRaw("RAND()")->first()->id,
                    'role' => $role[$randkeys]
                ]
            );
        }

        // seeding contact service relation
        $role=array('enduser','personal','warrantygiver','personalincontact');
        for ($i=0; $i < 50 ; $i++) {
            $randkeys=array_rand($role);
            DB::table('contact_service')->insert(
                [
                    'contact_id' => App\contact::select('id')->orderByRaw("RAND()")->first()->id,
                    'service_id' => App\service::select('id')->orderByRaw("RAND()")->first()->id,
                    'role' => $role[$randkeys]
                ]
            );
        }

        // seeding product service relation
        for ($i=0; $i < 50 ; $i++) {
            DB::table('product_service')->insert(
                [
                    'product_id' => App\product::select('id')->orderByRaw("RAND()")->first()->id,
                    'service_id' => App\service::select('id')->orderByRaw("RAND()")->first()->id,

                ]
            );
        }






    }
}
