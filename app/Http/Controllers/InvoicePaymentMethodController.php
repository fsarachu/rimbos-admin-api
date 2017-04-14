<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoicePaymentMethod;
use App\Http\Requests\UpdateInvoicePaymentMethod;
use App\InvoicePaymentMethod;
use Illuminate\Http\Request;

class InvoicePaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data' => InvoicePaymentMethod::all()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvoicePaymentMethod $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoicePaymentMethod $request)
    {
        $payment_method = InvoicePaymentMethod::create($request->only(['name']));

        if (!$payment_method) {
            return response()->json(['error' => 'Could not create record'], 500);
        }

        return response()->json(['data' => $payment_method], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InvoicePaymentMethod $invoicePaymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(InvoicePaymentMethod $invoicePaymentMethod)
    {
        return response()->json(['data' => $invoicePaymentMethod], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoicePaymentMethod $request
     * @param  \App\InvoicePaymentMethod $invoicePaymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoicePaymentMethod $request, InvoicePaymentMethod $invoicePaymentMethod)
    {
        $invoicePaymentMethod->fill($request->only(['name']));
        $invoicePaymentMethod->save();

        return response()->json(['data' => $invoicePaymentMethod], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InvoicePaymentMethod $invoicePaymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoicePaymentMethod $invoicePaymentMethod)
    {
        $invoicePaymentMethod->delete();

        return response()->json([], 204);
    }
}
