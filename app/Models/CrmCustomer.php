<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CrmCustomer extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'crm_customers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'status_id',
        'email',
        'phone',
        'address',
        'account_no',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $appends = ['due'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function customerSells()
    {
        return $this->hasMany(Sell::class, 'customer_id', 'id');
    }

    public function customerPayments()
    {
        return $this->hasMany(Payment::class, 'customer_id', 'id');
    }

    public function unPaidSells()
    {
        return $this->hasMany(Sell::class, 'customer_id', 'id')->where('paid_status', 'unpaid');
    }

    public function getDueAttribute()
    {
        return $this->withSum('unPaidSells', 'total_amount')->get();
    }

    public function status()
    {
        return $this->belongsTo(CrmStatus::class, 'status_id');
    }
}
