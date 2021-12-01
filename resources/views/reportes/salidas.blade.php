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
        {!! Form::open(['route' => 'reporte.salidas', 'class' => 'form-horizontal', 'method'=>'get']) !!}
        <div class="form-group">
            <div class="col-md-4">
                <label for="desde">Fecha</label>
                <input type="text" class="form-control" name="desde" id="desde" required="required" autocomplete="off">
            </div>
            <div class="col-md-4">
                <label for="hotel_id" class="control-label">Hotel</label>
                {{ Form::select('resort_id', $hoteles, null,
                    ['class'=>'form-control', 'placeholder'=>'Todos los hoteles'])
                }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                {{ Form::submit('Buscar', ['class'=>'btn btn-primary']) }}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

@isset($reservas)
{!! Form::open(['route' => 'reportes.guardar-asig', 'class' => 'form-asig', 'target'=>'_blank', 'id'=>'cambiar_asig', 'method'=>'post']) !!}
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><strong>RESULTADOS</strong></h3>
        <span class="pull-right">
            <a href="{{route('reporte.salidas-csv')}}?<?php echo $_SERVER['QUERY_STRING']; ?>" target="_blank">
                <img src="/img/csv.png" alt="Reporte CSV" title="Reporte CSV" class="reporte-icon">
            </a>
        </span>
    </div>
    <div class="box-body">
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
    </div>
</div>
<input type="hidden" name="querystring" value="<?php echo $_SERVER['QUERY_STRING']; ?>">
<input type="hidden" name="tipo_reporte" value="salidas">
{!! Form::close() !!}
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