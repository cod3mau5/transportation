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
        <style>
            #departure_flight_details{
                display: none;
            }
        </style>
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
                                        <div class="tab-pane" id="step1" role="tabpanel">
                                            <form id="form_step1">
                                                <div class="row">
                                                    <div class="col-lg-4">
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
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="start_location" class="form-label">Start Location</label>
                                                            <select id="start_location" name="start_location" class="form-control" required="">
                                                                <option value="" disabled="" selected="selected" style="display:none">
                                                                    Start Location
                                                                </option>
                                                                <option value="0"
                                                                        {{ !empty($start_location) ? 'selected' : '' }}
                                                                >Los Cabos Int. Airport
                                                                </option>
                                                                @foreach ($resorts as $row)
                                                                    <option
                                                                        value="{{ $row->id }}"
                                                                        {{ $row->id == $start_location ? 'selected="selected"' : '' }}
                                                                        data-zone="{{ $row->zone_id }}">
                                                                        {{ $row->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="end_location" class="form-label">End Location</label>
                                                                <select id="end_location" name="end_location" class="form-control" required="">
                                                                    <option value="" disabled="" selected="selected" style="display:none">End Location</option>
                                                                    <option value="0" {{ $end_location!='' ? 'selected="selected"' : '' }}>Los Cabos Int. Airport</option>
                                                                    @foreach ($resorts as $row)
                                                                        <option
                                                                            value="{{ $row->id }}"
                                                                            {{ $row->id == $end_location ? 'selected="selected"' : '' }} 
                                                                            data-zone="{{ $row->zone_id }}">
                                                                            {{ $row->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
        
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="passengers" class="form-label">
                                                                Number of travelers
                                                            </label>
                                                            <select id="passengers" name="passengers" class="form-control" required>
                                                                <option value="" disabled="" selected="selected" style="display:none">
                                                                    Number of travelers
                                                                </option>
                                                                @for ($x = 1; $x<=8; $x++)
                                                                    <option value="{{$x}}" {{ $x == $passengers ? 'selected="selected"' : '' }}>
                                                                        {{ $x }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="mb-3">
                                                            <label for="vehicle" class="form-label">
                                                                Kind of vehicle
                                                            </label>
                                                            <select id="vehicle" name="vehicle" class="form-control" required>
                                                                <option value="" disabled selected style="display:none">Type of vehicle</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div id="arrival_flight_details">
                                                    <div class="row">
                                                        <div class="trip_locations">
                                                            <h1 class="card-title ">
                                                                <span class="badge bg-primary">Trip #1 </span> <span class="from"></span> TO <span class="to"></span>
                                                            <h1>
                                                        </div>
    
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="date" class="form-label">
                                                                    Arrival Date
                                                                </label>
                                                                    <input type="text" class="form-control" id="arrival_date"
                                                                        name="arrival_date" placeholder="m/d/Y"
                                                                        value="{{ $date_arrival }}"
                                                                        required>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="time" class="form-label">Arrival Flight Time</label>
                                                                <input type="text" class="form-control" id="arrival_time" name="arrival_time" placeholder="Time" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="airline" class="form-label">Arrival Airline Company</label>
                                                                <select id="arrival_airline" name="arrival_airline" class="form-control" required>
                                                                    <option value="" disabled selected="selected" style="display:none">Arrival Airline Company</option>
                                                                    <option value="1">AAL American Airlines</option>
                                                                    <option value="3">AMX Aeromexico</option>
                                                                    <option value="2">ACA Air Canada</option>
                                                                    <option value="3">DL Delta</option>
                                                                    <option value="3">AIJ Interjet</option>
                                                                    <option value="3">ASA Alaska</option>
                                                                    <option value="3">CFV Aero Calafia</option>
                                                                    <option value="3">FT Frontier</option>
                                                                    <option value="3">CXP Xtra Airways</option>
                                                                    <option value="3">WJA Westjet</option>
                                                                    <option value="3">SWA Southwest</option>
                                                                    <option value="3">UAL United Airlines</option>
                                                                    <option value="3">VOI Volaris</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="flight" class="form-label">Arrival Flight Number</label>
                                                                <input type="text" class="form-control" name="arrival_flight" id="arrival_flight" placeholder="Flight number" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="departure_flight_details">
                                                    <hr>
                                                    <div class="row">
                                                        <div class="trip_locations">
                                                            <h1 class="card-title ">
                                                                <span class="badge bg-warning">Trip #2 </span> <span class="to"></span> TO <span class="from"></span>
                                                            </h1>
                                                        </div>
    
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="date" class="form-label">
                                                                    Departure Date
                                                                </label>
                                                                <input type="text" class="form-control" id="departure_date"
                                                                        name="departure_date" placeholder="m/d/Y">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="time" class="form-label">
                                                                    Departure Flight Time
                                                                </label>
                                                                <input type="text" class="form-control" id="departure_time" name="departure_time" placeholder="Time" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="airline" class="form-label">
                                                                    Departure Airline Company
                                                                </label>
                                                                <select id="departure_airline" name="departure_airline" class="form-control" required>
                                                                    <option value="" 
                                                                            disabled 
                                                                            selected 
                                                                            style="display:none">Departure Airline Company</option>
                                                                    <option value="1">AAL American Airlines</option>
                                                                    <option value="2">ACA Air Canada</option>
                                                                    <option value="3">AIJ Interjet</option>
                                                                    <option value="3">AL United Airlines</option>
                                                                    <option value="3">AMX Aeromexico</option>
                                                                    <option value="3">ASA Alaska</option>
                                                                    <option value="3">CFV Aero Calafia</option>
                                                                    <option value="3">AMX Aeromexico</option>
                                                                    <option value="3">CXP Xtra Airways</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="flight" class="form-label">
                                                                    Departure Flight Number
                                                                </label>
                                                                <input type="text" class="form-control" name="departure_flight" id="departure_flight" placeholder="Flight number" required>
                                                            </div>
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
                                        <li class="previous"><button class="btn btn-primary">Previous</button></li>
                                        <li class="next"><button class="btn btn-primary go_step2">Next</button></li>
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
        {{-- <script src="{{ asset('assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script> --}}

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
            var units = @json($vehicles);
            var rates = @json($rates);
            var resort_options= '<?php echo $resort_options ?>';
        </script>
        <script src="{{ asset('/assets/form_wizzard.js') }}"></script>
    </body>
</html>
