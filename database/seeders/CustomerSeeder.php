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
            'first_name' => 'Anonymous',
            'last_name' => 'Customer',
            'address' => 'Bogura',
            'phone' => '88017XXXXXXXX',
            'account_no' => '000',
            'email' => 'anonymous@gmail.com',
            'status_id' => 1,
        ]);
    }
}
