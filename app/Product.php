<?php

namespace App;

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
    	return $this->belongsTo('App\Provider','provider_id');
    }

    public function category(){
    	return $this->belongsTo('App\Category','category_id');
    }

    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }

    public function sales(){
        return $this->belongsToMany('App\Sale');
    }
}
