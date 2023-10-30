<?php

namespace App\Http\Requests;

use App\Models\StockHistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStockHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stock_history_create');
    }

    public function rules()
    {
        return [
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
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
            ],
            'amount' => [
                'required',
            ],
        ];
    }
}
