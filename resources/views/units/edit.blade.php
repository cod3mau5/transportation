@extends ('layouts.boxed')

@section ('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/administracion">Administración</a>
    </li>
    <li class="breadcrumb-item">
        <a href="/administracion/units">Unidades</a>
    </li>
    <li class="breadcrumb-item active">Editar Unidad</li>
</ol>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><strong>EDITAR UNIDARD</strong></h3>
    </div>
    <div class="box-body">
        <div id="agregar">
            @include('units.form')
        </div>
    </div><!-- /.box-body -->
</div>
@endsection

@section ('footer-scripts')
    <script>
        $(document).ready(function() {
            $('.form-horizontal').validate();
        });
    </script>
@endsection
