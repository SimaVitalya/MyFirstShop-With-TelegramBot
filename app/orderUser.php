<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  orderUser extends Model
{
    protected $guarded = false;
    protected $table= 'order_users';

    public function order()
    {
        return $this->hasMany(Order::class);
    }

}
