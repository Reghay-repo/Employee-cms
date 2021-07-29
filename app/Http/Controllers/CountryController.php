<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\CountryUpdateRequest;

class CountryController extends Controller
{
    // index function
    public function index(Request $request) {
        $countries = Country::all();
        
        if($request->has('search')) {
            $countries = Country::where('name', 'like', "%{$request->search}%")->orWhere('country_code', 'like', "%{$request->search}%")->get();
        }
        
        return view('countries.index', compact('countries'));
    }
    
  
    // create function
    public function create() {

        return view('countries.create');
    }


    // store function
    public function store(CountryStoreRequest $request, Country $country) {
        
        Country::create($request->validated());

        return  redirect()->route('countries.index')->with('message', 'Country created ');
    }


    // edit function
    public function edit(Country $country) {
        
        return view('countries.edit', compact('country'));
    }


    // update function
    public function update(CountryUpdateRequest $request, Country $country) {
        $country->update($request->validated());

        return redirect()->route('countries.index')->with('message', 'country updated');
    }
    

    // delete
    public function destroy(Country $country){
        
        $country->delete();
        
        return redirect()->route('countries.index')->with('message', 'country deleted');

    }
}
