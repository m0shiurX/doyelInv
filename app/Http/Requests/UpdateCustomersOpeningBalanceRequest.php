<?php

namespace App\Http\Requests;

use App\Models\CustomersOpeningBalance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCustomersOpeningBalanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customers_opening_balance_edit');
    }

    public function rules()
    {
        return [
            'customer_id' => [
                'required',
                'integer',
            ],
            'amount' => [
                'required',
            ],
            'calculation_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
