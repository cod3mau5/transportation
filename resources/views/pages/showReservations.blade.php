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

        .invoice {
            width: min(900px, 90vw);
            font: 500 1rem 'myriad pro', helvetica, sans-serif;
            border: 0.5px solid black;
            padding: 4rem 3rem;
            display: flex;
            flex-direction: column;
            gap: 3rem;
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
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.1.135/jspdf.min.js"></script>
</head>

<body id="target">

    <main class='invoice'>
        <div class='invoice-wrapper'>
            <img src="{{ asset('assets/images/cabo_drivers_logo.png') }}"
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

        @if($reservation->message_t == 'ARRIVAL')
            <table class='invoice-table'>
                <tr>
                    <th>PRIVATE SERVICE {{' ('.$reservation->message_t.')'}}</th>
                    <th>VOUCHER No. {{$reservation->voucher}}</th>
                </tr>
                <tr>
                    <td><b>Name:</b></td>
                    <td>{{$reservation->fullname}}</td>
                </tr>
                <tr>
                    <td><b>Email:</b></td>
                    <td>{{$reservation->email}}</td>
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
                <tr>
                    <td><b>Phone Number:</b></td>
                    <td>{{$reservation->phone}}</td>
                </tr>
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
                    <td><b>Pay Method:</b></td>
                    <td><span style="color: #ec7728; font-weight: bold;">Cash on Arrival</span></td>
                </tr>

            </table>
        @elseif($reservation->message_t == 'DEPARTURE')
            <table class='invoice-table'>
                <tr>
                    <th>PRIVATE SERVICE {{' ('.$reservation->message_t.')'}}</th>
                    <th>VOUCHER No. {{$reservation->voucher}}</th>
                </tr>
                <tr>
                    <td><b>Name:</b></td>
                    <td>{{$reservation->fullname}}</td>
                </tr>
                <tr>
                    <td><b>Email:</b></td>
                    <td>{{$reservation->email}}</td>
                </tr>
                <tr>
                    <td><b>Meeting At:</b></td>
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
                <tr>
                    <td><b>Phone Number:</b></td>
                    <td>{{$reservation->phone}}</td>
                </tr>
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
                    <td><b>Pay Method:</b></td>
                    <td><span style="color: #ec7728; font-weight: bold;">Cash on Arrival</span></td>
                </tr>

            </table>
        @elseif($reservation->message_t == 'ROUND TRIP')
            <table class='invoice-table'>
                <tr>
                    <th>PRIVATE SERVICE {{' ('.$reservation->message_t.')'}}</th>
                    <th>VOUCHER No. {{$reservation->voucher}}</th>
                </tr>
                <tr>
                    <td><b>Name:</b></td>
                    <td>{{$reservation->fullname}}</td>
                </tr>
                <tr>
                    <td><b>Email:</b></td>
                    <td>{{$reservation->email}}</td>
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
                <tr>
                    <td><b>Phone Number:</b></td>
                    <td>{{$reservation->phone}}</td>
                </tr>
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
                    <td><b>Pay Method:</b></td>
                    <td><span style="color: #ec7728; font-weight: bold;">Cash on Arrival</span></td>
                </tr>
            </table>
            <table class="invoice-table">
                <tr>
                    <th>DEPARTURE INFO</th>
                    <th></th>
                </tr>
                <tr>
                    <td><b>Hotel:</b></td>
                    <td>{{$reservation->resort->name}}</td>
                </tr>
                <tr>
                    <td><b>Departure Flight:</b></td>
                    <td>{{$reservation->departure_airline." ".$reservation->departure_flight}}</td>
                </tr>
                <tr>
                    <td><b>Flight Date:</b></td>
                    <td>{{$reservation->departure_date ." ". $reservation->departure_time}}</td>
                </tr>
            </table>
        @endif
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
