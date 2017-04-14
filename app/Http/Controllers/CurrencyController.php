<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Http\Requests\StoreCurrency;
use App\Http\Requests\UpdateCurrency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data' => Currency::all()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCurrency $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCurrency $request)
    {
        $currency = Currency::create($request->only(['name', 'iso_2', 'iso_3', 'symbol']));

        if (!$currency) {
            return response()->json(['error' => 'Could not create record'], 500);
        }

        return response()->json(['data' => $currency], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        return response()->json(['data' => $currency], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCurrency $request
     * @param  \App\Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCurrency $request, Currency $currency)
    {
        $currency->fill($request->only(['name', 'iso_2', 'iso_3', 'symbol']));
        $currency->save();

        return response()->json(['data' => $currency], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();

        return response()->json([], 204);
    }
}
