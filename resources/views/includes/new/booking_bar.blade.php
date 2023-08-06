<div class="box-start-booking is-bookhome is-relative">
    @if ($register!=='')
        <div class="register">
            <h1 title="Los Cabos Airport Transportation">{{$register}}</h1>
            <span>®</span>
        </div>
    @endif

	<form autocomplete="off" name="bookWidget" id="bookWidget" action="/send_booking_bar" method="post">
		<fieldset class="hotelOption">
			<label for="wid-hotel"><i class="fa fa-building" aria-hidden="true"></i></label>
			<input type="text" name="wid-hotel" id="wid-hotel" placeholder="Destino / Resort / Hotel / Condo ">
			<input type="hidden" name="wid-hotelb" id="wid-hotelb" placeholder="Desde: Destino / Resort / Hotel / Condo ">
			<ul class="boxShow-hotels" style="display: none;"></ul>
		</fieldset>
		<fieldset class="transferOption">
			<label for="wid-transfer"><i class="fa fa-road" aria-hidden="true"></i></label>
			<select name="wid-transfer" id="wid-transfer">
				<option value="ROUND">Round trip</option>
				<option value="ONEWAH">Oneway - Airport to Hotel</option>
				<option value="ONEWHA">Oneway - Hotel to Airport</option>
				<option value="ROUNDH">Round trip - Hotel to Hotel</option>
				<option value="ONEWHH">Oneway - Hotel to Hotel</option>
			</select>
		</fieldset>
		<fieldset class="datesOption">
			<label for="wid-datein"><i class="fa fa-calendar" aria-hidden="true"></i></label>
			<input type="text" name="wid-datein" id="wid-datein" placeholder="Arrival" class="hasDatepicker"><span>-</span>
			<input type="text" name="wid-dateout" id="wid-dateout" placeholder="Departure" class="hasDatepicker">
		</fieldset>
		<fieldset class="paxesOption">
			<label for="wid-passenger"><i class="fa fa-user" aria-hidden="true"></i></label>
			<select name="wid-passenger" id="wid-passenger">
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
			<input type="submit" name="wid-firstPreBook" id="wid-firstPreBook" value="CONTINUE">
			<input type="hidden" name="wid-enviroment" id="wid-enviroment" value="loaded">
			<input type="hidden" name="wid-engine" id="wid-engine" value="classic">
		</fieldset>
		<div class="clr"></div>
        @csrf
	</form>
</div>
