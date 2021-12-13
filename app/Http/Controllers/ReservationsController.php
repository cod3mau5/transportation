<?php

namespace App\Http\Controllers;

use App\Mail\SendReservation;
use App\Models\Unit;
use App\Models\Resort;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservationsController extends Controller
{
    public function sendReservation(Request $request){
        $resort_id = $request['_location_start'] > 0 ? $request['_location_start'] : $request['_location_end'];
        $trip_type = $request['_trip_type'] == 'o' ? 'oneway' : 'roundtrip';
        $message_t = $request['_trip_type'] == 'o' ? 'ARRIVAL' : 'ROUND-TRIP';
        $voucher   = "CD-".mt_rand();

        if ($request['_trip_type'] == 'o')
        {
            if ($request['_location_start'] == 0)
                $message_t = "ARRIVAL";
            if ($request['_location_end'] == 0)
                $message_t = "DEPARTURE";
        } else {
            $message_t = 'ROUND TRIP';
        }
    
        // //fetch resort name
        $resort = Resort::find($resort_id);
        //fetch unit name
        $unit   = Unit::find($request['_unit']);
        $location_start = $resort->name;
        if (!empty($request['_arrival_date']))
            $request['_arrival_date'] = date('Y-m-d', strtotime($request['_arrival_date']));

        if (!empty($request['_departure_date'])) {
            $request['_departure_date'] = date('Y-m-d', strtotime($request['_departure_date']));
        } else {
            $request['_departure_date'] = null;
        }
        if (!empty($request['_arrival_time']))
            $request['_arrival_time'] = date('H:i:s', strtotime($request['_arrival_time']));

        if (!empty($request['_departure_time'])) {
            $request['_departure_time'] = date('H:i:s', strtotime($request['_departure_time']));
        } else {
            $request['_departure_time'] = null;
        }

        $fullname = $request['_contact_firstname'] . " " . $request['_contact_lastname'];

        // $wpdb now is $reservation
        $reservation=Reservation::create([
               "resort_id"          => $resort_id,
               "unit_id"            => $request['_unit'],
               "location_start"     => $request['_location_start'],
               "location_end"       => $request['_location_end'],
               "voucher"            => $voucher,
               "fullname"           => $fullname,
               "email"              => $request['_contact_email'],
               "type"               => $trip_type,
               "phone"              => $request['_contact_phone'],
               "passengers"         => $request['_passengers'],
               "arrival_date"       => $request['_arrival_date'],
               "arrival_time"       => $request['_arrival_time'],
               "arrival_airline"    => $request['_arrival_company'],
               "arrival_flight"     => $request['_arrival_flight'],
               "departure_date"     => $request['_departure_date'],
               "departure_time"     => $request['_departure_time'],
               "departure_airline"  => $request['_departure_company'],
               "departure_flight"   => $request['_departure_flight'],
               "comments"           => $request['_contact_request'],
               "payment_type"       => $request['pay_method'],
               "subtotal"           => !empty($request['_subtotal']) ? $request['_subtotal'] : 0,
               "total"              => !empty($request['_total']) ? $request['_total'] : 0,
               "source"             => 'web',
               "created_at"         => date('Y-m-d H:m:i'),
               "updated_at"         => date('Y-m-d H:m:i')
        ]);


        $reservation->message_t=$message_t;
        $reservation->resort=$resort;
        $reservation->unit=$unit;
        $reservation->arrivalFlight=$request['_arrival_company']." ".$request['_arrival_flight'];
        $reservation->arrivalDate= date('m/d/Y', strtotime($request['_arrival_date'])). " ". date('h:i a', strtotime($request['_arrival_time']));

        $reservation->departureFlight=$request['_departure_company']." ".$request['_departure_flight'];
        $reservation->departureDate= date('m/d/Y', strtotime($request['_departure_date'])). " ". date('h:i a', strtotime($request['_departure_time']));

        Mail::to($reservation->email)->send(new SendReservation($reservation));
        // return new SendReservation($reservation);
        dd($reservation);
    }
}
