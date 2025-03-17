<?php

namespace App\Models;
use App\Models\BillDetail;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bill';

    protected $fillable = [
        'id_customer',
        'date_order',
        'total',
        'payment',
        'note',
    ];

    public function billDetails()
    {
        return $this->hasMany(BillDetail::class, 'id_bill');
    }

    public function customer()
    {
        return $this->hasMany(Customer::class, 'id_customer');
    }
}
