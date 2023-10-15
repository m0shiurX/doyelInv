<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsTable extends Migration
{
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('invoice_no')->unique();
            $table->date('invoice_date')->nullable();
            $table->integer('quantity');
            $table->float('weight', 15, 2);
            $table->decimal('unit_price', 15, 2);
            $table->decimal('total_amount', 15, 2);
            $table->string('paid_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
