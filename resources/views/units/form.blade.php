@isset($unit)
    {!! Html::form('PUT', route('units.update', $unit->id))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() !!}
@else
    {!! Html::form('POST', route('units.store'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() !!}
@endisset

<div class="row">
    <div class="col-md-12">
        {!! Html::label('name', 'Nombre de la unidad:')->class('control-label') !!}
        {!! Html::text('name', $unit->name ?? null)->class('form-control')->required() !!}
    </div>
</div>
{{-- vamos a agregar un input para la capacidad de tipo numerico con un min de 1 y un max de 50 --}}
<div class="row" style="margin-bottom: 2rem">
    <div class="col-md-12">
        {!! Html::label('capacity', 'Capacidad (niños y adultos):')->class('control-label') !!}
        {!! Html::number('capacity', $unit->capacity ?? null )
        ->class('form-control')->attribute('min', 1)->attribute('max', 50)->required() !!}
    </div>
</div>


<div class="row">
    <div class="col-md-12" style="margin:5rem auto">
        @isset($unit)
            {!! Html::button('Cancelar')->class('btn-cancelar btn btn-default btn-block') !!}
            {!! Html::hidden('id', $unit->id) !!}
        @endisset
        {!! Html::submit($submit_label)->class('btn btn-primary btn-block') !!}
    </div>
</div>

</form>
