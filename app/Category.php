<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded=false;
    protected $table='categories';
    public function products()
    {
        return $this->hasMany(Product::class);//
    }
}
