<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderList_id',
        'user_id',
        'cart_id',
        'type',
        'number',
        'amount',
        'order_code'
    ];
}
