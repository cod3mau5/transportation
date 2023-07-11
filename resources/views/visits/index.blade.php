@extends ('layouts.boxed')

@section ('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/administracion">Administración</a>
        </li>
        <li class="breadcrumb-item active">Visitas</li>
    </ol>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><strong>TODAS LAS VISITAS</strong></h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th>Dispositivo</th>
                                <th>Lugar</th>
                                <th>Navegador</th>
                                <th>Origen</th>
                                <th>Ultima visita</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($visits as $visit )
                                <tr id="1" role="row" class="odd">
                                    <td>{{$visit->device}}</td>
                                    <td>{{$visit->location}}</td>
                                    <td>{{$visit->browser}}</td>
                                    <td>{{$visit->referer}}</td>
                                    <td>{{$visit->updated_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.box-body -->
    </div>

@endsection


@section ('footer-scripts')
    <script>
        $(document).ready(function() {


        });
    </script>
@endsection
