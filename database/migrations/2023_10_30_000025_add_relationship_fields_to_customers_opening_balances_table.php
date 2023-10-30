<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCustomersOpeningBalancesTable extends Migration
{
    public function up()
    {
        Schema::table('customers_opening_balances', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_9164953')->references('id')->on('crm_customers');
        });
    }
}
