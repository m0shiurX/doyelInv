<?php

namespace App\Http\Requests;

use App\Models\Production;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('production_create');
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
            'quantity_produced' => [
                'required',
                'integer',
                'min:1',
                'max:2147483647',
            ],
            'weight_produced' => [
                'numeric',
                'required',
            ],
            'production_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'total_amount' => [
                'required',
            ],
        ];
    }
}
