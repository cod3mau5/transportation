<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Transportation</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/normalize8.min.css') }}">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
      <link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css') }}">
      <!-- Bootstrap Css -->
      {{-- <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" /> --}}
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

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">

                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">

                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">

                        <!-- Reservation form begin -->
                        <div class="container reserve-form-container">
                            <div class="row">
                                <div class="col-md-9">
                                    <ul class="nav nav-pills justify-content-center" role="tablist" id="bookTabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#step1" role="tab">
                                                Step 1 <small>Trip</small>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="nav-step2">
                                            <a class="nav-link" data-toggle="tab" href="" role="tab" >
                                                Step 2 <small>Contact</small>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="nav-step3">
                                            <a class="nav-link" data-toggle="tab" href="" role="tab">
                                                Step 3 <small>Summary</small>
                                            </a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <!-- ============================ STEP 1 ============================== -->
                                        <div class="tab-pane active" id="step1" role="tabpanel">
                                            <form action="" id="form_step1">
                                                <div class="form-group row">
                                                    <label for="trip_type" class="col-sm-5 col-form-label">Trip Type</label>
                                                    <div class="col-sm-7">
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
                                                <div class="form-group row">
                                                    <label for="start_location" class="col-sm-5 col-form-label">Start Location</label>
                                                    <div class="col-sm-7">
                                                        <select id="start_location" name="start_location" class="form-control" required="">
                                                            <option value="" disabled="" selected="selected" style="display:none">
                                                                Start Location
                                                            </option>
                                                            <option value="0"
                                                                 {{ $start_location !== '' ? 'selected="selected"' : '' }}
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
                                                <div class="form-group row">
                                                    <label for="end_location" class="col-sm-5 col-form-label">End Location</label>
                                                    <div class="col-sm-7">
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
                                                <div class="form-group row">
                                                    <label for="passengers" class="col-sm-5 col-form-label">
                                                        Number of travelers
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <select id="passengers" name="passengers" class="form-control" required="">
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
                                                <div class="form-group row">
                                                    <label for="vehicle" class="col-sm-5 col-form-label">
                                                        Kind of vehicle
                                                    </label>
                                                    <div class="col-sm-7">
                                                        <select id="vehicle" name="vehicle" class="form-control" required="">
                                                            <option value="" disabled="" selected="selected" style="display:none">Type of vehicle</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div id="arrival_flight_details">
                                                    <div class="trip_locations">
                                                        Trip #1 - <span class="from"></span> TO <span class="to"></span>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="date" class="col-sm-5 col-form-label">
                                                            Arrival Date
                                                        </label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="arrival_date"
                                                                name="arrival_date" placeholder="m/d/Y"
                                                                value="<?php echo $date_arrival; ?>"
                                                                required=""
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="time" class="col-sm-5 col-form-label">Arrival Flight Time</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="arrival_time" name="arrival_time" placeholder="Time" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="airline" class="col-sm-5 col-form-label">Arrival Airline Company</label>
                                                        <div class="col-sm-7">
                                                            <select id="arrival_airline" name="arrival_airline" class="form-control" required="">
                                                                <option value="" disabled="" selected="selected" style="display:none">Arrival Airline Company</option>
                                                                <option value="1">AAL American Airlines</option>
                                                                <option value="3">AMX Aeromexico</option>
                                                                <option value="2">ACA Air Canada</option>
                                                                <option value="3">DL Delta</option>
                                                                <option value="3">AIJ Interjet</option>
                                                                <option value="3">AMX Aeromexico</option>
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
                                                    <div class="form-group row">
                                                        <label for="flight" class="col-sm-5 col-form-label">Arrival Flight Number</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="arrival_flight" id="arrival_flight" placeholder="Flight number" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div id="departure_flight_details">
                                                    <div class="trip_locations">
                                                        Trip #2 - <span class="to"></span> TO <span class="from"></span>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="date" class="col-sm-5 col-form-label">Departure Date</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="departure_date" name="departure_date" placeholder="m/d/Y">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="time" class="col-sm-5 col-form-label">Departure Flight Time</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="departure_time" name="departure_time" placeholder="Time">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="airline" class="col-sm-5 col-form-label">Departure Airline Company</label>
                                                        <div class="col-sm-7">
                                                            <select id="departure_airline" name="departure_airline" class="form-control" required="">
                                                                <option value="" disabled="" selected="selected" style="display:none">Departure Airline Company</option>
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
                                                    <div class="form-group row">
                                                        <label for="flight" class="col-sm-5 col-form-label">Departure Flight Number</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="departure_flight" id="departure_flight" placeholder="Flight number" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 text-right">
                                                        <button type="button" class="btn btn-light go_step2">Continue</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- ============================ STEP 2 ============================== -->
                                        <div class="tab-pane" id="step2" role="tabpanel">
                                            <form action="" id="form_step2">
                                                <div class="form-group row">
                                                    <label for="first_name" class="col-sm-4 col-form-label">Name</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required="">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email1" class="col-sm-4 col-form-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="primary_phone" class="col-sm-4 col-form-label">Phone Number</label>
                                                    <div class="col-sm-4">
                                                        <input type="tel" class="form-control" id="primary_phone" placeholder="Primary Phone" required="">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Mobile Phone">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="request" class="col-sm-4 col-form-label">Comments</label>
                                                    <div class="col-sm-8">
                                                        <textarea name="request" id="request" cols="30" rows="10" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 text-right">
                                                        <button type="button" class="btn btn-light go_step3">Continue</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- ============================ STEP 3 ============================== -->
                                        <div class="tab-pane" id="step3" role="tabpanel">
                                            <h4 class="text-center">Summary</h4>
                                            <p class="text-center">
                                                Please confirm your travel details below and select your payment method to continue.<br>
                                                Currently you can pay online using your PayPal account or you can pay with cash upon arrival.<br>
                                                If you wish to get in touch with us please call +52 1 (624) 155 64 55 or email <a href="mailto:code.bit.mau@gmail.com">code.bit.mau@gmail.com</a>
                                            </p><br>
                                            <form action="" method="POST">
                                                <div id="summary-details">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 200px;"><strong>Trip Type</strong></td>
                                                                <td class="info_trip_type"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Start Location</strong></td>
                                                                <td class="info_start_location"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>End Location</strong></td>
                                                                <td class="info_end_location"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Number of Travellers</strong></td>
                                                                <td class="info_passengers"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Vehicle</strong></td>
                                                                <td class="info_vehicle"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Arrival Time</strong></td>
                                                                <td class="info_arrival_time"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Arrival Airline</strong></td>
                                                                <td class="info_arrival_airline"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Arrival Flight</strong></td>
                                                                <td class="info_arrival_fight"></td>
                                                            </tr>
                                                            <tr class="departure_block">
                                                                <td><strong>Departure Time</strong></td>
                                                                <td class="info_departure_time"></td>
                                                            </tr>
                                                            <tr class="departure_block">
                                                                <td><strong>Departure Airline</strong></td>
                                                                <td class="info_departure_airline"></td>
                                                            </tr>
                                                            <tr class="departure_block">
                                                                <td><strong>Departure Flight</strong></td>
                                                                <td class="info_departure_fight"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Name</strong></td>
                                                                <td class="info_fullname"></td></tr>
                                                            <tr>
                                                                <td><strong>Email</strong></td>
                                                                <td class="info_email"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Phone</strong></td>
                                                                <td class="info_phone"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Mobile</strong></td>
                                                                <td class="info_mobile"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Additional Info</strong></td>
                                                                <td class="info_request"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Total Price</strong></td>
                                                                <td class="info_price"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Pay Method</strong></td>
                                                                <td>
                                                                    <label class="pay">
                                                                        <input type="radio" name="pay_method" id="optionsRadios2" value="cash" checked="checked">
                                                                        Cash upon arrival
                                                                    </label>
                                                                    <label class="pay">
                                                                        <input type="radio" name="pay_method" id="optionsRadios1" value="paypal">
                                                                        Paypal
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <input type="hidden" name="_trip_type" id="_trip_type" value="">
                                                    <input type="hidden" name="_location_start" id="_location_start" value="">
                                                    <input type="hidden" name="_location_end" id="_location_end" value="">
                                                    <input type="hidden" name="_passengers" id="_passengers" value="">
                                                    <input type="hidden" name="_unit" id="_unit" value="">
                                                    <input type="hidden" name="_arrival_date" id="_arrival_date" value="">
                                                    <input type="hidden" name="_arrival_time" id="_arrival_time" value="">
                                                    <input type="hidden" name="_arrival_company" id="_arrival_company" value="">
                                                    <input type="hidden" name="_arrival_flight" id="_arrival_flight" value="">
                                                    <input type="hidden" name="_departure_date" id="_departure_date" value="">
                                                    <input type="hidden" name="_departure_time" id="_departure_time" value="">
                                                    <input type="hidden" name="_departure_company" id="_departure_company" value="">
                                                    <input type="hidden" name="_departure_flight" id="_departure_flight" value="">
                                                    <input type="hidden" name="_contact_firstname" id="_contact_firstname" value="">
                                                    <input type="hidden" name="_contact_lastname" id="_contact_lastname" value="">
                                                    <input type="hidden" name="_contact_email" id="_contact_email" value="">
                                                    <input type="hidden" name="_contact_phone" id="_contact_phone" value="">
                                                    <input type="hidden" name="_contact_mobile" id="_contact_mobile" value="">
                                                    <input type="hidden" name="_contact_request" id="_contact_request" value="">
                                                    <input type="hidden" name="_subtotal" id="_subtotal" value="100">
                                                    <input type="hidden" name="_total" id="_total" value="100">

                                                    <input type="hidden" name="Paypal[cmd]" value="_xclick" />
                                                    <input type="hidden" name="Paypal[no_note]" value="1" />
                                                    <input type="hidden" name="Paypal[lc]" value="en_US" />
                                                    <input type="hidden" name="Paypal[bn]" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                                                    <input type="hidden" name="Paypal[first_name]" id="paypal_firstname" value="firstname" />
                                                    <input type="hidden" name="Paypal[last_name]" id="paypal_lastname" value="lastname" />
                                                    <input type="hidden" name="Paypal[payer_email]" id="paypal_email" value="email" />
                                                    <input type="hidden" name="Paypal[item_number]" value="1" / >
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 text-center">
                                                        <button type="submit" class="btn btn-primary">Finish booking</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
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
                                </div>
                            </div>
                        </div>
                        <!-- Reservation form end -->

                        </div>
                    </div>
                
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
