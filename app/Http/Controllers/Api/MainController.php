<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GovernroateResource;
use App\Models\BloodType;
use App\models\Category;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Governorate;
use App\Models\Post;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{


    public function governorates()
    {
        $governorates = Governorate::all();
        // responseJson helper function to get json data creatded in App/MohamedGamal/helpers.php and config it in composer.json
        return responseJson(1, 'success', $governorates);

        // if($governorates == null) {
        //     return response()->json(["message"=> "governorates not found"],404);
        // }
        // return GovernroateResource::collection($governorates);
    }

    public function cities(Request $request)
    {
        $cities = City::where(function ($query) use ($request) {
            if ($request->has('governorate_id')) {
                $query->where('governorate_id', $request->governorate_id);
            }
        })->get();
        return responseJson(1, 'success', $cities);
    }

    public function blood_types()
    {
        $blood_types = BloodType::all();
        return responseJson(1, 'success', $blood_types);
    }


    public function categories()
    {
        $categories = Category::all();
        return responseJson(1, 'success', $categories);
    }

    public function posts()
    {
        $posts = Post::with('category')->paginate(10);
        return responseJson(1, 'success', $posts);
    }
    public function post(Request $request, $id)
    {
        $post = Post::find($id);
        if($post){
            return responseJson(1, 'success', $post);
        }
        return responseJson(0, 'post not found', $post);
    }


    public function toggleFavourite(Request $request)
    {
        $user = auth()->guard('api')->user();
        return $user->posts()->toggle($request->post_id);
    }

    public function listFavourites(Request $request)
    {
        $user = auth()->guard('api')->user();
        return $user->posts()->paginate();
    }

    public function contactus(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'email' => 'required', // clients اللي اسمه  table ايميل مش متكرر في ال
            'subject' => 'required',
            'message' => 'required',

        ]);

        if ($validator->fails()) {
            // return responseJson(0, 'validation error', $validator->errors());
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        // create contact us
        $contactus = Contact::create($request->all());
        if ($contactus) {
            return responseJson(1, 'تم الارسال بنجاح');
        }
    }
}
