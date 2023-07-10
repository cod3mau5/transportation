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
            <h3 class="box-title"><strong>VISITAS DE LA PAGINA</strong></h3>
            {{-- <button type="button" class="btn btn-primary pull-right" id="abrir_modal"
                data-toggle="collapse" href="#agregar" aria-expanded="false"
                aria-controls="agregar"
            >
                Nuevo
            </button> --}}
        </div>
        <div class="box-body">
            {{-- <div class="collapse" id="agregar">
                @include('zonas.form')
            </div> --}}
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
                            <tr id="1" role="row" class="odd">
                                @foreach ($visits as $visit )
                                    <td>{{$visit->device}}</td>
                                    <td>{{$visit->location}}</td>
                                    <td>{{$visit->browser}}</td>
                                    <td>{{$visit->referer}}</td>
                                    <td>{{$visit->updated_at}}</td>
                                @endforeach
                            </tr>
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

            // $.ajaxSetup({
            //     headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
            // });

            // var table = $('#datatable').DataTable({
            //     pageLength: 25,
            //     processing: true,
            //     serverSide: true,
            //     ajax: '{!! route('zonas.data') !!}',
            //     columns: [
            //         { data: 'nombre', name: 'nombre' },
            //         { data: 'action',  name: 'action', orderable: false, searchable: false }
            //     ],
            //     rowId: 'id',
            //     createdRow: function( row, data, dataIndex ) {
            //         $( row ).find('td:eq(1)').css('text-align', 'right');
            //     }
            // });

            // $('.form-horizontal').validate();

        });
    </script>
@endsection
