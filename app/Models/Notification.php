<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'donation_requests_id');

    public function client()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    public function donationsRequest()
    {
        return $this->belongsToMany('App\Models\DonationRequest');
    }

}