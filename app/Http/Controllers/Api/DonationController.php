<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function donations(Request $request)
    {
        $donations = DonationRequest::all();
        return $donations;
    }
    public function donation(Request $request, $id)
    {
        $donation = DonationRequest::find($id);
        if ($donation) {
            return responseJson(1, 'success', $donation);
        }
        return responseJson(0, 'donation not found', $donation);
    }
    public function createDonation(Request $request)
    {
        $validator = validator()->make(
            $request->all(),
            [
                'patient_name' => 'required',
                'patient_phone' => 'required', // clients اللي اسمه  table ايميل مش متكرر في ال
                'city_id' => 'required',
                'hospital_name' => 'required',
                'blood_type_id' => 'required',
                'patient_age' => 'required',
                'bags_num' => 'required',
                'hospital_address' => 'required',
                'details' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'client_id' => 'required',
            ],
        );
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        return $validator;
    }
}
