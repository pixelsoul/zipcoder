<?php

namespace App\Http\Controllers;

use App\Zipcodes;
use Illuminate\Http\Request;

class ZipcodeController extends Controller
{
    /**
     * get all zipcode records
     * 
     * @return json
     */
    public function index($search = null)
    {

        return Zipcodes::where('zip', 'LIKE', '%'. $search .'%')
            ->orWhere('city', 'LIKE', '%'. $search .'%')
            ->orderBy('zip', 'asc')
            ->paginate(15);

        //return Zipcodes::orderBy('zip', 'asc')->paginate(15);
    }

    /**
     * get zip by id
     * 
     * @return json
     */
    public function show($id)
    {
        $zipcode = Zipcodes::find($id);
        return response()->json($zipcode);
    }

    /**
     * get zip by zipcode
     * 
     * @return json
     */
    public function zip($zip)
    {
        $zipcode = Zipcodes::where('zip', $zip)->get();
        return response()->json($zipcode);
    }

    /**
     * get zip by zipcode
     * 
     * @return object
     */
    public function showZipcode($zip)
    {
        $zipcode = Zipcodes::whereZip($zip)->first();
        return view('zipcode', compact('zipcode'));
    }

    /**
     * edit zipcode
     * 
     * @return object
     */
    public function edit($zip)
    {
        $zipcode = Zipcodes::whereZip($zip)->first();
        return view('zipcode.edit', compact('zipcode'));
    }

    /**
     * update zipcode
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $zipcode = Zipcodes::findOrFail($id);

        $zipcode->zip = $request->zip;
        $zipcode->latitude = $request->latitude;
        $zipcode->longitude = $request->longitude;
        $zipcode->city = $request->city;
        $zipcode->state_id = $request->state_id;
        $zipcode->state_name = $request->state_name;
        $zipcode->zcta = $request->zcta;
        $zipcode->parent_zcta = $request->parent_zcta;
        $zipcode->population = $request->population;
        $zipcode->density = $request->density;
        $zipcode->county_fips = $request->county_fips;
        $zipcode->county_name = $request->county_name;
        $zipcode->all_county_weights = $request->all_county_weights;
        $zipcode->imprecise = $request->imprecise;
        $zipcode->military = $request->military;
        $zipcode->timezone = $request->timezone;

        $zipcode->save();

        //Session::flash('message', 'Successfully updated nerd!');
        $request->session()->flash('status', 'Record updated!');
        return redirect()->route('zipcode', ['zip' => $zipcode->zip]);
        //return response(null, Response::HTTP_OK);
    }

}
