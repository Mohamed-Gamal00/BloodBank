<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\DonationRequest;
use App\Models\Governorate;
use App\Models\Token;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function donations(Request $request)
    {
        $donations = DonationRequest::all();
        return $donations;
    }



    public function donation($id)
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
                'patient_phone' => 'required|digits:11', // clients اللي اسمه  table ايميل مش متكرر في ال
                'city_id' => 'required|exists:cities,id', // موجود city بتاع   id لازم اتاكد ان
                'hospital_name' => 'required',
                'blood_type_id' => 'required|exists:blood_types,id',
                'patient_age' => 'required:digits',
                'bags_num' => 'required:digits',
                'hospital_address' => 'required',
                'details' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'client_id' => 'required|exists:clients,id',
            ],
        );
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        // create donation
        // $donation_request = $request->user()->requests()->get();
        // return $donation_request;
        $donation_request = $request->user()->requests()->create($request->all());

        

        $clientsId = $donation_request->city->governorate->clients() // كل العملا اللي هيوصلهم الاشعار
        // بختار الناس اللي مختارين الفاصئل اللي منها الفصيلة اللي هبعتلها الاشعار
        //  دي الفاصئل اللي الكلاينت ده مختار يجيله فيها اشعارات blood_types
        ->whereHas('blood_types',function($q)use($donation_request) {
            $q->where('blood_types.id', $donation_request->blood_type_id); //بحدد الفصيلة
        })->pluck('clients.id')->toArray();
        // dd($clientsId);
        // return $clientsId;

        if(count($clientsId)){
            $bloodTypeName = BloodType::find($donation_request->blood_type_id)->name;

            $notification = $donation_request->notification()->create([
                'title' => 'حالة تبرع قريبة منك',
                'content' => $bloodTypeName. 'محتاج متبرع لفصيلة',
            ]);
            $notification->clients()->attach($clientsId);

            $tokens = Token::whereIn('client_id', $clientsId)->where('token','!=',null)->pluck('token')->toArray();

            if($tokens){
                $title = $notification->title;
                $body = $notification->body;
                $data = [
                    'donation_request_id' => $donation_request->id
                ];
                $send = notifyByFirebase($title,$body,$tokens,$data);
            }
        }
        return responseJson(1,'تم الاضافة بنجاح',$send);
    }
}
