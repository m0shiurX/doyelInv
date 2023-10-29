<?php

namespace App\Http\Requests;

use App\Models\StockWastage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStockWastageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stock_wastage_create');
    }

    public function rules()
    {
        return [
            'quantity_wasted' => [
                'required',
                'integer',
                'min:1',
                'max:2147483647',
            ],
            'weight_wasted' => [
                'numeric',
                'required',
            ],
            'amount_wasted' => [
                'required',
            ],
            'reason' => [
                'string',
                'nullable',
            ],
            'wastage_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
