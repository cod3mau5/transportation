@isset ($record)
    {!! Form::model($record,
        ['route'=> ['hotel.update', $record->id], 'method'=>'put', 'class'=>'form-horizontal'])
    !!}
@else
    {!! Form::open(['route' => 'hotel.store', 'class' => 'form-horizontal']) !!}
@endisset

<div class="row">
    <div class="col-md-2">
        <label for="name" class="control-label">Nombre del hotel:</label>
    </div>
    <div class="col-md-3">
        {{ Form::text('name', null, ['class'=>'form-control', 'required'=>'required']) }}
    </div>
    <div class="col-md-2">
        <label for="zone_id" class="control-label">Zona:</label>
    </div>
    <div class="col-md-3">
        {{ Form::select('zone_id', $zonas, null,
            ['id'=>'zona_id', 'class'=>'form-control', 'placeholder'=>'Seleccione una zona', 'required'=>'required']
        )}}
    </div>
    <div class="col-md-2">
        @isset($record)
        {{ Form::button('Cancelar', ['class'=>'btn-cancelar btn btn-default btn-block']) }}
        <input type="hidden" name="id" value="{{$record->id}}">
        @endisset
        {{ Form::submit($submit_label, ['class'=>'btn btn-primary btn-block']) }}
    </div>
</div>

{!! Form::close() !!}