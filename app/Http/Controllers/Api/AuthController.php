<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Client;
use App\Models\Governorate;
use App\Models\Notification;
use App\Models\Setting;
use App\Models\Token;
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
            'city_id' => 'exists:cities,id',
            'phone' => 'required|unique:clients',
            'last_donation_date' => 'required',
            'blood_type_id' => 'exists:blood_types,id',

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

    public function registerToken(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'token' => 'required',   // device token
            'type' => 'required|in:android,ios',
        ]);

        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        Token::where('token',$request->token)->delete();
        $request->user()->tokens()->create($request->all());
        return responseJson(1, 'تم التسجيل بنجاح');
    }

    public function removeToken(Request $request) // بشيتل توكين الجهاز اللي متسجل عندي في الداتا بيز
    {
        $validator = validator()->make($request->all(), [
            'token' => 'required',   // device token
        ]);

        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        Token::where('token', $request->token)->delete();
        return responseJson(1, 'تم الحذف بنجاح');
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
        if ($settings) {
        }
        return responseJson(0, 'not found', $settings);
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
        if ($notifications) {
            return responseJson(1, 'success', $notifications);
        }
        return responseJson(0, 'notification not found', $notifications);
    }

    public function notification(Request $request ,$id)
    {

        $notification = Notification::find($id);
        if (!$notification) {
            return responseJson(0, 'notification not found');
        }
        // $user = auth()->guard('api')->user();
        // return $user->posts()->toggle($request->post_id);
        $user = auth()->guard('api')->user();
        $user->notifications()->updateExistingPivot($notification->id, ['is_read' => true]);
        return responseJson(1, 'success', $notification);
    }

    public function notificationSettings(Request $request)
    {
        $validator = validator()->make(
            $request->all(),
            [
                'blood_types_id' => 'required|exists:blood_types,id',
                'governorate_id' => 'required|exists:governorates,id',
            ],
        );
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        $client = $request->user();
        $client->blood_types()->syncWithoutDetaching($request->blood_types_id);
        $client->governorates()->syncWithoutDetaching($request->governorate_id);

        return responseJson(1, 'Notification settings updated successfully');

    }

}
