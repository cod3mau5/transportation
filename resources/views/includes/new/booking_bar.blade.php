
<div class="box-start-booking is-bookhome is-relative">
    @if ($register!=='')
        <div class="register">
            <span title="Los Cabos Airport Transportation" class="title-bar">{{$register}}</span>
            <span>®</span>
        </div>
    @endif

	<form autocomplete="off" name="bookWidget" id="bookWidget" action="/send_booking_bar" method="post">

		<fieldset class="hotelOption">
			<label for="start_location"><i class="fa fa-building" aria-hidden="true"></i></label>
            <select id="start_location" name="start_location" class="form-control select2"  placeholder="Destination / Hotel / Resort / Condo" required>
                <option value="" disabled="" selected="selected" style="display:none">
                    {{ __('pages/home.book_now.form.booking_bar.hotel_dropdown_placeholder') }}
                </option>
                {{-- <option value="0">Los Cabos Int. Airport</option> --}}
                @foreach ($resorts as $row)
                    <option
                        value="{{ $row->id }}"
                        {{ $row->id == $start_location ? 'selected="selected"' : '' }}
                        data-zone="{{ $row->zone_id }}">
                        {{ $row->name }}
                    </option>
                @endforeach
            </select>
		</fieldset>

		<fieldset class="transferOption">
			<label for="trip_type"><i class="fa fa-road" aria-hidden="true"></i></label>
			<select name="trip_type" v-model="trip_type" id="trip_type">
				<option value="r" class="trip_type_option">Round trip</option>
				<option value="o_a" class="trip_type_option">Oneway - Arrival <small>(Airport to Hotel)</small></option>
				<option value="o_d" class="trip_type_option">Oneway - Departure <small>(Hotel to Airport)</small></option>
			</select>
		</fieldset>

        {{-- DATES --}}
            <fieldset class="datesOption" v-show="trip_type== 'r'">
                <label for="arrival_date_r"><i class="fa fa-calendar" aria-hidden="true"></i></label>
                <input  type="text" name="arrival_date_r" id="arrival_date_r" placeholder="Arrival" v-bind:required="trip_type == 'r'"><span>-</span>
                <input  type="text" name="departure_date_r" id="departure_date_r" placeholder="Departure" v-bind:required="trip_type == 'r'">
            </fieldset>

            <fieldset class="transferOption" v-show="trip_type== 'o_a'">
                <label for="arrival_date_o_a"><i class="fa fa-calendar" aria-hidden="true" v-bind:required="trip_type == 'o_a'"></i></label>
                <input  type="text" name="arrival_date_o_a" id="arrival_date_o_a" placeholder="Arrival" v-bind:required="trip_type == 'o_a'">
            </fieldset>

            <fieldset class="transferOption" v-show="trip_type== 'o_d'">
                <label for="departure_date_o_d"><i class="fa fa-calendar" aria-hidden="true" v-bind:required="trip_type == 'o_d'"></i></label>
                <input  type="text" name="departure_date_o_d" id="departure_date_o_d" placeholder="Departure" v-bind:required="trip_type == 'o_d'">
            </fieldset>
        {{-- /DATES --}}


		<fieldset class="paxesOption">
			<label for="passengers"><i class="fa fa-user" aria-hidden="true"></i></label>
			<select name="passengers" id="passengers">
				<option value="1">1 Passenger</option>
				<option value="2" selected="selected">2 Passengers</option>
				<option value="3">3 Passengers</option>
				<option value="4">4 Passengers</option>
				<option value="5">5 Passengers</option>
				<option value="6">6 Passengers</option>
				<option value="7">7 Passengers</option>
				<option value="8">8 Passengers</option>
				<option value="9">8 Passengers</option>
				<option value="10">10 Passengers</option>
				<option value="11">11 Passengers</option>
				<option value="12">12 Passengers</option>
				<option value="13">13 Passengers</option>
				<option value="14">14 Passengers</option>
				<option value="15">15 Passengers</option>
				<option value="16">16 Passengers</option>
			</select>
		</fieldset>

		<fieldset class="buttonOption">
			<input type="submit" name="booking-bar" id="booking-bar">
		</fieldset>

        <div class="clr"></div>

        @csrf

	</form>
</div>
<!-- Airbnb Information Tab -->
<div class="airbnb-tab">
    <transition name="slide-down">
        <div class="airbnb-info" v-show="showAirbnbInfo">
            <p>
                Airport shuttle services are available for Airbnb rentals and homes in the Los Cabos area.
                To book, choose the hotel nearest to your rental from the list provided and provide the detailed address or the Airbnb link in the comments field. Alternatively, you may email us the details or share them directly with your driver upon arrival.
            </p>
            <ol>
                <li>Select the hotel closest to your Airbnb from the drop-down menu.</li>
                <li>Enter your rental address or Airbnb profile link in the "Special Request" field.</li>
                <li>Provide your shuttle details and wait for our confirmation response.</li>
            </ol>
        </div>
    </transition>
    <div class="airbnb-tab-header d-flex justify-content-center" @click="toggleAirbnbInfo">
        <p class="text-center m-0">
            <span class="nunito" style="font-size:1.4rem"><i class="fab fa-airbnb" style="color: #fff;font-size:1.4rem;"></i>re you going to an <i class="fab fa-airbnb" style="color: #fff;font-size:1.4rem;"></i>irbnb?</span><br>
            <small class="nunito" style="color: #fff;margin-top:5px;position: relative;top:-3px;line-height:0"><b>click here!</b></small>
        </p>
    </div>
</div>

