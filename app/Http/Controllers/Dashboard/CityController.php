<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::paginate(10);
        return view('dashboard.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $city = new City();
        $governorates = Governorate::all();
        return view('dashboard.cities.create', compact('city','governorates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'governorate_id' => 'required|exists:governorates,id'
        ];
        $message = [
            'name.required' => 'Name is required',
            'governorate_id.required' => 'governorate is required'
        ];
        $this->validate($request, $rules, $message);

        City::create($request->all());
        return Redirect::route('city.index')->with('success', 'City Created success');
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
        $city = City::findOrFail($id);
        $governorates = Governorate::all();
        return view('dashboard.cities.edit', compact('city', 'governorates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $city = City::findOrFail($id);

        $rules = [
            'name' => 'required',
            'governorate_id' => 'required|exists:governorates,id'
        ];
        $message = [
            'name.required' => 'Name is required',
            'governorate_id.required' => 'governorate is required'
        ];
        $this->validate($request, $rules, $message);

        $city->update($request->all());
        return Redirect::route('city.index')->with('success', 'City Updated success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return Redirect::route('city.index')->with('success', 'City Deleted success');
    }
}
