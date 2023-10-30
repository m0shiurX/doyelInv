<?php

namespace App\Http\Requests;

use App\Models\Sell;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSellRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sell_create');
    }

    public function rules()
    {
        return [
            'invoice_no' => [
                'required',
                'integer',
                'min:0',
                'max:2147483647',
                'unique:sells,invoice_no',
            ],
            'invoice_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'customer_id' => [
                'required',
                'integer',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:0',
                'max:2147483647',
            ],
            'weight' => [
                'numeric',
                'required',
                'min:0',
            ],
            'total_amount' => [
                'required',
                'min:0',
            ],
            'paid_status' => [
                'required',
            ],
        ];
    }
}
