<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'providers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['number','fname','lname','mobile','email','address'];

    public function products(){
        return $this->hasMany(\App\Models\Product::class);
    }

}
