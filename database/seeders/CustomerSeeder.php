<?php

namespace Database\Seeders;

use App\Models\CrmCustomer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('crm_customers')->insert([
            'first_name' => 'Customer',
            'last_name' => 'Name',
            'address' => 'Address goes here',
            'phone' => '88017x',
            'acc' => '88017x',
            'email' => Str::random(10) . '@gmail.com',
            'status_id' => 1,
        ]);
    }
}
