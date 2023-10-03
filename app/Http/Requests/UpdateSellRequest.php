<?php

namespace App\Http\Requests;

use App\Models\Sell;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSellRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sell_edit');
    }

    public function rules()
    {
        return [
            'invoice_no' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:sells,invoice_no,' . request()->route('sell')->id,
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
                'min:-2147483648',
                'max:2147483647',
            ],
            'weight' => [
                'numeric',
                'required',
                'min:0',
            ],
            'unit_price' => [
                'required',
            ],
            'total_amount' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'paid_status' => [
                'required',
            ],
        ];
    }
}
