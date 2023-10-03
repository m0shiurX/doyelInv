<?php

namespace Database\Seeders;

use App\Models\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => 1,
                'name'       => 'Lead',
                'created_at' => '2023-10-03 08:30:44',
                'updated_at' => '2023-10-03 08:30:44',
            ],
            [
                'id'         => 2,
                'name'       => 'Customer',
                'created_at' => '2023-10-03 08:30:44',
                'updated_at' => '2023-10-03 08:30:44',
            ],
            [
                'id'         => 3,
                'name'       => 'Partner',
                'created_at' => '2023-10-03 08:30:44',
                'updated_at' => '2023-10-03 08:30:44',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
