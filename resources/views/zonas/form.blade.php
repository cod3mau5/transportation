@isset($zona)
    {!! Html::form('PUT', route('zonas.update', $zona->id))->class('form-horizontal')->open() !!}
@else
    {!! Html::form('POST', route('zonas.store'))->class('form-horizontal')->open() !!}
@endisset

<div class="row">
    <div class="col-md-12">
        {!! Html::label('nombre', 'Nombre de la zona:')->class('control-label') !!}
        {!! Html::text('nombre', $zona->nombre ?? null)->id('nombre')->class('form-control')->required()->placeholder('Nombre') !!}
    </div>
</div>

@isset($zona)
    <div class="row">
        <div class="col-md-6">
            {!! Html::label('oneway','Precio one way:')->class('control-label') !!}
            {!! Html::number('oneway', $zona->price->oneway)->id('oneway')->class('form-control')->required()->placeholder('Precio one way') !!}
        </div>
        <div class="col-md-6">
            {!! Html::label('roundtrip','Precio round trip:')->class('control-label') !!}
            {!! Html::number('roundtrip', $zona->price->roundtrip)->id('roundtrip')->class('form-control')->required()->placeholder('Precio round trip') !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            {!! Html::label('privateoneway','Precio one way (6-10 pax):')->class('control-label') !!}
            {!! Html::number('privateoneway', $zona->price->privateoneway)->id('privateoneway')->class('form-control')->required()->placeholder('Precio privado one way') !!}
        </div>
        <div class="col-md-6">
            {!! Html::label('privateroundtrip','Precio round trip (6-10 pax):')->class('control-label') !!}
            {!! Html::number('privateroundtrip', $zona->price->privateroundtrip)->id('privateroundtrip')->class('form-control')->required()->placeholder('Precio privado round trip') !!}
        </div>
    </div>
@else
    <div class="row">
        <div class="col-md-6">
            {!! Html::label('oneway','Precio one way:')->class('control-label') !!}
            {!! Html::number('oneway')->id('oneway')->class('form-control')->required()->placeholder('Precio one way') !!}
        </div>
        <div class="col-md-6">
            {!! Html::label('roundtrip','Precio round trip:')->class('control-label') !!}
            {!! Html::number('roundtrip')->id('roundtrip')->class('form-control')->required()->placeholder('Precio round trip') !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            {!! Html::label('privateoneway','Precio one way (6-10 pax):')->class('control-label') !!}
            {!! Html::number('privateoneway')->id('privateoneway')->class('form-control')->required()->placeholder('Precio privado one way') !!}
        </div>
        <div class="col-md-6">
            {!! Html::label('privateroundtrip','Precio round trip (6-10 pax):')->class('control-label') !!}
            {!! Html::number('privateroundtrip')->id('privateroundtrip')->class('form-control')->required()->placeholder('Precio privado round trip') !!}
        </div>
    </div>
@endisset

@isset($zona)
    {!! Html::button('Cancelar')->class('btn-cancelar btn btn-default float-right mx-2') !!}
@endisset

{!! Html::submit($submit_label)->class('btn btn-primary float-right') !!}

</form>
