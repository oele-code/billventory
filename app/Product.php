<?php

namespace StockTaking;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['provider_id','category_id','reference','name','stock','price','cost','user_id'];

    public function provider(){
    	return $this->belongsTo('StockTaking\Provider','provider_id');
    }

    public function category(){
    	return $this->belongsTo('StockTaking\Category','category_id');
    }

    public function user(){
    	return $this->belongsTo('StockTaking\User','user_id');
    }

    public function sales(){
        return $this->belongsToMany('StockTaking\Sale');
    }
}
