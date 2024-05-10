<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{

    protected $table = 'governorates';
    public $timestamps = true;
    protected $fillable = array('name');

    public function city()
    {
        return $this->hasMany('App\Models\City');
    }

    public function clients()
    {
        // relatiom m:m between Governorate and clients
        return $this->belongsToMany('App\Models\Client');
    }
}
