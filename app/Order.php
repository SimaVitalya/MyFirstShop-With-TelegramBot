<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = false;
    protected $table = 'orders';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')->withTimestamps();

    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class,'order_id', 'id');
    }

    public function orderUser()
    {
        return $this->hasOne(OrderUser::class, 'id', 'order_user_id');
    }


}
