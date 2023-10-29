<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDuesTable extends Migration
{
    public function up()
    {
        Schema::create('customer_dues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('customer_dues', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
