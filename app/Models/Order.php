<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        'orderID',
        'table_id',
        'amount',
        'status',
        'waiter',
        'payment_method',
        'done_prepare_at',
        'serve_time',
    ];

}