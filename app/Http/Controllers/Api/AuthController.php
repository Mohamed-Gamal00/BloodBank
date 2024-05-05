<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Notification;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
  public function register(Request $request)
  {
    $validator = validator()->make($request->all(), [
      'name' => 'required',
      'email' => 'required|unique:clients', // clients اللي اسمه  table ايميل مش متكرر في ال
      'password' => 'required|confirmed',
      'city_id' => 'required',
      'phone' => 'required',
      'last_donation_date' => 'required',
      'blood_type_id' => 'required',

    ]);

    if ($validator->fails()) {
      // return responseJson(0, 'validation error', $validator->errors());
      return responseJson(0, $validator->errors()->first(), $validator->errors());
    }

    // create user
    $request->merge(['password' => bcrypt($request->password)]);
    $client = Client::create($request->all());
    $client->api_token = Str::random(60);
    $client->save();
    return responseJson(1, 'تم الاضافة بنجاح', [
      'api_token' => $client->api_token,
      'client' => $client
    ]);
  }
  public function login(Request $request)
  {
    $validator = validator()->make($request->all(), [

      'phone' => 'required',
      'password' => 'required',


    ]);

    if ($validator->fails()) {
      // return responseJson(0, 'validation error', $validator->errors());
      return responseJson(0, $validator->errors()->first(), $validator->errors());
    }

    // auth validate هتاكد ان البايانات اللي جاية صح ولا غلط

    $client = Client::where('phone', $request->phone)->first();
    if ($client) {

      if (Hash::check($request->password, $client->password)) {
        return responseJson(1, 'تم تسجيل الدخول', [
          'api_token' => $client->api_token,
          'client' => $client,
        ]);
      } else {
        return responseJson(0, 'بيانات الدخول غير صحيحة');
      }
    } else {
      return responseJson(0, 'بيانات الدخول غير صحيحة');
    }
  }

  public function settings()
  {
    $settings = Setting::first();
    return responseJson(1, 'success', $settings);
  }

  public function profile(Request $request)
  {
    // $profile = $request->user();
    $profile = auth('api')->user()->load('bloodType', 'city', 'governorates');
    return responseJson(1, 'success', $profile);
  }

  public function profileUpdate(Request $request)
  {
    $user = auth('api')->user();
    //validate
    $validate = $request->validate([
      'name' => 'required',
      'email' => 'required', // clients اللي اسمه  table ايميل مش متكرر في ال
      'password' => 'required|confirmed',
      'city_id' => 'required',
      'phone' => 'required',
      'last_donation_date' => 'required',
      'blood_type_id' => 'required',
    ]);

    $user->update($validate);
    // $user = $user->refresh();
    return responseJson(1, 'Profile updated successfully', $request->all());
  }


  public function notifications(Request $request)
  {
    $notifications = $request->user()->notifications()->paginate();
    if($notifications) {
      return responseJson(1, 'success', $notifications);
    }
    return responseJson(0, 'notification not found', $notifications);
  }
}
