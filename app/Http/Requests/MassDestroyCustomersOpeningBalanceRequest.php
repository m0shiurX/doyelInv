<?php

namespace App\Http\Requests;

use App\Models\CustomersOpeningBalance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCustomersOpeningBalanceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customers_opening_balance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:customers_opening_balances,id',
        ];
    }
}
