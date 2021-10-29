<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [ 'paymentId', 'orderId','buyer', 'address', 'cart', 'amount', 'discount', 'status', 'remarks' ];

    public function scopeSearch($query, $val){
        return $query
        ->where('orders.orderId', 'like', '%'.$val.'%')
        ->Orwhere('orders.status', 'like', '%'.$val.'%')
        ->Orwhere('a.name', 'like', '%'.$val.'%');
    }
}
