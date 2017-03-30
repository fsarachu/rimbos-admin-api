<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Country;
use App\Currency;
use App\Http\Requests\StoreInvoice;
use App\Invoice;
use App\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends AdminBaseController
{
    /**
     * Display a listing of invoices.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with('currency', 'payment_method')->orderBy('created_at', 'desc')->get();
        return view('admin.invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new invoice.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $countries = Country::orderBy('name')->get();
        $currencies = Currency::orderBy('name')->get();
        $payment_methods = PaymentMethod::orderBy('name')->get();
        $last_invoice = Invoice::orderBy('created_at', 'desc')->first();
        return view('admin.invoices.create', compact('categories', 'countries', 'currencies', 'payment_methods', 'last_invoice'));
    }

    /**
     * Store a newly created invoice in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoice $request)
    {
        $invoice = new Invoice;

        // TODO: maybe an invoice factory here(?
        $invoice->fill($request->only(['date', 'trip', 'country_id', 'description', 'business_name', 'invoice_number',
            'category_id', 'payment_method_id', 'currency_id', 'amount_in_original_currency', 'one_dollar_rate']));
        $invoice->user_id = $request->user()->id;
        $invoice->amount_in_dollars = $invoice->amount_in_original_currency / $invoice->one_dollar_rate;
        $invoice->actual_paid_amount = $invoice->amount_in_dollars;
        $invoice->include_rut = $request->input('include_rut', false);
        $invoice->assign_anii = $request->input('assign_anii', false);
        $invoice->personal_spending = $request->input('personal_spending', false);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('invoices');
            $url = env('APP_ADMIN_URL') . Storage::url($path);
            $invoice->image_url = $url;
        }

        if ($invoice->save()) {
            $request->session()->flash('positive_message', 'Comprobante cargado!');
            return redirect(route('admin.invoices.index'));
        } else {
            $request->session()->flash('negative_message', 'No se pudo cargar el comprobante');
            return back();
        }
    }

    /**
     * Display the specified invoice.
     *
     * @param  \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('admin.invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified invoice.
     *
     * @param  \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified invoice in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified invoice from storage.
     *
     * @param  \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
