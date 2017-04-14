<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests\StoreCountry;
use App\Http\Requests\UpdateCountry;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data' => Country::all()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCountry $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountry $request)
    {
        $country = Country::create($request->only(['name', 'iso_2', 'iso_3']));

        if (!$country) {
            return response()->json(['error' => 'Could not create record'], 500);
        }

        return response()->json(['data' => $country], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return response()->json(['data' => $country], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCountry $request
     * @param  \App\Country $country
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountry $request, Country $country)
    {
        $country->fill($request->only(['name', 'iso_2', 'iso_3']));
        $country->save();

        return response()->json(['data' => $country], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return response()->json([], 204);
    }
}
