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
                'name'       => 'Active',
                'created_at' => '2023-10-03 08:30:44',
                'updated_at' => '2023-10-03 08:30:44',
            ],
            [
                'id'         => 2,
                'name'       => 'Inactive',
                'created_at' => '2023-10-03 08:30:44',
                'updated_at' => '2023-10-03 08:30:44',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
