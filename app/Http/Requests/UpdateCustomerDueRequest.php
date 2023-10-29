<?php

namespace App\Http\Requests;

use App\Models\CustomerDue;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCustomerDueRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_due_edit');
    }

    public function rules()
    {
        return [
            'customer_id' => [
                'required',
                'integer',
            ],
            'customer_dues' => [
                'required',
            ],
        ];
    }
}
