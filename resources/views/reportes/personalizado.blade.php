@extends ('layouts.boxed')

@section ('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('reporte.index')}}">Reportes</a>
    </li>
    <li class="breadcrumb-item active">Reporte personalizado</li>
</ol>

@if(!isset($reservas))
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><strong>REPORTE PERSONALIZADO</strong></h3>
        </div>
        <div class="box-body">
            {!! Form::open(['route' => 'reporte.personalizado', 'class' => 'form-horizontal', 'method'=>'get']) !!}
            <div class="form-group">
                <div class="col-md-2">
                    <label for="desde" class="control-label">Fecha inicio</label>
                    <input type="text" class="form-control" name="desde" id="desde" required="required" autocomplete="off">
                </div>
                <div class="col-md-2">
                    <label for="hasta" class="control-label">Fecha fin</label>
                    <input type="text" class="form-control" name="hasta" id="hasta" required="required" autocomplete="off">
                </div>
                <div class="col-md-2">
                    <label for="hasta" class="control-label">Filtrar por</label>
                    <select name="campo_fecha" id="campo_fecha" class="form-control">
                        <option value="arrival">Llegadas</option>
                        <option value="departure">Salidas</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="hotel_id" class="control-label">Hotel</label>
                    {{ Form::select('hotel_id', $hoteles, null,
                        ['class'=>'form-control', 'placeholder'=>'Todos los hoteles'])
                    }}
                </div>
                <div class="col-md-3">
                    <label for="agencia" class="control-label">Agencia</label>
                    {{ Form::select('agencia_id', $agencias, null,
                        ['class'=>'form-control', 'placeholder'=>'Todas las agencias'])
                    }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <input type="hidden" name="fields" id="fields">
                    {{ Form::submit('Buscar', ['class'=>'btn btn-primary']) }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label for="">Campos disponibles</label>
                    <ul id="sortable1" class="connectedSortable">
                      <li class="ui-state-default" id="field_hotel">Hotel</li>
                      <li class="ui-state-default" id="field_agencia">Agencia</li>
                      <li class="ui-state-default" id="field_tipoServicio">Tipo Servicio</li>
                      <li class="ui-state-default" id="field_claseServicio">Clase Servicio</li>
                      <li class="ui-state-default" id="field_name">Nombre</li>
                      <li class="ui-state-default" id="field_email">Email</li>
                      <li class="ui-state-default" id="field_phone">Phone</li>
                      <li class="ui-state-default" id="field_pax">Pax</li>
                      <li class="ui-state-default" id="field_arrivalDate">Arrival Date</li>
                      <li class="ui-state-default" id="field_arrivalFlight">Arrival Flight</li>
                      <li class="ui-state-default" id="field_arrivalTime">Arrival Time</li>
                      <li class="ui-state-default" id="field_departureDate">Departure Date</li>
                      <li class="ui-state-default" id="field_departureFlight">Departure Flight</li>
                      <li class="ui-state-default" id="field_departureTime">Departure Time</li>
                      <li class="ui-state-default" id="field_pickupTime">Pick-up Time</li>
                      <li class="ui-state-default" id="field_amount">Total</li>
                      <li class="ui-state-default" id="field_monedaPago">Moneda</li>
                      <li class="ui-state-default" id="field_formaPago">Forma de pago</li>
                      <li class="ui-state-default" id="field_pagoEstatus">Estatus pago</li>
                      <li class="ui-state-default" id="field_comments">Comentarios</li>
                      <li class="ui-state-default" id="field_specialComments">Comentarios especiales</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <label for="">Campos seleccionados</label>
                    <ul id="sortable2" class="connectedSortable">
                    </ul>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endif

@isset($reservas)
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><strong>RESULTADOS</strong></h3>
        <span class="pull-right">
            <a href="{{route('reporte.personalizado')}}">
                NUEVO REPORTE
            </a>
            <a href="{{route('reporte.personalizado-horizontal')}}?<?php echo $_SERVER['QUERY_STRING']; ?>" target="_blank">
                <img src="/img/horizontal.png" alt="Reporte Imprimible" title="Reporte Imprimible" class="reporte-icon">
            </a>
        </span>
    </div>
    <div class="box-body">
        <table class="table table-condensed">

            @foreach ($reservas as $rowIndex => $row)
                @if($rowIndex > 0)
                    @break
                @endif
                <tr>
                    @foreach ($row as $index => $item)
                    <th>{{$etiquetas[$index]}}</th>
                    @endforeach
                </tr>
            @endforeach

            @foreach ($reservas as $row)
                <tr>
                    @foreach ($row as $item)
                    <td>{{$item}}</td>
                    @endforeach
                </tr>
            @endforeach

        </table>
    </div>
</div>
@endisset

@endsection

@section ('footer-scripts')
    <script>
        $(document).ready(function() {
            $('.form-horizontal').validate();
            $('#desde').datetimepicker({ format: 'DD/MM/YYYY' });
            $('#hasta').datetimepicker({
                format: 'DD/MM/YYYY',
                useCurrent: false,
            });
            $("#desde").on("dp.change", function (e) {
                $('#hasta').data("DateTimePicker").minDate(e.date);
            });
            $("#hasta").on("dp.change", function (e) {
                $('#desde').data("DateTimePicker").maxDate(e.date);
            });

            $( "#sortable1, #sortable2" ).sortable({
                connectWith: ".connectedSortable"
            }).disableSelection();

            $('#sortable2').sortable({
                update: function() {
                    var order = $('#sortable2').sortable('serialize');
                    $('#fields').val(order);
                }
            });
        });
    </script>
@endsection