<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Redirect;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $governorates = Governorate::paginate(10);
        return view('dashboard.governorates.index',compact('governorates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $governorate = new Governorate();
        return view('dashboard.governorates.create',compact('governorate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required'
        ];
        $message = [
            'name.required' => 'Name is required'
        ];
        $this->validate($request,$rules,$message);

        Governorate::create($request->all());
        return Redirect::route('governorate.index')->with('success', 'Governorate Created success');

        // dd('here');
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
    public function edit($id)
    {
        $governorate = Governorate::findOrFail($id);
        return view('dashboard.governorates.edit',compact('governorate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $governorate = Governorate::findOrFail($id);

        $rules = [
            'name' => 'required'
        ];
        $message = [
            'name.required' => 'Name is required'
        ];
        $this->validate($request, $rules, $message);
        
        $governorate->update($request->all());
        return Redirect::route('governorate.index')->with('success', 'Governorate Updated success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $governorate = Governorate::findOrFail($id);
        $governorate->delete();
        return Redirect::route('governorate.index')->with('success', 'Governorate Deleted success');
    }
}
