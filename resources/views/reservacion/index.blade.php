@extends ('layouts.boxed')

@section ('content')
<style>
    #datatable tbody {
        font-size: 12px !important;
    }
    th.text-center.sorting_disabled {
        width: 70px !important;
    }
    .delete-form { display: inline-block; }
</style>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><strong>RESERVACIONES</strong></h3>
         <a href="/reservacion/create" class="pull-right btn btn-default">Agregar</a>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Voucher</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Tipo</th>
                            <th>Llegada</th>
                            <th>Salida</th>
                            <th>Total</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>

<div class="modal fade" id="openserviceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Servicio abierto</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Comentarios adicionales o necesidades especiales:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary save-comments">Guardar</button>
             </div>
        </div>
    </div>
</div>
@endsection


@section ('footer-scripts')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
            });

            $('#departure_date')
                .mask('00/00/0000', {placeholder: "__/__/____"})
                .datetimepicker({ format: 'DD/MM/YYYY'});

            $('#arrival_date')
                .mask('00/00/0000', {placeholder: "__/__/____"})
                .datetimepicker({ format: 'DD/MM/YYYY'});

            $('#arrival_time').mask('00:00', {placeholder: "__:__ __"});
            $('#departure_time').mask('00:00', {placeholder: "__:__ __"});
            $('#pickup_time').mask('00:00', {placeholder: "__:__ __"});

            $('#pickup_time').datetimepicker({ format: 'hh:mm A' });
            $('#arrival_time').datetimepicker({ format: 'hh:mm A' });

            $('#departure_time').datetimepicker({ format: 'hh:mm A' });
            $('#departure_time').on('dp.change', function(e) {
                var pickup_time = moment(e.date).add(-3, 'hours').format('hh:mm A');
                $('#pickup_time').val(pickup_time);
            });

            //fix maxlenght on this inputs
            $('#arrival_time').prop('maxlength', '8');
            $('#departure_time').prop('maxlength', '8');
            $('#pickup_time').prop('maxlength', '8');

            var table = $('#datatable').DataTable({
                pageLength: 10,
                processing: true,
                serverSide: true,
                ajax: '{!! route('reservacion.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'voucher', name: 'voucher' },
                    { data: 'fullname', name: 'fullname' },
                    { data: 'email', name: 'email' },
                    { data: 'type', name: 'type' },
                    { data: 'arrival_date', name: 'arrival_date' },
                    { data: 'departure_date', name: 'departure_date' },
                    { data: 'total', name: 'total' },
                    { data: 'action',  name: 'action', orderable: false, searchable: false }
                ],
                rowId: 'id',
                createdRow: function( row, data, dataIndex ) {
                    $( row ).find('td:eq(4)').css('text-align', 'center');
                },
                order: [ [0, 'desc'] ],
                pageResize: true
            });

            $('#tipo_servicio_id').on('change', function() {
                var selected = $('#tipo_servicio_id option:selected').data('tipo');
                //reset values to their defaults
                // $('.departureFields').slideUp();
                // $('.departureFields input').removeAttr('required');
                // $('#arrival_date').prop('readonly', false);
                // $('#arrival_flight').prop('readonly', false);
                // $('#arrival_time').prop('readonly', false);
                // $('#departure_time').prop('readonly', false);
                // $('#departure_resort_container').hide();
                // $('#departure_flight_container').show();

                //roundtrip
                // if (selected == 'rt') {
                //     $('.departureFields').slideDown();
                //     $('#departure_time').prop('maxlength', '8');
                //     $('#pickup_time').prop('maxlength', '8');
                //     $('.departureFields input').attr('required', 'required');
                // }
                //open service
                // if (selected == 'os') {
                //     value = $('#special_comments').val();
                //     if (value != '') $('#message-text').val(value);
                // }
                //one way salida
                // if (selected == 'ws') {
                //     $('.departureFields').slideDown();
                //     $('#arrival_date').prop('readonly', true).removeAttr('required');
                //     $('#arrival_flight').prop('readonly', true).removeAttr('required');
                //     $('#arrival_time').prop('readonly', true).removeAttr('required');
                //     $('.departureFields input').attr('required', 'required');
                // }
                //one way hotel
                // if (selected == 'wh') {
                //     $('#departure_resort_container').show();
                //     $('#departure_flight_container').hide();
                //     $('.departureFields').slideDown();
                //     $('#arrival_date').prop('readonly', true).removeAttr('required');
                //     $('#arrival_flight').prop('readonly', true).removeAttr('required');
                //     $('#arrival_time').prop('readonly', true).removeAttr('required');
                //     $('#departure_time').prop('readonly', true);
                // }
            });

            // $('#clase_servicio_id').on('change', function() {
            //     var selected = $(this).val();
            //     if (Number(selected) == 2) {
            //         $('#openserviceModal').modal('show');
            //         if ($('.adicionales').hasClass('hidden')) $('.adicionales').removeClass('hidden');
            //     } else {
            //         if (!$('.adicionales').hasClass('hidden')) $('.adicionales').addClass('hidden');
            //     }
            // });

            // $('body').on('click', '.save-comments', function() {
            //     var value = $('#message-text').val();
            //     if (value != '') {
            //         $('#special_comments').val(value);
            //     }
            //     $('#openserviceModal').modal('hide');
            //     // $('.adicionales').removeClass('hidden');
            // });

            // $('#forma_pago_id').on('change', function() {
            //     if ($(this).val() == 4) {
            //         $('#pago_estatus').val('pendiente');
            //     } else {
            //         $('#pago_estatus').val('pagada');
            //     }
            // });

            // $('a.adicionales').on('click', function() {
            //     var value = $('#special_comments').val();
            //     if (value != '') $('#message-text').val(value);
            //     $('#openserviceModal').modal('show');
            // });

            $("#amount").keypress(function (e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });

            $('.form-horizontal').validate({
                rules: {
                    arrival_date: {
                       validDate: true
                    },
                    departure_date: {
                        validDate: true
                    }
                }
            });

        });
    </script>
@endsection
