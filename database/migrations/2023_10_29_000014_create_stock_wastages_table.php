<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockWastagesTable extends Migration
{
    public function up()
    {
        Schema::create('stock_wastages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity_wasted');
            $table->float('weight_wasted', 15, 2);
            $table->decimal('amount_wasted', 15, 2);
            $table->string('reason')->nullable();
            $table->date('wastage_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
