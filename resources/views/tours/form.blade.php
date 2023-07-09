@isset ($record)
    {!! Form::model($record,
        ['route'=> ['tours.update', $record->id], 'method'=>'put', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])
    !!}
@else
    {!! Form::open(['route' => 'tours.store', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
@endisset

<div class="row">
    <div class="col-md-12">
        <label for="name" class="control-label">Nombre del tour:</label>
        {{ Form::text('name', null, ['class'=>'form-control', 'required'=>'required']) }}
    </div>
</div>

<div class="row" style="margin-bottom: 2rem">
    <div class="col-md-12">
        <label for="meta_description" class="control-label">Meta Description (para Google):</label>
        {{ Form::textarea('meta_description', null, ['id' => 'meta_description', 'class' => 'form-control', 'rows'=> '2']) }}
    </div>
</div>

<div class="row" style="margin-bottom: 2rem">
    <div class="col-md-12">
        <label for="description" class="control-label">Texto del Tour:</label>
        {{ Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control']) }}
    </div>
</div>




<div class="row">
    <div class="col-md-6">
        <label for="name" class="control-label">Horarios de inicio:</label>
        {{ Form::text('start_times', null, ['class'=>'form-control', 'required'=>'required']) }}
    </div>
    <div class="col-md-6">
        <label for="name" class="control-label">Horarios de fin:</label>
        {{ Form::text('end_times', null, ['class'=>'form-control', 'required'=>'required']) }}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <label for="name" class="control-label">Costo del tour (USD):</label>
        {{ Form::number('cost', null, ['class'=>'form-control', 'required'=>'required']) }}
    </div>
</div>


<div class="row"  style="margin:3rem auto">
    <div class="col-md-2">
        <label for="images" class="control-label">Imágenes:</label>
    </div>
    <div class="col-md-10">
        {{ Form::file('images[]', ['class' => 'form-control-file', 'multiple' => true]) }}
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
                        {{ Form::radio('cover', $imagen->id, $imagen->category === 'cover', ['class' => 'form-check-input']) }}
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
            {{ Form::button('Cancelar', ['class'=>'btn-cancelar btn btn-default btn-block']) }}
            <input type="hidden" name="id" value="{{$record->id}}">
        @endisset
        {{ Form::submit($submit_label, ['class'=>'btn btn-primary btn-block']) }}
    </div>
</div>


{!! Form::close() !!}

<script src="https://cdn.ckeditor.com/4.16.0/full-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description', {
        removePlugins: 'image',
        filebrowserImageBrowseUrl: '{{base_path("public_html/assets/images/resort_images/")}}',
    });
</script>
