Changes to be made:
[x] Stock management (Quantity, weight, amount)
[x] Waste removal from stock
[x] Previous due entry for customers
[x] Remove unit price from sell
[x] Customers account number entry
[x] Payment date to be added for manual date entry
[] Reports to be generated for daily, monthly and yearly
[] Reports to be sent by email and automatically backed up in server.
[] SMS notification integration

App\Models\CrmCustomer::where('id',1)->withTrashed()->get();
App\Models\CustomerDue::where('id',1)->delete();
App\Models\CustomerDue::where('id',1)->get();
