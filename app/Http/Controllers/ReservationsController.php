<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Resort;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\SendReservation;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

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

        if (!empty($request['_departure_stop_time'])) {
            $request['_departure_stop_time'] = date('H:i:s', strtotime($request['_departure_stop_time']));
        } else {
            $request['_departure_stop_time'] = null;
        }

        $fullname = $request['_contact_firstname'] . " " . $request['_contact_lastname'];

        // dd($request->all());
        if(!empty($request['_departure_stop_time']) && $request['_departure_previous_stop']=='true'){
            $departure_pickup_time = Carbon::createFromFormat('H:i:s', $request['_departure_stop_time'])
            ->subHours(2)
            ->subMinutes(40)
            ->format('H:i:s');
        }elseif(!empty($request['_departure_time'])){
            $request['_departure_stop_time']=null;
            $request['_departure_stop_place']=null;
            $departure_pickup_time = Carbon::createFromFormat('H:i:s', $request['_departure_time'])
            ->subHours(2)
            ->subMinutes(40)
            ->format('H:i:s');
        }else{
            $request['_departure_stop_time']=null;
            $request['_departure_stop_place']=null;
            $departure_pickup_time = null;
        }

        // dd($departure_pickup_time,env('APP_ENV'));
        // $wpdb now is $reservation

        // Generar el QR code y guardarlo en el directorio qrcodes
        $qrCode= QrCode::color(65, 186, 174)->format('png')->size(350)
        ->merge(base_path()."/public_html/assets/images/logo.png", .21, true)
        ->generate("https://cabodrivers.com/reservation/{$voucher}/show", base_path().'/public_html/qrcodes/'.$voucher.'.png');

        // Creamos una ruta única para el archivo de imagen
        $imagePath = "https://cabodrivers.com/qrcodes/{$voucher}.png";

        $reservation=Reservation::create([
                "resort_id"             => $resort_id,
                "unit_id"               => $request['_unit'],
                "location_start"        => $request['_location_start'],
                "location_end"          => $request['_location_end'],
                "qr_image"              => $imagePath,
                "voucher"               => $voucher,
                "fullname"              => $fullname,
                "email"                 => $request['_contact_email'],
                "type"                  => $trip_type,
                "phone"                 => $request['_contact_phone'],
                "passengers"            => $request['_passengers'],
                "children"              => $request['_children'],
                "booster_seat"          => $request['_booster_seat'] == 'true' ? true : false,
                "car_seat"              => $request['_car_seat'] == 'true' ? true : false,
                "shopping_stop"         => $request['_shopping_stop'] == 'true' ? true : false,
                "total_travelers"       => $request['_children'] + $request['_passengers'],
                "arrival_date"          => $request['_arrival_date'],
                "arrival_time"          => $request['_arrival_time'],
                "arrival_airline"       => $request['_arrival_company'],
                "arrival_flight"        => $request['_arrival_flight'],
                "arrival_stop_time"     => $request['_arrival_stop_time'],
                "arrival_stop_place"    => $request['_arrival_stop_place'],
                "departure_date"        => $request['_departure_date'],
                "departure_time"        => $request['_departure_time'],
                "departure_airline"     => $request['_departure_company'],
                "departure_flight"      => $request['_departure_flight'],
                "departure_stop_time"   => $request['_departure_stop_time'],
                "departure_stop_place"  => $request['_departure_stop_place'],
                "departure_pickup_time" => $departure_pickup_time,
                "comments"              => $request['_contact_request'],
                "payment_type"          => $request['pay_method'],
                "subtotal"              => !empty($request['_subtotal']) ? $request['_subtotal'] : 0,
                "total"                 => !empty($request['_total']) ? $request['_total'] : 0,
                "source"                => 'web',
                "created_at"            => date('Y-m-d H:m:i'),
                "updated_at"            => date('Y-m-d H:m:i')
        ]);

        $reservation->language = $request['language'];
        // dd($reservation->language);
        $reservation->message_t=$message_t;
        $reservation->resort=$resort;
        $reservation->unit=$unit;
        $reservation->arrivalFlight=$request['_arrival_company']." ".$request['_arrival_flight'];
        $reservation->arrivalDate= date('m/d/Y', strtotime($request['_arrival_date'])). " ". date('h:i a', strtotime($request['_arrival_time']));

        $reservation->departureFlight=$request['_departure_company']." ".$request['_departure_flight'];
        $reservation->departureDate= date('m/d/Y', strtotime($request['_departure_date'])). " ". date('h:i a', strtotime($request['_departure_time']));

        // Verificacion del entorno para envio de mail
        if(env('APP_ENV')=='local'){
            Mail::to('code.bit.mau@gmail.com')
            ->cc([
                'mauri.bmxxx@gmail.com'
                ])
            ->send(new SendReservation($reservation));
        }else{
            Mail::to($reservation->email)
            ->cc([
                'code.bit.mau@gmail.com',
                'reservations@cabodrivers.com',
                'cabodriversservices@gmail.com',
                'cabodriverloscabos@gmail.com'
                ])
            ->send(new SendReservation($reservation));
        }

        $reservation=true;

        if($reservation){
            $notification="la reserva se ha guardado correctamente";
        }else{
            $notification="Hubo un problema al guardar la reserva";
        }
        return back()->with(compact('notification'));

    }
    public function showReservation($voucher){
        $reservation= Reservation::where('voucher',$voucher)->first();
        if(!$reservation){
            abort(404, 'Reservation not found, check your voucher');
        }

        if ($reservation->type == 'oneway')
        {
            if ($reservation->location_start == 0)
                $reservation->message_t = "ARRIVAL";
            if ($reservation->location_end == 0)
                $reservation->message_t = "DEPARTURE";
        } else {
            $reservation->message_t = 'ROUND TRIP';
        }
        return view('pages.showReservations',compact('reservation'));
    }
}
