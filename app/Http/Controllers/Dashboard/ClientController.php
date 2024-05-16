<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        $query = Client::query(); // return query builder of this model
        if ($request->query('query')) {
            $query->where('name', 'LIKE', "%{$request->query('query')}%")
                ->orWhere('phone', 'LIKE', "%{$request->query('query')}%")
                ->orWhere('email', 'LIKE', "%{$request->query('query')}%");
        }
        if ($request->query('city')) {
            $cityId = $request->query('city');
            $query->where('city_id', $cityId);
        }
        if ($request->query('bloodType')) {
            $bloodTypeId = $request->query('bloodType');
            $query->where('blood_type_id', $bloodTypeId);
        }

        $cities = City::all();
        $bloodTypes = BloodType::all();
        $clients = $query->paginate(1);
        return view('dashboard.clients.index', compact('clients', 'cities', 'bloodTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
