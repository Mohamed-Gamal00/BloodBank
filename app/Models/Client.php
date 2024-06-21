<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'clients';
    protected $guard = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'password', 'phone','d_o_b', 'city_id', 'last_donation_date', 'blood_type_id','pin_code');
    // protected $fillable = array('name', 'email', 'password', 'phone', 'last_donation_date', 'd_o_b', 'blood_type_id', 'city_id', 'pin_code');


    public function requests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }
    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function blood_types()
    //الفصائل اللي الكلاينت مختار يجيله فيها اشعارات
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }
    public function tokens()
    {
        return $this->hasMany('App\Models\Token');
    }

    protected $hidden = [
        'password','api_token'
    ];

}