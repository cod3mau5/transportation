@isset($record)
    {!! Html::form('PUT', route('tours.update', $record->id))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() !!}
@else
    {!! Html::form('POST', route('tours.store'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() !!}
@endisset

<div class="row">
    <div class="col-md-12">
        {!! Html::label('name', 'Nombre del tour:')->class('control-label') !!}
        {!! Html::text('name', $record->name ?? null)->class('form-control')->required() !!}
    </div>
</div>

<div class="row" style="margin-bottom: 2rem">
    <div class="col-md-12">
        {!! Html::label('meta_description', 'Meta Description (para Google):')->class('control-label') !!}
        {!! Html::textarea('meta_description', $record->meta_description ?? null)->id('meta_description')->class('form-control')->rows(2) !!}
    </div>
</div>

<div class="row" style="margin-bottom: 2rem">
    <div class="col-md-12">
        {!! Html::label('description', 'Texto del Tour:')->class('control-label') !!}
        {!! Html::textarea('description', $record->description ?? null)->id('description')->class('form-control') !!}
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        {!! Html::label('start_times', 'Horarios de inicio:')->class('control-label') !!}
        {!! Html::text('start_times', $record->start_times ?? null)->class('form-control')->required() !!}
    </div>
    <div class="col-md-6">
        {!! Html::label('end_times', 'Horarios de fin:')->class('control-label') !!}
        {!! Html::text('end_times', $record->end_times ?? null)->class('form-control')->required() !!}
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        {!! Html::label('cost', 'Costo del tour (USD):')->class('control-label') !!}
        {!! Html::number('cost', $record->cost ?? null)->class('form-control')->required() !!}
    </div>
</div>

<div class="row" style="margin:3rem auto">
    <div class="col-md-2">
        {!! Html::label('images', 'Imágenes:')->class('control-label') !!}
    </div>
    <div class="col-md-10">
        {!! Html::file('images[]')->class('form-control-file')->attribute('multiple', true) !!}
    </div>
</div>

@isset($record)
    @if (!empty($record->images->toArray()))
        <div class="row">
            <div class="col-md-12">
                <label>Imágenes existentes (marque las que desea eliminar):</label>
            </div>
            @foreach($record->images as $imagen)
                <div class="col-md-3">
                    <img src="{{ asset($imagen->path) }}" alt="Imagen" width="100px" height="100px">
                    <label>
                        <input type="checkbox" name="eliminar[]" value="{{ $imagen->id }}"> Eliminar
                    </label>
                    <div class="form-check">
                        {!! Html::radio('cover', $imagen->id, $imagen->category === 'cover')->class('form-check-input') !!}
                        <label class="form-check-label" for="cover">Establecer como portada</label>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endisset

<div class="row">
    <div class="col-md-12" style="margin:5rem auto">
        @isset($record)
            {!! Html::button('Cancelar')->class('btn-cancelar btn btn-default btn-block') !!}
            {!! Html::hidden('id', $record->id) !!}
        @endisset
        {!! Html::submit($submit_label)->class('btn btn-primary btn-block') !!}
    </div>
</div>

</form>

<script src="https://cdn.ckeditor.com/4.16.0/full-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
        removePlugins: 'image',
        filebrowserImageBrowseUrl: '{{base_path("public_html/assets/images/resort_images/")}}',
    });
</script>
