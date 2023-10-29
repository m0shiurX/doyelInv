<?php

namespace App\Http\Requests;

use App\Models\StockWastage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStockWastageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stock_wastage_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:stock_wastages,id',
        ];
    }
}
