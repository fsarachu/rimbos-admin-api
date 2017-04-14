<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Http\Requests\StoreInvoice;
use App\Http\Requests\UpdateInvoice;
use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'data' => Invoice::with(['category', 'country', 'currency', 'payment_method', 'user'])->get()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvoice $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoice $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $invoice = Invoice::create(
            array_merge(
                $request->only(
                    [
                        'date',
                        'trip',
                        'description',
                        'business_name',
                        'invoice_number',
                        'amount_in_original_currency',
                        'one_dollar_rate',
                        'image_url',
                        'include_rut',
                        'assign_anii',
                        'personal_spending',
                        'category_id',
                        'country_id',
                        'currency_id',
                        'payment_method_id',
                    ]
                ),
                [
                    'amount_in_dollars' =>
                        bcdiv($request->input('amount_in_original_currency') / $request->input('one_dollar_rate'), 1, 2),
                    'actual_paid_amount' =>
                        bcdiv($request->input('amount_in_original_currency') / $request->input('one_dollar_rate'), 1, 2),
                    'user_id' => $user->id,
                ]
            )
        );

        if (!$invoice) {
            return response()->json(['error' => 'Could not create record'], 500);
        }

        return response()->json(['data' => $invoice], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $invoice->load(['category', 'country', 'currency', 'payment_method', 'user']);
        return response()->json(['data' => $invoice], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoice $request
     * @param  \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoice $request, Invoice $invoice)
    {
        $invoice->fill(
            array_merge(
                $request->only(
                    [
                        'date',
                        'trip',
                        'description',
                        'business_name',
                        'invoice_number',
                        'amount_in_original_currency',
                        'one_dollar_rate',
                        'image_url',
                        'include_rut',
                        'assign_anii',
                        'personal_spending',
                        'category_id',
                        'country_id',
                        'currency_id',
                        'payment_method_id',
                    ]
                ),
                [
                    'amount_in_dollars' =>
                        bcdiv($request->input('amount_in_original_currency') / $request->input('one_dollar_rate'), 1, 2),
                    'actual_paid_amount' =>
                        bcdiv($request->input('amount_in_original_currency') / $request->input('one_dollar_rate'), 1, 2),
                ]
            )
        );

        $invoice->save();

        return response()->json(['data' => $invoice], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return response()->json([], 204);
    }
}
