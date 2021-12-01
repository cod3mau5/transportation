@extends ('layouts.boxed')

@section ('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/administracion">Administración</a>
    </li>
    <li class="breadcrumb-item active">Editar Zona</li>
</ol>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><strong>EDITAR ZONA</strong></h3>
            </div>
            <div class="box-body">

                @include('zonas.form')

            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
@endsection
