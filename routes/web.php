<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }
    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/reports', 'ReportsController@index')->name('reports');
    Route::post('/reports', 'ReportsController@index')->name('reports');
    Route::get('/reports/statement/{customerId}', 'ReportsController@getCustomerStatement')->name('reports.statement');


    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Crm Status
    Route::delete('crm-statuses/destroy', 'CrmStatusController@massDestroy')->name('crm-statuses.massDestroy');
    Route::resource('crm-statuses', 'CrmStatusController');

    // Crm Customer
    Route::delete('crm-customers/destroy', 'CrmCustomerController@massDestroy')->name('crm-customers.massDestroy');
    Route::resource('crm-customers', 'CrmCustomerController');

    // Crm Note
    Route::delete('crm-notes/destroy', 'CrmNoteController@massDestroy')->name('crm-notes.massDestroy');
    Route::resource('crm-notes', 'CrmNoteController');

    // Crm Document
    Route::delete('crm-documents/destroy', 'CrmDocumentController@massDestroy')->name('crm-documents.massDestroy');
    Route::post('crm-documents/media', 'CrmDocumentController@storeMedia')->name('crm-documents.storeMedia');
    Route::post('crm-documents/ckmedia', 'CrmDocumentController@storeCKEditorImages')->name('crm-documents.storeCKEditorImages');
    Route::resource('crm-documents', 'CrmDocumentController');

    // Sell
    Route::delete('sells/destroy', 'SellController@massDestroy')->name('sells.massDestroy');
    Route::resource('sells', 'SellController');

    // Payments
    Route::delete('payments/destroy', 'PaymentsController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentsController', ['except' => ['show']]);


    // Stock
    Route::resource('stocks', 'StockController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Production
    Route::delete('productions/destroy', 'ProductionController@massDestroy')->name('productions.massDestroy');
    Route::resource('productions', 'ProductionController');

    // Customer Due
    Route::resource('customer-dues', 'CustomerDueController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Stock Wastage
    Route::resource('stock-wastages', 'StockWastageController', ['except' => ['edit', 'update', 'show', 'destroy']]);
    // Stock History
    Route::resource('stock-histories', 'StockHistoryController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);
    // routes/web.php
    Route::get('/update-stock-history', 'StockHistoryController@updateStockHistory');

    // Customers Opening Balance
    Route::resource('customers-opening-balances', 'CustomersOpeningBalanceController', ['except' => ['edit', 'update', 'show', 'destroy']]);
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
