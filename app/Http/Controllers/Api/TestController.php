<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Models\Governorate;
use App\Models\Token;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(Request $request)
    {
        // $user = auth()->guard('api')->user();
        // return $user;

        // $usergovernorate = Client::whereHas('blood_types',function($q){
        //     $q->where('blood_type_id',1);
        // })->get();
        // return $usergovernorate ;

        $donation = DonationRequest::find(3);
        // return $donation;
        $clients = Client::whereHas('governorates', function ($query)  use ($donation) {
            $query->where('governorate_id', $donation->city->governorate_id);
        })->whereHas('blood_types', function ($query) use ($donation) {
            $query->where('blood_type_id', $donation->blood_type_id);
        })->pluck('id')->toArray();

        return $clients;

    }
}
