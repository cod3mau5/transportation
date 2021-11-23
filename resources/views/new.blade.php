<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Transportation</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/normalize8.min.css') }}">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <!-- twitter-bootstrap-wizard css -->
        <link rel="stylesheet" href="assets/libs/twitter-bootstrap-wizard/prettify.css">

        <!-- Bootstrap 5 Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
      {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css') }}"> --}}
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


            <!-- Reservation form begin -->
            <div class="container reserve-form-container">
                
                <div class="row">

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title mb-4 fs-2">Reservation form</h2>
        
                                <div id="basic-pills-wizard" class="twitter-bs-wizard">
                                    <ul class="twitter-bs-wizard-nav">
                                        <li class="nav-item">
                                            <a href="#step1" class="nav-link" data-toggle="tab">
                                                <span class="step-number">01</span>
                                                <span class="step-title">Trip</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#step2" class="nav-link" data-toggle="tab">
                                                <span class="step-number">02</span>
                                                <span class="step-title">Contact</span>
                                            </a>
                                        </li>
                                        
                                        {{-- <li class="nav-item">
                                            <a href="#bank-detail" class="nav-link" data-toggle="tab">
                                                <span class="step-number">03</span>
                                                <span class="step-title">Bank Details</span>
                                            </a>
                                        </li> --}}
                                        <li class="nav-item">
                                            <a href="#step3" class="nav-link" data-toggle="tab">
                                                <span class="step-number">04</span>
                                                <span class="step-title">Summary</span>
                                            </a>
                                        </li>
                                    </ul>
                                     <!-- Tab panes -->
                                    <div class="tab-content twitter-bs-wizard-tab-content">
                                        <!-- ============================ STEP 1 ============================== -->
                                        <div class="tab-pane" id="step1" id="" role="tabpanel">
                                            <form id="form_step1">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            {{-- <label class="form-label" for="basicpill-firstname-input">First name</label>
                                                            <input type="text" class="form-control" id="basicpill-firstname-input"> --}}
                                                            <label for="trip_type" class="form-label">Trip Type</label>

                                                                <select id="trip_type" name="trip_type" class="form-control" required="">
                                                                    <option value="" disabled="" selected="selected" style="display:none">Trip Type</option>
                                                                    <option value="o"
                                                                        <?php if (isset($_GET['trip']) && $_GET['trip']=='o') { echo 'selected="selected"'; } ?>
                                                                    >One Way</option>
                                                                    <option value="r"
                                                                        <?php if (isset($_GET['trip']) && $_GET['trip']=='r') { echo 'selected="selected"'; } ?>
                                                                    >Roundtrip</option>
                                                                </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="basicpill-lastname-input">Last name</label>
                                                            <input type="text" class="form-control" id="basicpill-lastname-input">
                                                        </div>
                                                    </div>
                                                </div>
        
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="basicpill-phoneno-input">Phone</label>
                                                            <input type="text" class="form-control" id="basicpill-phoneno-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="basicpill-email-input">Email</label>
                                                            <input type="email" class="form-control" id="basicpill-email-input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="basicpill-address-input">Address</label>
                                                            <textarea id="basicpill-address-input" class="form-control" rows="2"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="step2">
                                            <div>
                                            <form>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="basicpill-pancard-input">PAN Card</label>
                                                            <input type="text" class="form-control" id="basicpill-pancard-input">
                                                        </div>
                                                    </div>
        
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="basicpill-vatno-input">VAT/TIN No.</label>
                                                            <input type="text" class="form-control" id="basicpill-vatno-input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="basicpill-cstno-input">CST No.</label>
                                                            <input type="text" class="form-control" id="basicpill-cstno-input">
                                                        </div>
                                                    </div>
        
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="basicpill-servicetax-input">Service Tax No.</label>
                                                            <input type="text" class="form-control" id="basicpill-servicetax-input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="basicpill-companyuin-input">Company UIN</label>
                                                            <input type="text" class="form-control" id="basicpill-companyuin-input">
                                                        </div>
                                                    </div>
        
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="basicpill-declaration-input">Declaration</label>
                                                            <input type="text" class="form-control" id="basicpill-declaration-input">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                        {{-- <div class="tab-pane" id="bank-detail">
                                            <div>
                                                <form>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="basicpill-namecard-input">Name on Card</label>
                                                                <input type="text" class="form-control" id="basicpill-namecard-input">
                                                            </div>
                                                        </div>
        
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label>Credit Card Type</label>
                                                                <select class="form-select">
                                                                    <option selected>Select Card Type</option>
                                                                    <option value="AE">American Express</option>
                                                                    <option value="VI">Visa</option>
                                                                    <option value="MC">MasterCard</option>
                                                                    <option value="DI">Discover</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="basicpill-cardno-input">Credit Card Number</label>
                                                                <input type="text" class="form-control" id="basicpill-cardno-input">
                                                            </div>
                                                        </div>
        
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="basicpill-card-verification-input">Card Verification Number</label>
                                                                <input type="text" class="form-control" id="basicpill-card-verification-input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="basicpill-expiration-input">Expiration Date</label>
                                                                <input type="text" class="form-control" id="basicpill-expiration-input">
                                                            </div>
                                                        </div>
        
                                                    </div>
                                                </form>
                                            </div>
                                        </div> --}}
                                        <div class="tab-pane" id="step3">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-6">
                                                    <div class="text-center">
                                                        <div class="mb-4">
                                                            <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                                        </div>
                                                        <div>
                                                            <h5>Confirm Detail</h5>
                                                            <p class="text-muted">If several languages coalesce, the grammar of the resulting</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                        <li class="previous"><a href="javascript: void(0);">Previous</a></li>
                                        <li class="next"><a href="javascript: void(0);">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="widget card text-center">
                            <h4 class="widget-title">Summary</h4>
                            <div class="summary-block">
                                <div class="summary-content">
                                    <div class="summary-head">
                                        <h5 class="summary-title">Start Location</h5>
                                    </div>
                                    <div class="summary-price">
                                        <p class="summary-text sm_start"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="summary-block">
                                <div class="summary-content">
                                    <div class="summary-head">
                                        <h5 class="summary-title">End Location</h5>
                                    </div>
                                    <div class="summary-price">
                                        <p class="summary-text sm_end"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="summary-block">
                                <div class="summary-content">
                                <div class="summary-head">
                                    <h5 class="summary-title sm_unit"></h5></div>
                                    <div class="summary-price">
                                        <p class="summary-text sm_price"></p>
                                        <span class="summary-small-text pull-right sm_trip"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="summary-block">
                                <div class="summary-content">
                                <div class="summary-head"> <h5 class="summary-title">Total</h5></div>
                                    <div class="summary-price">
                                        <p class="summary-text sm_price"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                    {{-- <div class="col-md-3">
                        <div class="widget">
                            <h4 class="widget-title">Summary</h4>
                            <div class="summary-block">
                                <div class="summary-content">
                                    <div class="summary-head">
                                        <h5 class="summary-title">Start Location</h5>
                                    </div>
                                    <div class="summary-price">
                                        <p class="summary-text sm_start"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="summary-block">
                                <div class="summary-content">
                                    <div class="summary-head">
                                        <h5 class="summary-title">End Location</h5>
                                    </div>
                                    <div class="summary-price">
                                        <p class="summary-text sm_end"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="summary-block">
                                <div class="summary-content">
                                <div class="summary-head">
                                    <h5 class="summary-title sm_unit"></h5></div>
                                    <div class="summary-price">
                                        <p class="summary-text sm_price"></p>
                                        <span class="summary-small-text pull-right sm_trip"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="summary-block">
                                <div class="summary-content">
                                <div class="summary-head"> <h5 class="summary-title">Total</h5></div>
                                    <div class="summary-price">
                                        <p class="summary-text sm_price"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

            </div>
            <!-- Reservation form end -->



        </div>

        {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

                <!-- JAVASCRIPT -->
                <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
                <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
                <script src="assets/libs/metismenu/metisMenu.min.js"></script>
                {{-- <script src="assets/libs/simplebar/simplebar.min.js"></script>
                <script src="assets/libs/node-waves/waves.min.js"></script> --}}
        
                <!-- twitter-bootstrap-wizard js -->
                <script src="{{ asset('assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
        
                <script src="{{ asset('assets/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>
        
                <!-- form wizard init -->
                <script>
                    $(document).ready(function(){$("#basic-pills-wizard").bootstrapWizard({tabClass:"nav nav-pills nav-justified"}),$("#progrss-wizard").bootstrapWizard({onTabShow:function(a,r,i){var t=(i+1)/r.find("li").length*100;$("#progrss-wizard").find(".progress-bar").css({width:t+"%"})}})});var triggerTabList=[].slice.call(document.querySelectorAll(".twitter-bs-wizard-nav .nav-link"));triggerTabList.forEach(function(a){var r=new bootstrap.Tab(a);a.addEventListener("click",function(a){a.preventDefault(),r.show()})});
                </script>
        
                <script src="{{ asset('assets/js/app.js') }}"></script>

        <script src="https://cdn.bootcss.com/moment.js/2.22.1/moment-with-locales.min.js"></script>
        <script src="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
        <script  src="{{asset('/assets/jquery.validate.min.js')}}"></script>
        <script  src="{{asset('/assets/additional-methods.min.js')}}"></script>
        <script  src="{{asset('/assets/jquery.blockUI.min.js')}}"></script>
        <script>
            jQuery(document).ready(function($) {

                var units = <?=json_encode($vehicles)?>;
                var rates = <?=json_encode($rates)?>;
                var start = $('#start_location option:selected').text();
                var end   = $('#end_location option:selected').text();

                if (start != '') {
                    $('.from').html( $('#start_location option:selected').text() );
                    $('.sm_start').html(start);
                }
                if (end != '') {
                    $('.to').html( $('#end_location option:selected').text() );
                    $('.sm_end').html(end);
                }

                $('#form_step1').validate();
                $('#form_step2').validate();

                fetchLocationZone(rates);

                if ($('#trip_type').val() == 'r') {
                    var start = $('#start_location option:selected').text();
                    var end   = $('#end_location option:selected').text();
                    $('.from').html(start);
                    $('.to').html(end);
                    $('.sm_start').html(start);
                    $('.sm_end').html(end);
                    $('#departure_flight_details').show();
                }

                $('#trip_type').on('change', function() {
                    $('.sm_price').html('');
                    $('.sm_unit').html('');
                    if ($(this).val() == 'r') {
                        $('.sm_trip').html('roundtrip');
                        $('#departure_flight_details').slideDown();
                    } else {
                        $('.sm_trip').html('oneway');
                        $('#departure_flight_details').slideUp();
                    }
                    fetchLocationZone(rates);
                });

                $('#start_location').on('change', function() {

                    if ($(this).val() == 0) {
                        $('#end_location').html('<?=$resort_options?>');
                    } else {
                        $('#end_location').html('<option value="0">Los Cabos Int. Airport</option>');
                        $('.sm_end').html('Los Cabos Airport');
                    }
                    var start = $('#start_location option:selected').text();
                    var end   = $('#end_location option:selected').text();
                    $('.from').html( $('#start_location option:selected').text() );
                    $('.to').html( $('#end_location option:selected').text() );

                    $('.sm_start').html(start);
                    $('.sm_end').html(end);

                    fetchLocationZone(rates);
                });

                $('#end_location').on('change', function() {
                    var end   = $('#end_location option:selected').text();
                    $('.to').html( $('#end_location option:selected').text() );
                    $('.sm_end').html(end);
                    fetchLocationZone(rates);
                });

                $('#passengers').on('change', function() {
                    fetchLocationZone(rates);
                });

                $('#vehicle').on('change', function() {
                    var price = $('#vehicle option:selected').data('price');
                    var name  = $('#vehicle option:selected').data('name');
                    $('.sm_price').html('$ ' + price + ' usd');
                    $('.info_price').html('$ ' + price + ' usd');
                    $('#_subtotal').val(price);
                    $('#_total').val(price);
                    $('.sm_unit').html(name);
                });

                $('.go_step2').on('click', function() {
                    if ($('#form_step1').valid())
                    {
                        var trip_type       = $('#trip_type').val();
                        var start_location  = $('#start_location option:selected').text();
                        var start_id        = $('#start_location').val();
                        var transport_type  = (trip_type == 'r') ? 'Round-trip' : 'One way';
                        var num_passengers  = $('#passengers').val();
                        var selectedCar     = $('#vehicle option:selected').text();
                        var unit_id         = $('#vehicle').val();
                        var end_location    = $('#end_location option:selected').text();
                        var end_id          = $('#end_location').val();

                        var arrival_date    = $('#arrival_date').val();
                        var arrival_time    = $('#arrival_time').val();
                        var arrival_airline = $('#arrival_airline option:selected').text();
                        var arrival_flight  = $('#arrival_flight').val();

                        $('.departure_block').hide();

                        if (trip_type == 'r')
                        {
                            $('.departure_block').show();
                            var departure_date    = $('#departure_date').val();
                            var departure_time    = $('#departure_time').val();
                            var departure_airline = $('#departure_airline option:selected').text();
                            var departure_flight  = $('#departure_flight').val();
                        }

                        $('#_trip_type').val(trip_type);
                        $('#_location_start').val(start_id);
                        $('#_location_end').val(end_id);
                        $('#_passengers').val(num_passengers);
                        $('#_unit').val(unit_id);
                        $('#_arrival_date').val(arrival_date);
                        $('#_arrival_time').val(arrival_time);
                        $('#_arrival_company').val(arrival_airline);
                        $('#_arrival_flight').val(arrival_flight);

                        if (trip_type == 'r')
                        {
                            $('.departure_block').show();
                            var departure_date    = $('#departure_date').val();
                            var departure_time    = $('#departure_time').val();
                            var departure_airline = $('#departure_airline option:selected').text();
                            var departure_flight  = $('#departure_flight').val();
                            $('#_departure_date').val(departure_date);
                            $('#_departure_time').val(departure_time);
                            $('#_departure_company').val(departure_airline);
                            $('#_departure_flight').val(departure_flight);
                        }

                        $('.info_start_location').html(start_location);
                        $('.info_trip_type').html(transport_type);
                        $('.info_passengers').html(num_passengers);
                        $('.info_vehicle').html(selectedCar);
                        $('.info_arrival_fight').html(arrival_flight);
                        $('.info_arrival_airline').html(arrival_airline);
                        $('.info_arrival_time').html(arrival_date+" "+arrival_time);
                        $('.info_departure_fight').html(departure_flight);
                        $('.info_departure_airline').html(departure_airline);
                        $('.info_departure_time').html(departure_date+" "+departure_time);
                        $('.info_end_location').html(end_location);

                        $('#nav-step2 a').attr('href', '#step2');
                        $('#bookTabs li:eq(1) a').tab('show');
                    }
                });

                $('.go_step3').on('click', function() {
                    if ($('#form_step2').valid()) {
                        var first_name      = $('#first_name').val();
                        var last_name       = $('#last_name').val();
                        var email           = $('#email').val();
                        var primary_phone   = $('#primary_phone').val();
                        var mobile_phone    = $('#mobile').val();
                        var request         = $('#request').val();

                        $('.info_fullname').html(first_name+" "+last_name);
                        $('.info_email').html(email);
                        $('.info_phone').html(primary_phone);
                        $('.info_mobile').html(mobile_phone);
                        $('.info_request').html(request);

                        $('#_contact_firstname').val($('#first_name').val());
                        $('#_contact_lastname').val($('#last_name').val());
                        $('#_contact_email').val($('#email').val());
                        $('#_contact_phone').val($('#primary_phone').val());
                        $('#_contact_mobile').val($('#mobile').val());
                        $('#_contact_request').val($('#request').val());

                        $('#paypal_firstname').val($('#first_name').val());
                        $('#paypal_lastname').val($('#last_name').val());
                        $('#paypal_email').val($('#email').val());

                        $('#nav-step3 a').attr('href', '#step3');
                        $('#bookTabs li:eq(2) a').tab('show');
                    }
                });

                //date & time picker
                $('#arrival_date').datetimepicker({
                    format: 'MM/DD/YYYY',
                });

                $('#departure_date').datetimepicker({
                    format: 'MM/DD/YYYY',
                    useCurrent: false //Important! See issue #1075
                });

                $("#arrival_date").on("dp.change", function (e) {
                    if ($('#departure_date').length) {
                        $('#departure_date').data("DateTimePicker").minDate(e.date);
                    }
                });

                $("#departure_date").on("dp.change", function (e) {
                    $('#arrival_date').data("DateTimePicker").maxDate(e.date);
                });

                $('#departure_time').datetimepicker({
                    format: 'LT'
                });

                $('#arrival_time').datetimepicker({
                    format: 'LT'
                });

                function fetchLocationZone(rates)
                {
                    var startLocation = $('#start_location').val();
                    var endLocation   = $('#end_location').val();

                    if ($('#trip_type').val())
                    {
                        var zone = null;

                        if (startLocation != 0 || endLocation != 0)
                        {
                            if (startLocation != 0)
                                zone = $('#start_location option:selected').data('zone');

                            if (endLocation != 0)
                                zone = $('#end_location option:selected').data('zone');
                        }

                        updateZoneUnits(zone, rates);
                    }
                }

                function updateZoneUnits(zone, rates)
                {
                    var options = '<option value="" disabled="" selected="selected" style="display:none">Type of vehicle</option>';
                    var pax = 1;

                    if ($('#passengers').val()) pax = Number($('#passengers').val());

                    for (var i=0; i<=rates.length; i++)
                    {
                        if (rates[i] != undefined && rates[i].zone_id == zone)
                        {
                            var unit_id  = rates[i].unit_id;
                            var capacity = Number(units[unit_id].capacity);
                            var unitName = units[unit_id].name;
                            var price    = $('#trip_type').val() == 'o' ? rates[i].oneway : rates[i].roundtrip;
                            if (pax <= capacity)
                            {
                                options +=  '<option value="'+unit_id+'" data-price="'+price+'" data-name="'+unitName+'">'+
                                                unitName +' from $ '+ price + ' USD '+
                                            '</option>';
                            }
                        }
                    }

                    $('#vehicle').html(options);
                    $('.sm_price').html('');
                    $('.sm_unit').html('');
                }

            });
        </script>
    </body>
</html>
