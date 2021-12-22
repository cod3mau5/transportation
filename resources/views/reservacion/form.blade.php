@isset ($record->created_at)
    {!! Form::model($record,
        ['route'=> ['reservacion.update', $record->id], 'method'=>'put', 'class'=>'form-horizontal'])
    !!}
@else
    {!! Form::open(['route' => 'reservacion.store', 'class' => 'form-horizontal']) !!}
@endisset

@if ($record->created_at)
<div class="row">
    <div class="col-md-3">
        <label  for="created_at" class="control-label">Fecha y hora de captura</label>
        <input  type="text" class="form-control" disabled="disabled"
                value="{{$record->created_at->timezone('America/Mazatlan')->toDateTimeString()}}"
                name="created_at"
        >
    </div>
    <div class="col-md-3">
        <label for="user_id" class="control-label">Capturada por</label>
        {{ Form::select('user_id', $usuarios, $record->user_id, ['class'=>'form-control', 'disabled'=>'disabled']) }}
    </div>
    <div class="col-md-3">
        <label  for="updated_at" class="control-label">Última modificación</label>
        <input  type="text" class="form-control" disabled="disabled"
                value="{{$record->updated_at->timezone('America/Mazatlan')->toDateTimeString()}}"
                name="updated_at"
        >
    </div>
    <div class="col-md-3">
        <label for="updated_at" class="control-label">Origen</label>
        <input type="text" class="form-control" disabled="disabled"
               value="{{$record->source}}"
               name="updated_at"
        >
    </div>
    <hr>
</div>
@endif

<div class="row">
    <div class="col-md-3">
        <label for="voucher" class="control-label">No. de voucher</label>
        {{ Form::text('voucher', null, ['class'=>'form-control', 'id'=>'voucher']) }}
    </div>
    <div class="col-md-3">
        <label for="fullname" class="control-label">Nombre</label>
        {{ Form::text('fullname', null, ['class'=>'form-control', 'required'=>'required']) }}
    </div>
    <div class="col-md-3">
        <label for="email" class="control-label">Correo electrónico</label>
        {{ Form::text('email', null, ['class'=>'form-control']) }}
    </div>
    <div class="col-md-3">
        <label for="phone" class="control-label">Teléfono</label>
        {{ Form::text('phone', null, ['class'=>'form-control']) }}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <label for="unit" class="control-label">Tipo de servicio</label>
        {{ Form::select('type', $tipos, $record->type, ['class'=>'form-control', 'id'=>'tipo_servicio']) }}
    </div>
    <div class="col-md-4">
        <label for="unit" class="control-label">Origen</label>
        {{ Form::select('location_start', $resorts, $record->location_start, ['class'=>'form-control', 'id'=>'location_start']) }}
    </div>
    <div class="col-md-4">
        <label for="unit" class="control-label">Destino</label>
        {{ Form::select('location_end', $resorts, $record->location_end, ['class'=>'form-control', 'id'=>'location_end']) }}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <label for="total_travelers" class="control-label">Total de pasajeros</label>
        {{ Form::selectRange('total_travelers', 1, 20, null, ['class'=>'form-control', 'placeholder'=>'Total de pasajeros', 'required'=>'required']) }}
    </div>
    <div class="col-md-4">
        <label for="passengers" class="control-label">Número de adultos</label>
        {{ Form::selectRange('passengers', 1, 20, null, ['class'=>'form-control', 'placeholder'=>'Número de adultos', 'required'=>'required']) }}
    </div>
    <div class="col-md-4">
        <label for="children" class="control-label">Número de niños</label>
        {{ Form::selectRange('children', 1, 20, null, ['class'=>'form-control', 'placeholder'=>'Número de niños', 'required'=>'required']) }}
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <label for="unit" class="control-label">Vehículo</label>
        {{ Form::select('unit_id', $units, $record->unit_id, ['class'=>'form-control']) }}
    </div>
    <div class="col-md-3">
        <label for="pickup_time" class="control-label">Pick up time</label>
        {{ Form::text('pickup_time', null, ['class'=>'form-control', 'id'=>'pickup_time']) }}
    </div>
    <div class="col-md-3">
        <label for="total" class="control-label">Total</label>
        {{ Form::text('total', null, ['class'=>'form-control', 'id'=>'total', 'required'=>'required']) }}
    </div>
    <div class="col-md-3">
        <label for="unit" class="control-label">Tipo de pago</label>
        {{ Form::select('payment_type', $pagos, $record->payment_type, ['class'=>'form-control']) }}
    </div>
</div>
<div class="row">
    <div class="col-md-12"><hr></div>
</div>
<div class="row">
    <div class="col-md-3">
        <label for="arrival_date" class="control-label">Fecha de llegada</label>
        {{ Form::text('arrival_date', null, ['class'=>'form-control', 'required'=>'required', 'id'=>'arrival_date']) }}
    </div>
    <div class="col-md-3">
        <label for="arrival_airline" class="control-label">Aerolínea llegada</label>
        {{ Form::text('arrival_airline', null, ['class'=>'form-control', 'required'=>'required', 'id'=>'arrival_airline']) }}
    </div>
    <div class="col-md-3">
        <label for="arrival_flight" class="control-label">Vuelo de llegada</label>
        {{ Form::text('arrival_flight', null, ['class'=>'form-control', 'required'=>'required', 'id'=>'arrival_flight']) }}
    </div>
    <div class="col-md-3">
        <label for="arrival_time" class="control-label">Hora de llegada</label>
        {{ Form::text('arrival_time', null, ['class'=>'form-control', 'required'=>'required', 'id'=>'arrival_time']) }}
    </div>
</div>
<div class="departureFields row">
    <div class="col-md-3">
        <label for="departure_date" class="control-label">Fecha de salida</label>
        {{ Form::text('departure_date', null, ['class'=>'form-control', 'id'=>'departure_date']) }}
    </div>
    <div class="col-md-3">
        <label for="departure_airline" class="control-label">Aerolínea salida</label>
        {{ Form::text('departure_airline', null, ['class'=>'form-control', 'required'=>'required', 'id'=>'departure_airline']) }}
    </div>
    <div class="col-md-3" id="departure_flight_container">
        <label for="departure_flight" class="control-label">Vuelo de salida</label>
        {{ Form::text('departure_flight', null, ['class'=>'form-control', 'id'=>'departure_flight']) }}
    </div>
    <div class="col-md-3">
        <label for="departure_time" class="control-label">Hora de salida</label>
        {{ Form::text('departure_time', null, ['class'=>'form-control', 'id'=>'departure_time']) }}
    </div>
</div>
<div class="row">
    <div class="col-md-12"><hr></div>
</div>
<div class="row">

</div>
<div class="row">
    <div class="col-md-12">
        <label for="comments" class="control-label">Comentarios</label>
        {{ Form::textarea('comments', null, ['class'=>'form-control', 'id'=>'comments']) }}
    </div>
</div>

<div class="row">
    <div class="col-md-12 text-right submit">
        @if ($record->created_at)
            <input type="hidden" name="id" value="{{$record->id}}">
        @else
            <input type="hidden" name="resort_id" id="resort_id" value="">
            <input type="hidden" name="source" value="panel">
        @endif
        <input type="hidden" name="user_id" value="{{Auth::id()}}">
        {{ Form::button('Cancelar', ['class'=>'btn-cancelar btn btn-default']) }}
        {{ Form::submit($submit_label, ['class'=>'btn btn-primary']) }}
    </div>
</div>

{!! Form::close() !!}