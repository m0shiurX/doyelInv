<?php

namespace App\Listeners;

use App\Events\CustomerCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\CustomerDue;

class CreateCustomerDue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CustomerCreated $event): void
    {
        // Check if a customer_due record already exists for this customer
        $customerDue = CustomerDue::where('customer_id', $event->customer->id)->first();

        // Create a new customer_due record if it doesn't exist
        if (!$customerDue) {
            $customerDue = new CustomerDue;
            $customerDue->customer_id = $event->customer->id;
            $customerDue->customer_dues = 0; // Initialize with zero due amount
            $customerDue->save();
        }
    }
}
