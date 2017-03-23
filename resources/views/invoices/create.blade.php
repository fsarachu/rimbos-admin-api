@extends('layout')

@section('title', 'Cargar Comprobante')

@section('content')
    <div class="ui text container">
        <form class="ui form" method="post" action="/invoices"
              enctype="multipart/form-data" novalidate>
            <h3 class="ui horizontal divider header">Cargar Comprobante</h3>
            <div class="three fields">
                <div class="field">
                    <label for="date">Fecha</label>
                    <div class="ui calendar" id="calendar">
                        <input id="date" name="date" placeholder="Seleccionar fecha" type="text" readonly="">
                    </div>
                </div>
                <div class="field">
                    <label for="trip">Viaje</label>
                    <input id="trip" name="trip" placeholder="Identificador de viaje" type="text">
                </div>
                <div class="field">
                    <label>País</label>
                    <div id="country-dropdown" class="ui dropdown search selection">
                        <input type="hidden" name="country">
                        <div class="default text">Seleccionar País</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            @foreach($countries as $country)
                                <div class="item" data-value="{{ $country->id }}">
                                    <i class="{{ $country->iso_2 }} flag"></i>{{ $country->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <label for="description">Descripción</label>
                <textarea id="description" name="description" rows="3"></textarea>
            </div>
            <div class="three fields">
                <div class="field">
                    <label for="business_name">Empresa</label>
                    <input id="business_name" name="business_name" placeholder="Nombre de empresa" type="text">
                </div>
                <div class="field">
                    <label for="invoice_number">Nro recibo</label>
                    <input id="invoice_number" name="invoice_number" placeholder="Número del recibo" type="text">
                </div>
                <div class="field">
                    <label>Categoría</label>
                    <div class="ui dropdown search selection">
                        <input type="hidden" name="category">
                        <div class="default text">Seleccionar categoría</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            @foreach($categories as $category)
                                <div class="item" data-value="{{$category->id}}">{{$category->name}}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="two fields">
                <div class="field">
                    <label>Método de pago</label>
                    <div class="ui dropdown selection">
                        <input type="hidden" name="payment_method">
                        <div class="default text">Seleccionar método</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            @foreach($payment_methods as $payment_method)
                                <div class="item" data-value="{{$payment_method->id}}">{{$payment_method->name}}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>Moneda</label>
                    <div id="currency-dropdown" class="ui dropdown search selection">
                        <input type="hidden" name="currency">
                        <div class="default text">Seleccionar moneda</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            @foreach($currencies as $currency)
                                <div class="item" data-value="{{ $currency->id }}">
                                    <i class="{{ $currency->iso_2 }} flag"></i>{{ $currency->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="three fields">
                <div class="field">
                    <label for="amount_in_original_currency">Importe en moneda de origen</label>
                    <input id="amount_in_original_currency" name="amount_in_original_currency" type="number"
                           placeholder="0.00" value="0.0" step="0.01" lang="es">
                </div>
                <div class="field">
                    <label for="one_dollar_rate">Cotización a dólares</label>
                    <input id="one_dollar_rate" name="one_dollar_rate" type="number" placeholder="0.00" value="1.30"
                           step="0.01" lang="en">
                </div>
                <div class="field">
                    <label for="amount_in_dollars">Importe en dólares</label>
                    <input id="amount_in_dollars" name="amount_in_dollars" type="text" value="$0.00" disabled="">
                </div>
            </div>
            <div class="field">
                <label for="image">Imagen</label>
                <input id="image" name="image" type="file">
            </div>
            <div class="grouped fields">
                <div class="field">
                    <div class="ui checkbox">
                        <input id="include_rut" name="include_rut" value="true" type="checkbox">
                        <label for="include_rut">Incluye RUT empresa</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input id="assign_anii" name="assign_anii" value="true" type="checkbox">
                        <label for="assign_anii">Asignar a ANII</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input id="personal_spending" name="personal_spending" value="true" type="checkbox">
                        <label for="personal_spending">Gasto Personal</label>
                    </div>
                </div>
            </div>
            <input class="ui secondary submit large fluid button" value="Cargar" type="submit">
        </form>
    </div>

    @if($lastInvoice)
        <script>
            var lastInvoice = {!! json_encode($lastInvoice) !!};
            console.log(lastInvoice);
        </script>
    @endif
@endsection