<!DOCTYPE html>
<html>

<head>
    <title>Reservation Details - {{$reservation->voucher}}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            color-adjust: exact;
        }

        body {
            height: 100vh;
            display: grid;
            place-items: flex-start;
            justify-content: center;
            padding: 15px;
        }
        .pt-2{
            padding-top: 2rem!important;
        }

        .invoice {
            width: min(900px, 90vw);
            font: 500 1rem 'myriad pro', helvetica, sans-serif;
            border: 0.5px solid black;
            padding: 3rem 2.3rem;
            display: flex;
            flex-direction: column;
            gap: 1.4rem;
        }
        @media(min-width:1200px){
            .invoice{
                width: min(600px, 90vw);
                font: 400 0.7rem 'myriad pro', helvetica, sans-serif;
            }
        }

        .invoice-wrapper {
            display: flex;
            justify-content: space-between;
            padding: 0 1rem;
        }

        .invoice-company {
            text-align: right;
        }

        .invoice-company-name {
            font-size: 0.9rem;
            margin-bottom: 1.25rem;
        }

        .invoice-company-address {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .invoice-logo {
            width: auto;
            height: 3.7rem;
        }

        .invoice-billing-company {
            font-size: 0.65rem;
            margin-bottom: 0.25rem;
        }

        .invoice-billing-address {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .invoice-info {
            display: flex;
            justify-content: space-between;
            gap: 2rem;
            margin: 0.25rem 0;
        }
        .invoice-info-footer {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 1rem;
        }
        .invoice-info-footer p{
            font-size: 1rem;
        }
        .invoice-info-footer span{
            font-size: .7rem;
        }
        .invoice-info-footer small{
            display: flex;
            align-items: center;
        }
        .invoice-info:nth-of-type(5) {
            margin-top: 1.5rem;
        }

        .invoice-info-value {
            font-weight: 900;
        }
        .invoicetable {
            width: 100%;
        }

        .invoice-table,
        th,
        td {
            border-collapse: collapse;
        }
        th,
        td {
            width: calc((600px - 3rem) / 4);
            text-align: left;
            padding: 0.44rem;
        }
        tr:nth-of-type(1) {
            background-color: rgba(0, 0, 0, 0.333);
        }
        tr {
            border-bottom: 0.5px solid rgba(0, 0, 0, 0.25);
        }
        tr:nth-child(even) {
            background-color: #bde0fe; /* Color azul para las filas pares */
        }
        .invoice-total {
            font-weight: 900;
        }

        .invoice-print {
            font-size: 1.25rem;
            margin: 0 auto;
            cursor: pointer;
            border: 1.25px solid black;
            border-radius: 50%;
            padding: 0.6rem;
        }

        .invoice-print:active {
            background-color: black;
            color: white;
        }
        .left_line{
            border-left: #000 solid 2px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.1.135/jspdf.min.js"></script>
</head>

<body id="target">

    <main class='invoice'>
        <div class='invoice-wrapper'>
            <img src="{{ asset('assets/images/cabo_drivers_logo.webp') }}"
                alt='logo' class='invoice-logo'>
            <div class='invoice-company'>
                <h2 class='invoice-company-name'>CABO DRIVERS SERVICES</h2>
                <p class='invoice-company-address'>
                    <span>Calle Forjadores MZ6 LT5 Int. 11</span>
                    <span>San José del Cabo, Baja California Sur, México.</span>
                    <span>reservations@cabodrivers.com </span>
                </p>
            </div>
        </div>
        <div class='invoice-wrapper'>
            <div class='invoice-billing'>
                <div class='invoice-info'>
                    <span class='invoice-info-key'>Voucher No:</span>
                    <span class='invoice-info-value'><b>{{$reservation->voucher}}</b></span>
                </div>
                <div class='invoice-info'>
                  <span class='invoice-info-key'>Trip Type:</span>
                  <span class='invoice-info-value'><b>{{$reservation->message_t}}</b></span>
                </div>
              {{-- <div class='invoice-info'>
                <span class='invoice-info-key'>Issue Date:</span>
                <span class='invoice-info-value'>10/05/2033</span>
              </div> --}}
            </div>
            <div class='invoice-details'>
              <div class='invoice-info'>
                <span class='invoice-info-key'>Client Name:</span>
                <span class='invoice-info-value'><b>{{$reservation->fullname}}</b></span>
              </div>
              <div class='invoice-info'>
                <span class='invoice-info-key'>Email:</span>
                <span class='invoice-info-value'><b>{{$reservation->email}}</b></span>
              </div>
              <div class='invoice-info'>
                <span class='invoice-info-key'>Phone:</span>
                <span class='invoice-info-value'><b>{{$reservation->phone}}</b></span>
              </div>
            </div>
          </div>

        @if($reservation->message_t == 'ARRIVAL')
            <table class='invoice-table'>
                <tr>
                    <th>PRIVATE SERVICE {{' ('.$reservation->message_t.')'}}</th>
                    <th></th>
                </tr>
                <tr>
                    <td><b>Hotel:</b></td>
                    <td>{{$reservation->resort->name}}</td>
                </tr>
                <tr>
                    <td><b>Arrival Flight:</b></td>
                    <td>{{ $reservation->arrival_airline . ' ' . $reservation->arrival_flight }}</td>
                </tr>
                <tr>
                    <td><b>Arrival Date:</b></td>
                    <td>{{$reservation->arrival_date . ' ' . $reservation->arrival_time}}</td>
                </tr>
                @if ($reservation->arrival_stop_time)
                    <tr>
                        <td><b>Arrival Stop Time:</b></td>
                        <td>{{$reservation->arrival_stop_time}}</td>
                    </tr>
                    <tr>
                        <td><b>Arrival Stop Place:</b></td>
                        <td>{{$reservation->arrival_stop_place}}</td>
                    </tr>
                @endif
                <tr>
                    <td><b>Passengers:</b></td>
                    <td>{{$reservation->total_travelers}}</td>
                </tr>
                <tr>
                    <td><b>Booster seat:</b></td>
                    <td>@if($reservation->booster_seat) YES @else NO @endif</td>
                </tr>
                <tr>
                    <td><b>Car seat:</b></td>
                    <td>@if($reservation->car_seat) YES @else NO @endif</td>
                </tr>
                <tr>
                    <td><b>Grocery Stop:</b></td>
                    <td>@if($reservation->shopping_stop) YES @else NO @endif</td>
                </tr>
                <tr>
                    <td><b>Total:</b></td>
                    <td><b>${{$reservation->total}} USD</b></td>
                </tr>
                <tr>
                    <td><b>Total (MXN):</b></td>
                    <td><b>${{$reservation->total * 19 }} MXN</b></td>
                </tr>
                <tr>
                    <td><b>Pay Method:</b></td>
                    <td><span style="color: #ec7728; font-weight: bold;"><b>Cash on Arrival</b></span></td>
                </tr>

            </table>
        @elseif($reservation->message_t == 'DEPARTURE')
            <table class='invoice-table'>
                <tr>
                    <th>PRIVATE SERVICE {{' ('.$reservation->message_t.')'}}</th>
                    <th>VOUCHER No. {{$reservation->voucher}}</th>
                </tr>
                <tr>
                    <td><b>Pick up:</b></td>
                    <td>{{$reservation->resort->name}}</td>
                </tr>
                <tr>
                    <td><b>Departure Flight:</b></td>
                    <td>{{ $reservation->arrival_airline . ' ' . $reservation->arrival_flight }}</td>
                </tr>
                <tr>
                    <td><b>Departure Date:</b></td>
                    <td>{{$reservation->arrival_date . ' ' . $reservation->arrival_time}}</td>
                </tr>
                @if ($reservation->departure_pickup_time)
                    <tr>
                        <td><b>Departure pickup time:</b></td>
                        <td><b style="color: #ff6219">{{$reservation->departure_pickup_time}}</b></td>
                    </tr>
                @endif
                @if ($reservation->arrival_stop_time)
                    <tr>
                        <td><b>Departure Stop Time:</b></td>
                        <td>{{$reservation->arrival_stop_time}}</td>
                    </tr>
                    <tr>
                        <td><b>Departure Stop Place:</b></td>
                        <td>{{$reservation->arrival_stop_place}}</td>
                    </tr>
                @endif
                <tr>
                    <td><b>Passengers:</b></td>
                    <td>{{$reservation->total_travelers}}</td>
                </tr>
                <tr>
                    <td><b>Booster seat:</b></td>
                    <td>@if($reservation->booster_seat) YES @else NO @endif</td>
                </tr>
                <tr>
                    <td><b>Car seat:</b></td>
                    <td>@if($reservation->car_seat) YES @else NO @endif</td>
                </tr>
                <tr>
                    <td><b>Grocery Stop:</b></td>
                    <td>@if($reservation->shopping_stop) YES @else NO @endif</td>
                </tr>
                <tr>
                    <td><b>Total:</b></td>
                    <td>${{$reservation->total}} USD</td>
                </tr>
                <tr>
                    <td><b>Total (MXN):</b></td>
                    <td><b>${{$reservation->total * 19 }} MXN</b></td>
                </tr>
                {{-- <tr>
                    <td><b>Pay Method:</b></td>
                    <td><span style="color: #ec7728; font-weight: bold;">Cash on Arrival</span></td>
                </tr> --}}
            </table>
        @elseif($reservation->message_t == 'ROUND TRIP')
            <table class='invoice-table'>
                <tr>
                    <th>ARRIVAL INFO</th>
                    <th></th>
                    <th>DEPARTURE INFO</th>
                    <th></th>
                </tr>
                <tr>
                    <td><b>Arrival:</b></td>
                    <td>{{ $reservation->location_start === 0 ? "Los Cabos Int. Airport" : $reservation->resort->name }}</td>
                    <td class="left_line"><b>Pick up:</b></td>
                    <td>{{$reservation->resort->name}}</td>
                </tr>
                <tr>
                    <td><b>Arrival Flight:</b></td>
                    <td>{{ $reservation->arrival_airline . ' ' . $reservation->arrival_flight }}</td>
                    <td class="left_line"><b>Departure Flight:</b></td>
                    <td>{{$reservation->departure_airline." ".$reservation->departure_flight}}</td>
                </tr>
                <tr>
                    <td><b>Arrival Date:</b></td>
                    <td>{{$reservation->arrival_date . ' ' . $reservation->arrival_time}}</td>
                    <td class="left_line"><b>Departure Date:</b></td>
                    <td>{{$reservation->departure_date ." ". $reservation->departure_time}}</td>
                    <b style="color: #ff6219">Departure pickup time:</b>|<b style="color: #ff6219">{{$reservation->departure_pickup_time}}</b>
                </tr>
                @if ($reservation->departure_pickup_time)
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="left_line"><b>Departure pickup time:</b></td>
                        <td><b style="color: #ff6219">{{$reservation->departure_pickup_time}}</b></td>
                    </tr>
                @endif
                @if ($reservation->arrival_stop_time || $reservation->departure_stop_time)
                    <tr>
                        @if ($reservation->arrival_stop_time)
                            <td><b>Arrival Stop Time:</b></td>
                            <td>{{$reservation->arrival_stop_time}}</td>
                            @else
                            <td></td>
                            <td></td>
                        @endif
                        @if ($reservation->departure_stop_time)
                            <td class="left_line"><b>Departure Stop Time:</b></td>
                            <td>{{$reservation->departure_stop_time}}</td>
                            @else
                            <td class="left_line"></td>
                            <td></td>
                        @endif
                    </tr>
                    <tr>
                        @if ($reservation->arrival_stop_place)
                            <td><b>Arrival Stop Place:</b></td>
                            <td>{{$reservation->arrival_stop_place}}</td>
                            @else
                            <td></td>
                            <td></td>
                        @endif
                        @if ($reservation->departure_stop_place)
                            <td class="left_line"><b>Departure Stop Place:</b></td>
                            <td>{{$reservation->departure_stop_place}}</td>
                            @else
                            <td class="left_line"></td>
                            <td></td>
                        @endif
                    </tr>
                @endif
                <tr>
                    <td><b>Passengers:</b></td>
                    <td>{{$reservation->total_travelers}}</td>
                    <td class="left_line"><b>Passengers:</b></td>
                    <td>{{$reservation->passengers}}</td>
                </tr>
                <tr>
                    <td><b>Destination:</b></td>
                    <td>{{$reservation->resort->name}}</td>
                    <td class="left_line"><b>Grocery Stop:</b></td>
                    <td>@if($reservation->shopping_stop) YES @else NO @endif</td>
                </tr>
                <tr>
                    <td><b>Booster seat:</b></td>
                    <td>@if($reservation->booster_seat) YES @else NO @endif</td>
                    <td class="left_line"><b>Car seat:</b></td>
                    <td>@if($reservation->car_seat) YES @else NO @endif</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="left_line"><b>Total (USD):</b></td>
                    <td><b>${{$reservation->total}} USD</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="left_line"><b>Total (MXN):</b></td>
                    <td><b>${{$reservation->total * 19 }} MXN</b></td>
                </tr>
                {{-- <tr>
                    <td></td>
                    <td></td>
                    <td class="left_line"><b>Pay Method:</b></td>
                    <td><span style="color: #ec7728; font-weight: bold;">Cash on Arrival</span></td>
                </tr> --}}
            </table>
        @endif

        @if($reservation->comments != '')
            <table class='invoice-table'>
                <tr>
                    <th>SPECIAL REQUEST</th>
                </tr>
                <tr>
                    <td>{{$reservation->comments}}</td>
                </tr>
            </table>
        @endif
        <div class='invoice-wrapper'>
            <div class='invoice-billing'>
                <div class='invoice-info-footer'>
                    <div class="invoice-info-footer">

                        <p>
                            <b>IF YOU ARRIVE AT TERMINAL #1</b> <br>
                        </p>
                        <small>
                            <b style="color:#ec7728">WE WILL WAITING FOR YOU AT THE GROUP DEPARTURE</b> <br>
                        </small>


                        <p>
                            <b>IF YOU ARRIVE AT TERMINAL #2</b> <br>
                        </p>
                        <small>
                            <b style="color:#ec7728">WE WILL WAITING FOR YOU AT THE UMBRELLA #3</b> <br>
                        </small>

                    </div>
                    <p style="text-align: center"><img src="{{ $reservation->qr_image }}" style="margin:0 auto;max-width:50%" alt="QR Code" /></p>
                </div>
                <div class="invoice-info-title pt-2">
                    <span>
                        We will wait for you with a sign with your name on it and
                        with a palette with the name and the logo of Cabo Driver Services.
                    </span>

                </div>


            </div>
        </div>

        <ion-icon name="print-outline" class='invoice-print'></ion-icon>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
        const print = document.querySelector('.invoice-print');
        const media = window.matchMedia('print');

        const update = (e) => print.style.display = e.matches ? 'none' : 'block';

        function convert() {
        media.addEventListener('change',update,false);
        window.print();
        }

        print.addEventListener('click',convert,false);
    </script>
</body>

</html>
