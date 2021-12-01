@extends ('layouts.boxed')

@section ('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Usuarios</h3>
        <a class="btn btn-success pull-right" href="/user/create">Nuevo usuario</a>
    </div>
    <div class="box-body">
        @if (session('status'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Warning!</strong> {{ session('status') }}
            </div>
        @endif
        <table class="table table-bordered" id="users-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Correo electrónico</th>
                    <th>Rol / Perfil</th>
                    <th class="text-center">Registro</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
<!-- /.box-body -->
</div>

@endsection

@section('footer-scripts')
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                pageLength: 25,
                processing: true,
                serverSide: true,
                ajax: '{!! route('user.data') !!}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'username', name: 'username' },
                    { data: 'email', name: 'email' },
                    { data: 'rol', name: 'rol' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                createdRow: function( row, data, dataIndex ) {
                    $( row ).find('td:eq(4)').css('text-align', 'center');
                }
            });

            $('.form-horizontal').validate();
        });
    </script>
@endsection