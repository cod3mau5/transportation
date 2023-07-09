@extends ('layouts.boxed')

@section ('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/administracion">Administración</a>
    </li>
    <li class="breadcrumb-item active">Tours</li>
</ol>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><strong>TOURS</strong></h3>
        <button type="button" class="btn btn-primary pull-right"
                data-toggle="collapse"
                href="#agregar"
                aria-expanded="false"
                aria-controls="agregar"
        >
            Nuevo tour
        </button>
    </div>
    <div class="box-body">
        <div class="collapse" id="agregar">
            @include('tours.form')
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Duracion</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>
@endsection


@section ('footer-scripts')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
            });

            var table = $('#datatable').DataTable({
                pageLength: 25,
                processing: true,
                serverSide: true,
                ajax: '{!! route('tours.data') !!}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'duration', name: 'duration' },
                    { data: 'action',  name: 'action', orderable: false, searchable: false }
                ],
                rowId: 'id',
                createdRow: function( row, data, dataIndex ) {
                    $( row ).find('td:eq(5)').css('text-align', 'center');
                }
            });

            $('.form-horizontal').validate();

        });
    </script>
@endsection
