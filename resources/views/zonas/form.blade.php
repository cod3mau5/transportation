@isset ($zona)
{!! Form::model($zona, ['route'=> ['zonas.update', $zona->id], 'method'=>'put', 'class'=>'form-horizontal']) !!}
@else
{!! Form::open(['route' => 'zonas.store', 'class' => 'form-horizontal']) !!}
@endisset

<div class="row">
    <div class="col-md-12">
        {{ Form::label('nombre', 'Nombre de la zona:',  [ 'class' => 'control-label']) }}
        {{ Form::text('nombre', null, ['id'=>'nombre', 'class'=>'form-control','required'=>'required','placeholder'=>'Nombre']) }}
    </div>
</div>
@isset ($zona)
    <div class="row">
        <div class="col-md-6">
            {{ Form::label('oneway','Precio one way:',['class'=>'control-label']) }}
            {{ Form::number('oneway', $zona->price->oneway,  ['id'=>'nombre', 'class'=>'form-control','required'=>'required','placeholder'=>'Nombre']) }}
        </div>
        <div class="col-md-6">
            {{ Form::label('roundtrip','Precio round trip:',['class'=>'control-label']) }}
            {{ Form::number('roundtrip', $zona->price->roundtrip,  ['id'=>'nombre', 'class'=>'form-control','required'=>'required','placeholder'=>'Nombre']) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {{ Form::label('privateoneway','Precio one way (6-10 pax):',['class'=>'control-label']) }}
            {{ Form::number('privateoneway', $zona->price->privateoneway,  ['id'=>'nombre', 'class'=>'form-control','required'=>'required','placeholder'=>'Nombre']) }}
        </div>
        <div class="col-md-6">
            {{ Form::label('privateroundtrip','Precio round trip (6-10 pax):',['class'=>'control-label']) }}
            {{ Form::number('privateroundtrip', $zona->price->privateroundtrip,  ['id'=>'nombre', 'class'=>'form-control','required'=>'required','placeholder'=>'Nombre']) }}
        </div>
    </div>
@else
    <div class="row">
        <div class="col-md-6">
            {{ Form::label('oneway','Precio one way:',['class'=>'control-label']) }}
            {{ Form::number('oneway', null,  ['id'=>'nombre', 'class'=>'form-control','required'=>'required','placeholder'=>'Nombre']) }}
        </div>
        <div class="col-md-6">
            {{ Form::label('roundtrip','Precio round trip:',['class'=>'control-label']) }}
            {{ Form::number('roundtrip', null,  ['id'=>'nombre', 'class'=>'form-control','required'=>'required','placeholder'=>'Nombre']) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {{ Form::label('privateoneway','Precio one way (6-10 pax):',['class'=>'control-label']) }}
            {{ Form::number('privateoneway', null,  ['id'=>'nombre', 'class'=>'form-control','required'=>'required','placeholder'=>'Nombre']) }}
        </div>
        <div class="col-md-6">
            {{ Form::label('privateroundtrip','Precio round trip (6-10 pax):',['class'=>'control-label']) }}
            {{ Form::number('privateroundtrip', null,  ['id'=>'nombre', 'class'=>'form-control','required'=>'required','placeholder'=>'Nombre']) }}
        </div>
    </div>
@endisset

@isset($zona)

{{ Form::button('Cancelar', ['class'=>'btn-cancelar btn btn-default float-right mx-2']) }}
@endisset
{{ Form::submit($submit_label, ['class'=>'btn btn-primary float-right']) }}

{!! Form::close() !!}