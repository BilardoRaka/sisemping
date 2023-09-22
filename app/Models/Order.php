<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function payment_log()
    {
        return $this->hasOne(PaymentLog::class,'order_id');
    }

    public function renter()
    {
        return $this->belongsTo(Renter::class,'renter_id');
    }
}
