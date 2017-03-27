<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Currency;
use App\Http\Requests\StoreInvoice;
use App\Invoice;
use App\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of invoices.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with('currency', 'payment_method')->orderBy('created_at', 'desc')->get();
        return view('invoices.index', compact('invoices'));
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
        return view('invoices.create', compact('categories', 'countries', 'currencies', 'payment_methods', 'last_invoice'));
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
            $invoice->image_url = Storage::url($path);
        }

        if ($invoice->save()) {
            $request->session()->flash('positive_message', 'Comprobante cargado!');
            return redirect(route('invoices.index'));
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
        return view('invoices.show', compact('invoice'));
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
