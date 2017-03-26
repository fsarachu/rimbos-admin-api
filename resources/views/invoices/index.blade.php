@extends('layouts.app')

@section('title', 'Comprobantes')

@section('content')
    <div class="ui container">
        <h3 class="ui horizontal header divider">Listado de Comprobantes</h3>
        <table class="ui unstackable selectable single line basic table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Fecha</th>
                <th class="mobile hidden">Viaje</th>
                <th class="mobile hidden">Empresa</th>
                <th>Moneda</th>
                <th class="tablet or lower hidden">Método de Pago</th>
                <th class="right aligned">Monto origen</th>
                <th class="right aligned tablet or lower hidden">Monto en dólares</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoices as $invoice)
                <tr data-href="/invoices/{{ $invoice->id }}">
                    <td>
                        {{ $invoice->id }}
                    </td>
                    <td>
                        {{ Carbon\Carbon::parse($invoice->date)->format('d/m/y') }}
                    </td>
                    <td class="mobile hidden">
                        {{ $invoice->trip }}
                    </td>
                    <td class="mobile hidden">
                        {{ $invoice->business_name }}
                    </td>
                    <td>
                        <i class="{{$invoice->currency->iso_2}} flag"></i>
                        <span class="mobile only">{{ $invoice->currency->iso_3 }}</span>
                        <span class="mobile hidden">{{ $invoice->currency->name }}</span>
                    </td>
                    <td class="tablet or lower hidden">
                        {{ $invoice->payment_method->name }}
                    </td>
                    <td class="right aligned">
                        {{ $invoice->currency->symbol }} {{ $invoice->amount_in_original_currency }}
                    </td>
                    <td class="right aligned tablet or lower hidden">
                        $ {{ $invoice->amount_in_dollars }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection