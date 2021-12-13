@component('mail::message')  
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
        {{ config('app.name') }}
        @endcomponent
    @endslot
    @if($reservation->message_t == 'ARRIVAL')
    @component('mail::table')
        | PRIVATE SERVICE{{' ('.$reservation->message_t.')'}}|{{'E-TICKET: '.$reservation->voucher  }}   |
        | --------------------- |:----------------------------------------------------------------------:|
        | <b>Name:</b>          | {{$reservation->fullname}}                                             |
        | <b>Email:</b>         | {{$reservation->email}}                                                |
        | <b>Hotel:</b>         | {{$reservation->resort->name}}                                         |
        | <b>Arrival Flight:</b>| {{$reservation->arrivalFlight}}                                        |
        | <b>Arrival Date:</b>  | {{$reservation->arrivalDate}}                                          |
        | <b>Phone Number:</b>  | {{$reservation->phone}}                                                |
        | <b>Passengers: </b>   | {{$reservation->passengers}}                                           |
        | <b>Vehicle: </b>      | {{$reservation->unit->name}}                                           |
        | <b>Total: </b>        | <b>${{$reservation->total}} USD</b>                                    |
        | <b>Pay Method:</b>    | <span style="color: #ec7728; font-weight: bold;">Cash on Arrival</span>|{{-- $reservation->payment_type --}}
    @endcomponent
    @elseif($reservation->message_t == 'DEPARTURE')
    @component('mail::table')
        | PRIVATE SERVICE{{' ('.$reservation->message_t.')'}}|{{'E-TICKET: '.$reservation->voucher  }}   |
        | --------------------- |:----------------------------------------------------------------------:|
        | <b>Name:</b>          | {{$reservation->fullname}}                                             |
        | <b>Email:</b>         | {{$reservation->email}}                                                |
        | <b>Meeting At:</b>    | {{$reservation->resort->name}}                                         |
        | <b>Departure Flight:</b>| {{$reservation->arrivalFlight}}                                      |
        | <b>Departure Date:</b>  | {{$reservation->arrivalDate}}                                        |
        | <b>Phone Number:</b>  | {{$reservation->phone}}                                                |
        | <b>Passengers: </b>   | {{$reservation->passengers}}                                           |
        | <b>Vehicle: </b>      | {{$reservation->unit->name}}                                           |
        | <b>Total: </b>        | <b>${{$reservation->total}} USD</b>                                    |
        | <b>Pay Method:</b>    | <span style="color: #ec7728; font-weight: bold;">Cash on Arrival</span>|{{-- $reservation->payment_type --}}
    @endcomponent
    @elseif($reservation->message_t == 'ROUND TRIP')
    @component('mail::table')
        | PRIVATE SERVICE{{' ('.$reservation->message_t.')'}}|{{'E-TICKET: '.$reservation->voucher  }}   |
        | --------------------- |:----------------------------------------------------------------------:|
        | <b>Name:</b>          | {{$reservation->fullname}}                                             |
        | <b>Email:</b>         | {{$reservation->email}}                                                |
        | <b>Hotel:</b>         | {{$reservation->resort->name}}                                         |
        | <b>Arrival Flight:</b>| {{$reservation->arrivalFlight}}                                        |
        | <b>Arrival Date:</b>  | {{$reservation->arrivalDate}}                                          |
        | <b>Phone Number:</b>  | {{$reservation->phone}}                                                |
        | <b>Passengers: </b>   | {{$reservation->passengers}}                                           |
        | <b>Vehicle: </b>      | {{$reservation->unit->name}}                                           |
        | <b>Total: </b>        | <b>${{$reservation->total}} USD</b>                                    |
        | <b>Pay Method:</b>    | <span style="color: #ec7728; font-weight: bold;">Cash on Arrival</span>|{{-- $reservation->payment_type --}}
    @endcomponent
    @component('mail::table')
        | DEPARTURE NOTICE      |                                                                        |
        | --------------------- |:----------------------------------------------------------------------:|
        | <b>Hotel:</b>         | {{$reservation->resort->name}}                                         |
        | <b>Passengers: </b>   | {{$reservation->passengers}}                                           |
        | <b>Departure Flight:</b>| {{$reservation->departureFlight}}                                    |
        | <b>Flight Date:</b>  | {{$reservation->departureDate}}                                           |
    @endcomponent
    <p style="text-align: center; color: #005899; font-size: 11.5px;"><b>Note:</b> Please be ready at the main lobby 5 minutes before your pick-up time.</p>
    @endif
    @if($reservation->comments != '')
    <div style="padding:1rem 1rem;margin-bottom:1rem;border:1px solid transparent;border-radius: 0.25rem;color: #664d03;background-color: #fff3cd;border-color: #ffecb5;"><h1 style="color:#494949;font-size: 15px;line-height: 18px;margin-bottom:5px;">Special Request:</h1><h5 style="color:#74787e;font-size: 11.5px;line-height: 18px;padding:5px 15px;margin-top:5px;margin-bottom:0px">{{$reservation->comments}}</h5></div>
    @endif
    <p style="text-align: center; color: #005899; font-size: 11.5px;">
    <b>Welcome to Los Cabos!</b> We are confident that you and your family will have a wonderful vacation experience. This voucher is your boarding pass for the Private that will transport you and your family to our resort. Our representative will be waiting for you outside the airport. <br> He will be holding a sign that says his name. And is the only person who knows your E-Ticket number <b>{{$reservation->voucher}}</b> Anyone else who does not have or know your E-Ticket number, they are not Staff from our Company. 
    </p>
    <p style="text-align: center; color: #005899; font-size: 11.5px;">
    Please note that the personnel inside the airport terminals are not "Cabo Drivers" employees even if they say so. We encourage you to ignore them and walk to the exit of the airport. Where The Cabo Drivers staff will be ready to transport you and your family to the resort. He will wait no longer that 90 minutes after the plane arrives. If you have any problem at your arrival, please report it to our Cabo Drivers staff. In case of any reschedule in your flight arrival, please notified us immediately by phone 6241104185 and if you are already in Los Cabos you have to dial 6241611548 in order to make the necessary changes on your pick up.
    </p>
@endcomponent



