<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stock;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stock = [
            [
                'id'             => 1,
                'quantity'           => 0,
                'weight'          => 0,
                'amount'       => 0,
            ],
        ];

        Stock::insert($stock);
    }
}
