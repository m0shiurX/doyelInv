<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockWastage extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'stock_wastages';

    protected $dates = [
        'wastage_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'quantity_wasted',
        'weight_wasted',
        'amount_wasted',
        'reason',
        'wastage_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getWastageDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setWastageDateAttribute($value)
    {
        $this->attributes['wastage_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
