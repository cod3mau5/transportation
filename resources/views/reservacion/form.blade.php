@isset($record->created_at)
    {!! Html::form('PUT', route('reservacion.update', $record->id))->class('form-horizontal')->open() !!}
@else
    {!! Html::form('POST', route('reservacion.store'))->class('form-horizontal')->open() !!}
@endisset

@if ($record->created_at)
<div class="row">
    <div class="col-md-3">
        {!! Html::label('created_at', 'Fecha y hora de captura')->class('control-label') !!}
        <input type="text" class="form-control" disabled="disabled"
               value="{{$record->created_at->timezone('America/Mazatlan')->toDateTimeString()}}" name="created_at">
    </div>
    <div class="col-md-3">
        {!! Html::label('user_id', 'Capturada por')->class('control-label') !!}
        {!! Html::select('user_id', $usuarios, $record->user_id)->class('form-control')->attribute('disabled', true) !!}
    </div>
    <div class="col-md-3">
        {!! Html::label('updated_at', 'Última modificación')->class('control-label') !!}
        <input type="text" class="form-control" disabled="disabled"
               value="{{$record->updated_at->timezone('America/Mazatlan')->toDateTimeString()}}" name="updated_at">
    </div>
    <div class="col-md-3">
        {!! Html::label('source', 'Origen')->class('control-label') !!}
        <input type="text" class="form-control" disabled="disabled"
               value="{{$record->source}}" name="updated_at">
    </div>
    <hr>
</div>
@endif

