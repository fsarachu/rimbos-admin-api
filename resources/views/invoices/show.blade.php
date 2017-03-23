@extends('layout')

@section('title', 'Comprobantes')

@section('content')
    <div class="ui text container">
        <div class="ui piled segment">
            <div class="ui grid">
                <div class="row">
                    <div class="column">
                        <h3 class="ui horizontal header divider">Comprobante #{{ $invoice->id }}</h3>
                    </div>
                </div>
                <div class="two columns wide relaxed horizontally divided stackable row">
                    <div class="column">
                        <div class="ui divided list">
                            <div class="item">
                                <div class="left floated content">
                                    <div class="header">Fecha:</div>
                                </div>
                                <div class="right floated content">
                                    <div class="description">
                                        {{ucfirst(Carbon\Carbon::parse($invoice->date)->formatLocalized('%B %d, %Y'))}}
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left floated content">
                                    <div class="header">Viaje:</div>
                                </div>
                                <div class="right floated content">
                                    <div class="description">{{$invoice->trip}}</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left floated content">
                                    <div class="header">País:</div>
                                </div>
                                <div class="right floated content">
                                    <div class="description">
                                        <i class="{{$invoice->country->iso_2}} flag"></i>
                                        {{$invoice->country->name}}
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left floated content">
                                    <div class="header">Empresa:</div>
                                </div>
                                <div class="right floated content">
                                    <div class="description">{{$invoice->business_name}}</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left floated content">
                                    <div class="header">Número de recibo:</div>
                                </div>
                                <div class="right floated content">
                                    <div class="description">{{$invoice->invoice_number}}</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left floated content">
                                    <div class="header">Categoría:</div>
                                </div>
                                <div class="right floated content">
                                    <div class="description">{{$invoice->category->name}}</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left floated content">
                                    <div class="header">Método de pago:</div>
                                </div>
                                <div class="right floated content">
                                    <div class="description">{{$invoice->payment_method->name}}</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left floated content">
                                    <div class="header">Moneda:</div>
                                </div>
                                <div class="right floated content">
                                    <div class="description">
                                        <i class="{{$invoice->currency->iso_2}} flag"></i>
                                        {{$invoice->currency->name}}
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left floated content">
                                    <div class="header">Importe en moneda de origen:</div>
                                </div>
                                <div class="right floated content">
                                    <div class="description">
                                        {{ $invoice->currency->symbol }} {{ $invoice->amount_in_original_currency }}
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left floated content">
                                    <div class="header">Cotización a dólares:</div>
                                </div>
                                <div class="right floated content">
                                    <div class="description">
                                        {{ $invoice->currency->symbol }} {{ $invoice->one_dollar_rate }}
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left floated content">
                                    <div class="header">Importe en dólares:</div>
                                </div>
                                <div class="right floated content">
                                    <div class="description">
                                        $ {{ $invoice->amount_in_dollars }}
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left floated content">
                                    <div class="header">Incluye RUT de empresa:</div>
                                </div>
                                <div class="right floated content">
                                    <div class="description">
                                        @if($invoice->includes_rut)
                                            Sí
                                        @else
                                            No
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left floated content">
                                    <div class="header">Asignar a ANII:</div>
                                </div>
                                <div class="right floated content">
                                    <div class="description">
                                        @if($invoice->assign_anii)
                                            Sí
                                        @else
                                            No
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left floated content">
                                    <div class="header">Gasto Personal:</div>
                                </div>
                                <div class="right floated content">
                                    <div class="description">
                                        @if($invoice->personal_spending)
                                            Sí
                                        @else
                                            No
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="ui fluid card">
                            <div class="ui fluid image">
                                @if($invoice->image_url)
                                    <a target="_blank" href="{{ $invoice->image_url }}" class="ui fluid image">
                                        <img src="{{ $invoice->image_url }}">
                                    </a>
                                @else
                                    <img class="ui fluid image" src="/images/placeholder_image.png"
                                         alt="No image available">
                                @endif
                            </div>
                            <div class="content">
                                <div class="description">
                                    <p>{{ $invoice->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection