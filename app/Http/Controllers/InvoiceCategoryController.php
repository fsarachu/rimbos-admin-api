<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceCategory;
use App\Http\Requests\UpdateInvoiceCategory;
use App\InvoiceCategory;
use Illuminate\Http\Request;

class InvoiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data' => InvoiceCategory::all()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvoiceCategory $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceCategory $request)
    {
        $invoice_category = InvoiceCategory::create($request->only(['name']));

        if (!$invoice_category) {
            return response()->json(['error' => 'Could not create record'], 500);
        }

        return response()->json(['data' => $invoice_category], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InvoiceCategory $invoiceCategory
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceCategory $invoiceCategory)
    {
        return response()->json(['data' => $invoiceCategory], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\StoreInvoiceCategory $request
     * @param  \App\InvoiceCategory $invoiceCategory
     * @return \Illuminate\Http\Response
     */
    public function update(StoreInvoiceCategory $request, InvoiceCategory $invoiceCategory)
    {
        $invoiceCategory->fill($request->only(['name']));
        $invoiceCategory->save();

        return response()->json(['data' => $invoiceCategory], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InvoiceCategory $invoiceCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceCategory $invoiceCategory)
    {
        $invoiceCategory->delete();

        return response()->json([], 204);
    }
}
