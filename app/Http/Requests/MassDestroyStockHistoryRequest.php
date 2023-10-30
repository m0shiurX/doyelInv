<?php

namespace App\Http\Requests;

use App\Models\StockHistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStockHistoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stock_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:stock_histories,id',
        ];
    }
}
