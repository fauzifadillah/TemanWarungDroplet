<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['products_id','name','phone_number','installment'];
    public function products(){
    	return $this->belongsTo('App\Product');
    }
}
