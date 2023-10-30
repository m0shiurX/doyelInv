<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersOpeningBalancesTable extends Migration
{
    public function up()
    {
        Schema::create('customers_opening_balances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount', 15, 2);
            $table->date('calculation_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
