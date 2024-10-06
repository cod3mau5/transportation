<div class="tab-pane" id="step1" role="tabpanel">
    <form id="form_step1">
        <div class="row">
            <div class="col-lg-4">
                <div class="mb-3">

                    <label for="trip_type" class="form-label">@{{ text.book_now.form.step_trip.trip_type }}</label>
                        <select id="trip_type" name="trip_type" class="form-control" required=""  v-model="trip_type">

                            @if(empty($trip_type))
                                <option value="" disabled  selected  style="display:none">
                                    @{{ text.book_now.form.step_trip.trip_type }}
                                </option>
                            @endif

                            <option value="o" v-bind:selected="trip_type == 'One Way'">
                                @{{ text.book_now.form.trip_type.oneway }}
                            </option>

                            <option value="r" v-bind:selected="trip_type=='Round Trip'">
                                @{{ text.book_now.form.trip_type.roundtrip }}
                            </option>

                        </select>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="start_location" class="form-label">
                        @{{ text.book_now.form.step_trip.start_location }}
                    </label>
                    <select id="start_location" name="start_location" class="form-control select2" required="">
                        <option value="" disabled="" selected="selected" style="display:none">
                            @{{ text.book_now.form.step_trip.start_location }}
                        </option>
                        <option value="0"
                                {{ empty($start_location) && !empty($trip_type)? 'selected' : '' }}
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
                    <label for="end_location" class="form-label">
                        @{{ text.book_now.form.step_trip.end_location }}
                    </label>
                    <select id="end_location"
                            name="end_location"
                            class="form-control select2"
                            required=""
                    >
                        <option value="" disabled="" selected="selected" style="display:none">@{{ text.book_now.form.step_trip.end_location }}</option>
                        <option value="0" {{ empty($end_location) && !empty($trip_type) ? 'selected="selected"' : '' }}>Los Cabos Int. Airport</option>
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


            {{-- <div class="col-lg-4">
                <div class="mb-3">
                    <label for="trip_type" class="form-label">@{{ text.book_now.form.step_trip.trip_type }}</label>
                        <select id="trip_type" name="trip_type" class="form-control" required=""  v-model="trip_type">
                            <option value="" disabled="" selected="selected" style="display:none">
                                @{{ text.book_now.form.step_trip.trip_type }}
                            </option>

                            <option value="o"
                                <?php
                                    if (isset($_GET['trip']) && $_GET['trip']=='o') { echo 'selected="selected"'; }
                                ?>
                            >
                            @{{ text.book_now.form.trip_type.oneway }}
                            </option>

                            <option value="r"
                                <?php
                                    if (isset($_GET['trip']) && $_GET['trip']=='r') { echo 'selected="selected"'; }
                                ?>
                            >
                            @{{ text.book_now.form.trip_type.roundtrip }}
                        </option>
                        </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="start_location" class="form-label">
                        @{{ text.book_now.form.step_trip.start_location }}
                    </label>
                    <select id="start_location" name="start_location" class="form-control select2" required="">
                        <option value="" disabled="" selected="selected" style="display:none">
                            @{{ text.book_now.form.step_trip.start_location }}
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
            </div> --}}

        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="passengers" class="form-label">
                        @{{ text.book_now.form.step_trip.number_travelers }}
                    </label>
                    <select id="passengers" name="passengers" class="form-control" required>
                        <option value="" disabled="" selected="selected" style="display:none">
                            @{{ text.book_now.form.step_trip.number_travelers }}
                        </option>
                        @for ($x = 1; $x<=10; $x++)
                            <option value="{{$x}}" {{ $x == $passengers ? 'selected' : '' }}>
                                {{ $x }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                    <label for="children" class="form-label">
                        @{{ text.book_now.form.step_trip.children }}
                    </label>
                    <select id="children" name="children" class="form-control" required>
                        <option value="" disabled="" selected="selected" style="display:none">
                           @{{ text.book_now.form.step_trip.children }}
                        </option>
                        @for ($x = 0; $x<=6; $x++)
                            <option value="{{$x}}">
                                {{ $x }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
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
                        <span class="badge bg-primary">
                            @{{ text.book_now.form.step_trip.trip_location_title.name }} #1
                        </span>
                        <span v-if="language == '0'">De </span>
                        <span class="from"></span> @{{ text.book_now.form.step_trip.trip_location_title.to }}
                        <span class="to"></span>
                    <h1>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="date" class="form-label">
                            @{{ text.book_now.form.step_trip.trip1.arrival_date }}
                        </label>
                            <input type="text" class="form-control" id="arrival_date"
                                name="arrival_date" placeholder="m/d/Y"
                                value="{{ $date_arrival }}"
                                required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="time" class="form-label">
                            @{{ text.book_now.form.step_trip.trip1.arrival_flight_time }}
                        </label>
                        <input type="text" class="form-control" id="arrival_time" name="arrival_time" :placeholder="text.book_now.form.step_trip.trip1.arrival_flight_time+' '+ text.book_now.form.step_trip.trip1.arrival" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="airline" class="form-label">
                            @{{ text.book_now.form.step_trip.trip1.arrival_airline }}
                        </label>
                        <select id="arrival_airline" name="arrival_airline" class="form-control" required>
                            <option value="" disabled selected="selected" style="display:none"> @{{ text.book_now.form.step_trip.trip1.arrival_airline+' '+ text.book_now.form.step_trip.trip1.arrival }}</option>
                            <option value="AAL American Airlines">AAL American Airlines</option>
                            <option value="AMX Aeromexico">AMX Aeromexico</option>
                            <option value="VIV Viva Aerobus">VIV Viva Aerobus</option>
                            <option value="ACA Air Canadá">ACA Air Canadá</option>
                            <option value="DL Delta">DL Delta</option>
                            <option value="AIJ Interjet">AIJ Interjet</option>
                            <option value="ASA Alaska">ASA Alaska</option>
                            <option value="CFV Aero Calafia">CFV Aero Calafia</option>
                            <option value="FT Frontier">FT Frontier</option>
                            <option value="CXP Xtra Airways">CXP Xtra Airways</option>
                            <option value="WJA Westjet">WJA Westjet</option>
                            <option value="VOI Volaris">VOI Volaris</option>
                            <option value="Blue net">Blue net</option>
                            <option value="JBU JetBlue">JBU JetBlue</option>
                            <option value="SWG SunWing">SWG SunWing</option>
                            <option value="NKS Spirit Wings">NKS Spirit Wings</option>
                            <option value="EJA NetJets">EJA NetJets</option>
                            <option value="FLE Flair Airlines">FLE Flair Airlines</option>
                            <option value="LXJ Flex Jet">LXJ Flex Jet</option>
                            <option value="Jetlinx">Jetlinx</option>
                            <option value="FBO">FBO</option>
                            <option value="SWA Southwest">SWA Southwest Airlines</option>
                            <option value="UAL United Airlines">UAL United Airlines</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="flight" class="form-label">@{{ text.book_now.form.step_trip.trip1.arrival_flight_number }}</label>
                        <input type="text"
                                class="form-control"
                                name="arrival_flight"
                                id="arrival_flight"
                                :placeholder="text.book_now.form.step_trip.trip1.arrival_flight_number+' '+text.book_now.form.step_trip.trip1.arrival "
                                required>
                    </div>
                </div>
                <div class="col-lg-10 previous-stop">
                    <label for="arrival-previous-stop" class="form-label">you need an earlier stop before going to your destination?</label>
                    <small>Yes</small>
                    <input type="checkbox" name="arrival_previous_stop"  id="arrival_previous_stop" v-model="arrival_previous_stop">
                </div>
                <div class="col-lg-6 arrival-stop">
                    <label for="arrival-stop-time">Time</label>
                    <input type="text" name="arrival_stop_time" id="arrival_stop_time"  class="form-control">
                </div>
                <div class="col-lg-6 arrival-stop">
                    <label for="arrival-stop-place">Place</label>
                    <input type="text" name="arrival_stop_place" id="arrival_stop_place" class="form-control">
                </div>
            </div>
        </div>
        <div id="departure_flight_details">
            <hr>
            <div class="row">
                <div class="trip_locations">
                    <h1 class="card-title ">
                        <span class="badge bg-warning">
                            @{{ text.book_now.form.step_trip.trip_location_title.name }} #2
                        </span>
                        <span v-if="lang == 'es'">De </span>
                        <span class="to"></span> @{{ text.book_now.form.step_trip.trip_location_title.to }}
                        <span class="from"></span>
                    </h1>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="date" class="form-label">
                            @{{ text.book_now.form.step_trip.trip2.departure_date }}
                        </label>
                        <input type="text" class="form-control" id="departure_date"
                                name="departure_date" placeholder="m/d/Y">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="time" class="form-label">
                            @{{ text.book_now.form.step_trip.trip2.departure_flight_time }}
                        </label>
                        <input type="text" class="form-control"
                        id="departure_time" name="departure_time" :placeholder="text.book_now.form.step_trip.trip2.departure_flight_time +' '+text.book_now.form.step_trip.trip2.departure" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="airline" class="form-label">
                            @{{ text.book_now.form.step_trip.trip2.departure_airline }}
                        </label>
                        <select id="departure_airline" name="departure_airline" class="form-control" required>
                            <option value=""
                                    disabled
                                    selected
                                    style="display:none">
                                    @{{ text.book_now.form.step_trip.trip2.departure_airline +' '+text.book_now.form.step_trip.trip2.departure }}
                            </option>
                            <option value="AAL American Airlines">AAL American Airlines</option>
                            <option value="AMX Aeromexico">AMX Aeromexico</option>
                            <option value="VIV Viva Aerobus">VIV Viva Aerobus</option>
                            <option value="ACA Air Canadá">ACA Air Canadá</option>
                            <option value="DL Delta">DL Delta</option>
                            <option value="AIJ Interjet">AIJ Interjet</option>
                            <option value="ASA Alaska">ASA Alaska</option>
                            <option value="CFV Aero Calafia">CFV Aero Calafia</option>
                            <option value="FT Frontier">FT Frontier</option>
                            <option value="CXP Xtra Airways">CXP Xtra Airways</option>
                            <option value="WJA Westjet">WJA Westjet</option>
                            <option value="SWA Southwest">SWA Southwest</option>
                            <option value="UAL United Airlines">UAL United Airlines</option>
                            <option value="VOI Volaris">VOI Volaris</option>
                            <option value="Blue net">Blue net</option>
                            <option value="JBU JetBlue">JBU JetBlue</option>
                            <option value="SWG SunWing">SWG SunWing</option>
                            <option value="NKS Spirit Wings">NKS Spirit Wings</option>
                            <option value="EJA NetJets">EJA NetJets</option>
                            <option value="FLE Flair Airlines">FLE Flair Airlines</option>
                            <option value="LXJ Flex Jet">LXJ Flex Jet</option>
                            <option value="Jetlinx">Jetlinx</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="flight" class="form-label">
                            @{{ text.book_now.form.step_trip.trip2.departure_flight_number }}
                        </label>
                        <input type="text"
                                class="form-control"
                                name="departure_flight"
                                id="departure_flight"
                                :placeholder="text.book_now.form.step_trip.trip2.departure_flight_number +' '+text.book_now.form.step_trip.trip2.departure"
                                required>
                    </div>
                </div>
                <div class="col-lg-10 previous-stop">
                    <label for="departure-previous-stop" class="form-label">you need an earlier stop before the departure flight?</label>
                    <small>Yes</small>
                    <input type="checkbox" name="departure_previous_stop"  id="departure_previous_stop" v-model="departure_previous_stop">
                </div>
                <div class="col-lg-6 departure-stop">
                    <label for="departure-stop-time">Time</label>
                    <input type="text" name="departure_stop_time" id="departure_stop_time"  class="form-control">
                </div>
                <div class="col-lg-6 departure-stop">
                    <label for="departure-stop-place">Place</label>
                    <input type="text" name="departure_stop_place" id="departure_stop_place" class="form-control">
                </div>

            </div>
        </div>
    </form>
</div>