<div class="row">
    <div class="col-md-3">
        {!! Html::label('voucher', 'No. de voucher')->class('control-label') !!}
        {!! Html::text('voucher', $record->voucher ?? null)->id('voucher')->class('form-control') !!}
    </div>
    <div class="col-md-3">
        {!! Html::label('fullname', 'Nombre')->class('control-label') !!}
        {!! Html::text('fullname', $record->fullname ?? null)->class('form-control')->required() !!}
    </div>
    <div class="col-md-3">
        {!! Html::label('email', 'Correo electrónico')->class('control-label') !!}
        {!! Html::text('email', $record->email ?? null)->class('form-control') !!}
    </div>
    <div class="col-md-3">
        {!! Html::label('phone', 'Teléfono')->class('control-label') !!}
        {!! Html::text('phone', $record->phone ?? null)->class('form-control') !!}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Html::label('type', 'Tipo de servicio')->class('control-label') !!}
        {!! Html::select('type', $tipos, $record->type ?? null)->id('tipo_servicio')->class('form-control') !!}
    </div>
    <div class="col-md-4">
        {!! Html::label('location_start', 'Origen')->class('control-label') !!}
        {!! Html::select('location_start', $resorts, $record->location_start ?? null)->id('location_start')->class('form-control') !!}
    </div>
    <div class="col-md-4">
        {!! Html::label('location_end', 'Destino')->class('control-label') !!}
        {!! Html::select('location_end', $resorts, $record->location_end ?? null)->id('location_end')->class('form-control') !!}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Html::label('total_travelers', 'Total de pasajeros')->class('control-label') !!}
        {!! Html::number('total_travelers', $record->total_travelers ?? null)->id('total_travelers')->class('form-control')->attribute('disabled', true)->placeholder('Total de pasajeros') !!}
    </div>
    <div class="col-md-4">
        {!! Html::label('passengers', 'Número de adultos')->class('control-label') !!}
        <select name="passengers" id="passengers" class="form-control" required>
            <option value="">Número de adultos</option>
            @for ($i = 1; $i <= 20; $i++)
                <option value="{{ $i }}" {{ isset($record->passengers) && $record->passengers == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
    </div>
    <div class="col-md-4">
        {!! Html::label('children', 'Número de niños')->class('control-label') !!}
        <select name="children" id="children" class="form-control" required>
            <option value="">Número de niños</option>
            @for ($i = 1; $i <= 20; $i++)
                <option value="{{ $i }}" {{ isset($record->children) && $record->children == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        {!! Html::label('unit_id', 'Vehículo')->class('control-label') !!}
        {!! Html::select('unit_id', $units, $record->unit_id ?? null)->class('form-control') !!}
    </div>
    <div class="col-md-3">
        {!! Html::label('pickup_time', 'Pick up time')->class('control-label') !!}
        {!! Html::text('pickup_time', $record->pickup_time ?? null)->id('pickup_time')->class('form-control') !!}
    </div>
    <div class="col-md-3">
        {!! Html::label('total', 'Total')->class('control-label') !!}
        {!! Html::text('total', $record->total ?? null)->id('total')->class('form-control')->required() !!}
    </div>
    <div class="col-md-3">
        {!! Html::label('payment_type', 'Tipo de pago')->class('control-label') !!}
        {!! Html::select('payment_type', $pagos, $record->payment_type ?? null)->class('form-control') !!}
    </div>
</div>

<div class="row">
    <div class="col-md-12"><hr></div>
</div>

<div class="row">
    <div class="col-md-3">
        {!! Html::label('arrival_date', 'Fecha de llegada')->class('control-label') !!}
        {!! Html::text('arrival_date', $record->arrival_date ?? null)->id('arrival_date')->class('form-control')->required() !!}
    </div>
    <div class="col-md-3">
        {!! Html::label('arrival_airline', 'Aerolínea llegada')->class('control-label') !!}
        {!! Html::text('arrival_airline', $record->arrival_airline ?? null)->id('arrival_airline')->class('form-control')->required() !!}
    </div>
    <div class="col-md-3">
        {!! Html::label('arrival_flight', 'Vuelo de llegada')->class('control-label') !!}
        {!! Html::text('arrival_flight', $record->arrival_flight ?? null)->id('arrival_flight')->class('form-control')->required() !!}
    </div>
    <div class="col-md-3">
        {!! Html::label('arrival_time', 'Hora de llegada')->class('control-label') !!}
        {!! Html::text('arrival_time', $record->arrival_time ?? null)->id('arrival_time')->class('form-control')->required() !!}
    </div>
</div>

<div class="departureFields row">
    <div class="col-md-3">
        {!! Html::label('departure_date', 'Fecha de salida')->class('control-label') !!}
        {!! Html::text('departure_date', $record->departure_date ?? null)->id('departure_date')->class('form-control') !!}
    </div>
    <div class="col-md-3">
        {!! Html::label('departure_airline', 'Aerolínea salida')->class('control-label') !!}
        {!! Html::text('departure_airline', $record->departure_airline ?? null)->id('departure_airline')->class('form-control')->required() !!}
    </div>
    <div class="col-md-3" id="departure_flight_container">
        {!! Html::label('departure_flight', 'Vuelo de salida')->class('control-label') !!}
        {!! Html::text('departure_flight', $record->departure_flight ?? null)->id('departure_flight')->class('form-control') !!}
    </div>
    <div class="col-md-3">
        {!! Html::label('departure_time', 'Hora de salida')->class('control-label') !!}
        {!! Html::text('departure_time', $record->departure_time ?? null)->id('departure_time')->class('form-control') !!}
    </div>
</div>

<div class="row">
    <div class="col-md-12"><hr></div>
</div>

<div class="row">
    <div class="col-md-12">
        {!! Html::label('comments', 'Comentarios')->class('control-label') !!}
        {!! Html::textarea('comments', $record->comments ?? null)->id('comments')->class('form-control') !!}
    </div>
</div>

<div class="row">
    <div class="col-md-12 text-right submit">
        @if ($record->created_at)
            {!! Html::hidden('id', $record->id) !!}
        @else
            {!! Html::hidden('resort_id', null)->id('resort_id') !!}
            {!! Html::hidden('source', 'panel') !!}
        @endif
        {!! Html::hidden('user_id', Auth::id()) !!}
        {!! Html::button('Cancelar')->class('btn-cancelar btn btn-default') !!}
        {!! Html::submit($submit_label)->class('btn btn-primary') !!}
    </div>
</div>

</form>
