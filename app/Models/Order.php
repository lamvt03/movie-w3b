<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'vnp_TxnRef',
        'vnp_OrderInfo',
        'vnp_PayDate',
        'vnp_ResponseCode',
        'vnp_Amount',
        'vnp_BankCode',
        'vnp_TransactionNo',
        'userId',
        'videoId'
    ];

    public $timestamps = false;
}
