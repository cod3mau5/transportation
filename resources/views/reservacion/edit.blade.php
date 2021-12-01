@extends ('layouts.boxed')

@section ('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><strong>EDITAR RESERVACION</strong></h3>
    </div>
    <div class="box-body">
        <div id="agregar">
            @include('reservacion.form')
        </div>
    </div><!-- /.box-body -->
</div>
@endsection

@section ('footer-scripts')
    <script>
        $(document).ready(function() {

            checkTipoServicio();

            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
            });

            $('#departure_date').mask('00/00/0000', {placeholder: "__/__/____"});
            $('#arrival_date').mask('00/00/0000', {placeholder: "__/__/____"});

            $('#arrival_time').mask('00:00', {placeholder: "__:__ __"});
            $('#departure_time').mask('00:00', {placeholder: "__:__ __"});
            $('#pickup_time').mask('00:00', {placeholder: "__:__ __"});

            $('#pickup_time').datetimepicker({ format: 'hh:mm A' });
            $('#departure_time').datetimepicker({ format: 'hh:mm A' });
            $('#arrival_time').datetimepicker({ format: 'hh:mm A' });

            //fix maxlenght on this inputs
            $('#arrival_time').prop('maxlength', '8');
            $('#departure_time').prop('maxlength', '8');
            $('#pickup_time').prop('maxlength', '8');

            $('#departure_time').on('dp.change', function(e) {
                var pickup_time = moment(e.date).add(-3, 'hours').format('hh:mm A');
                $('#pickup_time').val(pickup_time);
            });

            $("#total").keypress(function (e) {
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

            $('#voucher').prop('readonly', true);

            $('#tipo_servicio').on('change', function() {
                checkTipoServicio();
            });
            $('#location_start').on('change', function() {
                checkTipoServicio();
            });
            $('#location_end').on('change', function() {
                checkTipoServicio();
            });

            function checkTipoServicio()
            {
                var selected        = $('#tipo_servicio option:selected').val();
                var location_start  = $('#location_start').val();
                var location_end    = $('#location_end').val();
                if (selected == 'roundtrip')
                {
                    $('#departure_date').attr('required', 'required').prop('readonly', false);
                    $('#departure_flight').attr('required', 'required').prop('readonly', false);
                    $('#departure_time').attr('required', 'required').prop('readonly', false);
                    $('#departure_airline').attr('required', 'required').prop('readonly', false);
                    $('#arrival_date').attr('required', 'required').prop('readonly', false);
                    $('#arrival_flight').attr('required', 'required').prop('readonly', false);
                    $('#arrival_time').attr('required', 'required').prop('readonly', false);
                    $('#arrival_airline').attr('required', 'required').prop('readonly', false);
                } else {
                    //one way llegada
                    if (location_start == 0)
                    {
                        $('#departure_date').removeAttr('required').val('').prop('readonly', true);
                        $('#departure_flight').removeAttr('required').val('').prop('readonly', true);
                        $('#departure_time').removeAttr('required').val('').prop('readonly', true);
                        $('#departure_airline').removeAttr('required').val('').prop('readonly', true);

                        $('#arrival_date').prop('readonly', false);
                        $('#arrival_flight').prop('readonly', false);
                        $('#arrival_time').prop('readonly', false);
                        $('#arrival_airline').prop('readonly', false);
                    }

                    //one way salida
                    if (location_end == 0)
                    {
                        $('#arrival_date').val('').prop('readonly', true);
                        $('#arrival_flight').val('').prop('readonly', true);
                        $('#arrival_time').val('').prop('readonly', true);
                        $('#arrival_airline').val('').prop('readonly', true);
                        $('#departure_date').prop('readonly', false);
                        $('#departure_flight').prop('readonly', false);
                        $('#departure_time').prop('readonly', false);
                        $('#departure_airline').prop('readonly', false);

                        $('#arrival_date').removeAttr('required');
                        $('#arrival_flight').removeAttr('required');
                        $('#arrival_time').removeAttr('required');
                        $('#arrival_airline').removeAttr('required');
                    }
                }

            }

        });
    </script>
@endsection
