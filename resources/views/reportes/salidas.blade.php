@extends ('layouts.boxed')

@section ('content')

<style>
    #cambiar_asig table.table.table-condensed td:last-child {
       width: auto;
    }
</style>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{route('reporte.index')}}">Reportes</a>
    </li>
    <li class="breadcrumb-item active">Reporte de salidas</li>
</ol>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><strong>REPORTE DE SALIDAS</strong></h3>
    </div>
    <div class="box-body">
        {!! Html::form('GET', route('reporte.salidas'))->class('form-horizontal')->open() !!}
        <div class="form-group">
            <div class="col-md-4">
                {!! Html::label('Fecha', 'desde') !!}
                <input type="text" class="form-control" name="desde" id="desde" required="required" autocomplete="off">
            </div>
            <div class="col-md-4">
                {!! Html::label('Hotel', 'resort_id')->class('control-label') !!}
                {!! Html::select('resort_id', $hoteles, null)->class('form-control')->placeholder('Todos los hoteles') !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                {!! Html::submit('Buscar')->class('btn btn-primary') !!}
            </div>
        </div>
        </form>
    </div>
</div>

@isset($reservas)
{!! Html::form('POST', route('reportes.guardar-asig'))->class('form-asig')->id('cambiar_asig')->attribute('target', '_blank')->open() !!}
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><strong>RESULTADOS DEL DIA: <span style="margin-left:1rem">{{ $fecha }}</span></strong></h3>
        @if ($reservas != '[]')
            <span class="pull-right">
                <a href="{{route('reporte.salidas-csv')}}?<?php echo $_SERVER['QUERY_STRING']; ?>" target="_blank">
                    <img src="/img/csv.png" alt="Reporte CSV" title="Reporte CSV" class="reporte-icon">
                </a>
            </span>
        @endif
    </div>
    <div class="box-body">
        @if ($reservas != '[]')
            <table class="table table-condensed">
                <tr>
                    <td><strong>Nombre</strong></td>
                    <td><strong>Unidad</strong></td>
                    <td><strong>Pax</strong></td>
                    <td><strong>Vuelo</strong></td>
                    <td><strong>Fecha</strong></td>
                    <td><strong>Hotel</strong></td>
                </tr>
                @foreach ($reservas as $row)
                <tr>
                    <td><a href="/reservacion/{{$row->id}}/edit">{{strtoupper($row->fullname)}}</a></td>
                    <td>{{strtoupper($row->unit->name)}}</td>
                    <td>{{$row->passengers}}</td>
                    <td>{{strtoupper($row->departure_airline)}} {{$row->departure_flight}}</td>
                    <td>{{$row->departure_date}} {{date('H:m A', strtotime($row->departure_time))}}</td>
                    <td>{{strtoupper($row->resort->name)}}</td>
                </tr>
                @endforeach
            </table>
        @else
            <h1 class="text-center" style="font-size: 2.3rem">
                NO HAY SALIDAS PARA EL DIA {{ $fecha }}, INTENTE BUSCAR CON OTRA FECHA.
            </h1>
        @endif
    </div>
</div>
{!! Html::hidden('querystring', $_SERVER['QUERY_STRING']) !!}
{!! Html::hidden('tipo_reporte', 'salidas') !!}
</form>
@endisset

@endsection

@section ('footer-scripts')
    <script>
        $(document).ready(function() {
            $('.form-horizontal').validate();
            $('#desde').datetimepicker({ format: 'DD/MM/YYYY' });
        });
    </script>
@endsection
