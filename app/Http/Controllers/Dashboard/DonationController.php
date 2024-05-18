<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\DonationRequest;
use Illuminate\Http\Request;
use Redirect;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        $query = DonationRequest::query();
        if ($request->query('query')) {
            $query->where('patient_name', 'LIKE', "%{$request->query('query')}%")
                ->orWhere('patient_phone', 'LIKE', "%{$request->query('query')}%")
                ->orWhere('hospital_name', 'LIKE', "%{$request->query('query')}%");
        }

        if ($request->query('city')) {
            $query->where('city_id', $request->query('city'));
        }

        if ($request->query('bloodType')) {
            $query->where('blood_type_id', $request->query('bloodType'));
        }

        $donations = $query->paginate(10);
        $cities = City::all();
        $bloodTypes = BloodType::all();
        return view('dashboard.donations.index', compact('donations', 'cities', 'bloodTypes'));
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
        $donation = DonationRequest::findOrFail($id);
        $donation->delete();
        return Redirect::route('donation.index')->with('success', 'Donation Deleted success');
    }
}
