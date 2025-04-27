<?php

namespace App\Http\Controllers;
use App\Models\WordpressPost;

use App\Models\Rate;
use App\Models\Tour;
use App\Models\Unit;
use App\Mail\sendMail;
use App\Models\Resort;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Zone;

class PagesController extends Controller
{
    public function homepage(){
        $resorts = Resort::all()->sortBy("name");
        $units   = Unit::all()->sortBy("name");
        $rates= Rate::all()->sortBy('zone_id');
        $zones = Zone::all()->sortBy('zone');
        // dd($zones->toArray());

        $start_location = (isset($_GET['start_location'])) ? $_GET['start_location'] : '';
        $end_location   = (isset($_GET['end_location'])) ? $_GET['end_location'] : '';
        $passengers     = (isset($_GET['passengers'])) ? (int) $_GET['passengers'] : '';
        $date_arrival   = (isset($_GET['arrival'])) ?  $_GET['arrival'] : '';
        $date_departure = (isset($_GET['departure'])) ? $_GET['departure'] : '';
        $pageTitle = "Cabo Airport Transportation |  Private Transfers & Shuttle Options";

        return view('pages.new.home',compact(
            'resorts','units','rates','zones',
            'start_location','end_location',
            'passengers','date_arrival',
            'date_departure','pageTitle'
        ));
    }
    public function map(){
        $resorts = Resort::all()->sortBy("name");
        $units   = Unit::all()->sortBy("name");
        $rates= Rate::all()->sortBy('zone_id');

        $start_location = (isset($_GET['start_location'])) ? $_GET['start_location'] : '';
        $end_location   = (isset($_GET['end_location'])) ? $_GET['end_location'] : '';
        $passengers     = (isset($_GET['passengers'])) ? (int) $_GET['passengers'] : '';
        $date_arrival   = (isset($_GET['arrival'])) ?  $_GET['arrival'] : '';
        $date_departure = (isset($_GET['departure'])) ? $_GET['departure'] : '';
        return view('pages.map',compact(
            'resorts','units','rates',
            'start_location','end_location',
            'passengers','date_arrival',
            'date_departure'
        ));
    }
    public function contactUs(){
        $resorts = Resort::all()->sortBy("name");
        $units   = Unit::all()->sortBy("name");
        $rates= Rate::all()->sortBy('zone_id');

        $start_location = (isset($_GET['start_location'])) ? $_GET['start_location'] : '';
        $end_location   = (isset($_GET['end_location'])) ? $_GET['end_location'] : '';
        $passengers     = (isset($_GET['passengers'])) ? (int) $_GET['passengers'] : '';
        $date_arrival   = (isset($_GET['arrival'])) ?  $_GET['arrival'] : '';
        $date_departure = (isset($_GET['departure'])) ? $_GET['departure'] : '';
        return view('pages.contact',compact(
            'resorts','units','rates',
            'start_location','end_location',
            'passengers','date_arrival',
            'date_departure'
        ));
    }
    public function gallery(){
        $resorts = Resort::all()->sortBy("name");
        $units   = Unit::all()->sortBy("name");
        $rates= Rate::all()->sortBy('zone_id');

        $start_location = (isset($_GET['start_location'])) ? $_GET['start_location'] : '';
        $end_location   = (isset($_GET['end_location'])) ? $_GET['end_location'] : '';
        $passengers     = (isset($_GET['passengers'])) ? (int) $_GET['passengers'] : '';
        $date_arrival   = (isset($_GET['arrival'])) ?  $_GET['arrival'] : '';
        $date_departure = (isset($_GET['departure'])) ? $_GET['departure'] : '';
        return view('pages.gallery',compact(
            'resorts','units','rates',
            'start_location','end_location',
            'passengers','date_arrival',
            'date_departure'
        ));
    }
    public function contact(){
        $resorts = Resort::all()->sortBy("name");
        $units   = Unit::all()->sortBy("name");
        $rates= Rate::all()->sortBy('zone_id');

        $start_location = (isset($_GET['start_location'])) ? $_GET['start_location'] : '';
        $end_location   = (isset($_GET['end_location'])) ? $_GET['end_location'] : '';
        $passengers     = (isset($_GET['passengers'])) ? (int) $_GET['passengers'] : '';
        $date_arrival   = (isset($_GET['arrival'])) ?  $_GET['arrival'] : '';
        $date_departure = (isset($_GET['departure'])) ? $_GET['departure'] : '';
        return view('pages.contact',compact(
            'resorts','units','rates',
            'start_location','end_location',
            'passengers','date_arrival',
            'date_departure'
        ));
    }
    public function booking($language='en'){

        $resort_options = '';
        $unit_options   = '';
        $vehicles = array();
        // $resorts = $wpdb->get_results('SELECT * FROM resorts ORDER BY name ASC');
        // $units   = $wpdb->get_results('SELECT * FROM units ORDER BY name ASC');
        // $rates   = $wpdb->get_results('SELECT * FROM rates ORDER BY zone_id, unit_id');
        $resorts = Resort::all()->sortBy("name");
        $units   = Unit::all()->sortBy("name");
        # ONLY SUBURBAN
        // $rates   = Rate::where('unit_id','1')->get()->sortBy('zone_id');
        $rates= Rate::all()->sortBy('zone_id');

        foreach ($resorts as $row) {
            $resort_options .=  '<option value="'.$row->id.'" data-zone="'.$row->zone_id.'">'.
                                    htmlentities($row->name).
                                '</option>';
        }

        foreach ($units as $unit) {
            $vehicles[$unit->id] = ['name'=> $unit->name, 'capacity'=> $unit->capacity];
            $unit_options .=  '<option value="'.$unit->id.'" data-name="'.$unit->id.'">'.
                                    htmlentities($unit->name).
                                '</option>';
        }

        $start_location = (isset($_GET['start_location'])) ? $_GET['start_location'] : '';
        $end_location   = (isset($_GET['end_location'])) ? $_GET['end_location'] : '';
        $passengers     = (isset($_GET['passengers'])) ? (int) $_GET['passengers'] : '';
        $date_arrival   = (isset($_GET['arrival'])) ?  $_GET['arrival'] : '';
        $date_departure = (isset($_GET['departure'])) ? $_GET['departure'] : '';

        $options=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
        if($language == 1){
            $language= json_decode(
                file_get_contents(asset('assets/json/english.json'),
                false,
                stream_context_create($options)),
                 true
            );
            $langUpdate=1;
        }else{
            $language= json_decode(
                file_get_contents(asset('assets/json/spanish.json'),
                false,
                stream_context_create($options)),
                 true
            );
            $langUpdate=0;
        }

        $trip_type=null;
        return view('pages.booking',compact(
            'resort_options','unit_options','vehicles',
            'resorts','units','rates','start_location',
            'end_location','passengers','date_arrival',
            'date_departure','language','langUpdate','trip_type'
        ));
    }
    public function sendMail(Request $request){

        if(env('APP_ENV')=='local'){
            Mail::to('code.bit.mau@gmail.com')
            ->cc([
                'maubkpro@hotmail.com'
            ])->send(new sendMail($request));

                $notification="El mensaje se ha enviado correctamente";
        }else{
            Mail::to('reservations@cabodrivers.com')
            ->cc([
                'code.bit.mau@gmail.com',
                'cabodriversservices@gmail.com'
            ])->send(new sendMail($request));
        }

        return back()->with(compact('notification'));
    }

    public function getLanguages($language){

        $options=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
        if($language == 'en'){
            session(['applocale' => 'en']);
            return json_decode(
                file_get_contents(asset('assets/json/english.json'),
                false,stream_context_create($options)),
                true
            );
        }else{
            session(['applocale' => 'es']);
            return json_decode(
                file_get_contents(asset('assets/json/spanish.json'),
                false,
                stream_context_create($options)),
                true
            );
        }
    }

    public function privacy(){
        $pageTitle="Privacy Policy";
        return view('pages.privacy',compact('pageTitle'));
    }

    public function hotel($hotelSlug){

        $resorts = Resort::all()->sortBy("name");
        $units   = Unit::all()->sortBy("name");
        $rates= Rate::all()->sortBy('zone_id');

        $start_location = (isset($_GET['start_location'])) ? $_GET['start_location'] : '';
        $end_location   = (isset($_GET['end_location'])) ? $_GET['end_location'] : '';
        $passengers     = (isset($_GET['passengers'])) ? (int) $_GET['passengers'] : '';
        $date_arrival   = (isset($_GET['arrival'])) ?  $_GET['arrival'] : '';
        $date_departure = (isset($_GET['departure'])) ? $_GET['departure'] : '';

        $record=str_replace('-And-','-&-',$hotelSlug);
        $record=str_replace('-',' ',$record);
        $record=Resort::where('name',$record)->firstOrFail();
        $coverImg=$record->images->where('category','cover')->first();
        $gallery=$record->images->where('category',null);
        return view('pages.hotel',compact(
            'record','coverImg','gallery',
            'resorts','units','rates',
            'start_location','end_location',
            'passengers','date_arrival',
            'date_departure'
        ));
    }

    public function tour($tourSlug){
        $record=str_replace('-And-','-&-',$tourSlug);
        $record=str_replace('-',' ',$record);
        $record=Tour::where('name',$record)->firstOrFail();
        $coverImg=$record->images->where('category','cover')->first();
        $gallery=$record->images->where('category',null);
        return view('pages.tour',compact('record','coverImg','gallery'));
    }

    public function restaurant($restaurantSlug){

        $resorts = Resort::all()->sortBy("name");
        $units   = Unit::all()->sortBy("name");
        $rates= Rate::all()->sortBy('zone_id');

        $start_location = (isset($_GET['start_location'])) ? $_GET['start_location'] : '';
        $end_location   = (isset($_GET['end_location'])) ? $_GET['end_location'] : '';
        $passengers     = (isset($_GET['passengers'])) ? (int) $_GET['passengers'] : '';
        $date_arrival   = (isset($_GET['arrival'])) ?  $_GET['arrival'] : '';
        $date_departure = (isset($_GET['departure'])) ? $_GET['departure'] : '';

        $record=str_replace('-And-','-&-',$restaurantSlug);
        $record=str_replace('-',' ',$record);
        $record=Resort::where('name',$record)->firstOrFail();
        $coverImg=$record->images->where('category','cover')->first();
        $gallery=$record->images->where('category',null);
        return view('pages.hotel',compact(
            'record','coverImg','gallery',
            'resorts','units','rates',
            'start_location','end_location',
            'passengers','date_arrival',
            'date_departure'
        ));
    }

    public function foreign($foreignSlug){
        $record=str_replace('-',' ',$foreignSlug);
        $record=Resort::where('name',$record)->firstOrFail();
        $coverImg=$record->images->where('category','cover')->first();
        $gallery=$record->images->where('category',null);
        return view('pages.hotel',compact('record','coverImg','gallery'));
    }

    public function sendBookingBar(Request $request,$language='en'){
        $resort_options = '';
        $unit_options   = '';
        $vehicles = array();
        $resorts = Resort::all()->sortBy("name");
        $units   = Unit::all()->sortBy("name");
        # ONLY SUBURBAN
        // $rates   = Rate::where('unit_id','1')->get()->sortBy('zone_id');
        $rates= Rate::all()->sortBy('zone_id');
        // dd($request->all());

        $trip_type=$request->trip_type;



        foreach ($resorts as $row) {
            $resort_options .=  '<option value="'.$row->id.'" data-zone="'.$row->zone_id.'">'.
                                    htmlentities($row->name).
                                '</option>';
        }

        foreach ($units as $unit) {
            $vehicles[$unit->id] = ['name'=> $unit->name, 'capacity'=> $unit->capacity];
            $unit_options .=  '<option value="'.$unit->id.'" data-name="'.$unit->id.'">'.
                                    htmlentities($unit->name).
                                '</option>';
        }

        if($request->trip_type == 'o_a' || $request->trip_type == 'r'){
            $start_location=null;
            $end_location   = (isset($request->start_location)) ? $request->start_location : '';
        }else{
            $start_location = (isset($request->start_location)) ? $request->start_location : '';
            $end_location   = null;
        }

        $passengers     = (int) $request->passengers;
        $date_arrival   = (isset($_GET['arrival'])) ?  $_GET['arrival'] : '';
        $date_departure = (isset($_GET['departure'])) ? $_GET['departure'] : '';

        $options=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
        if($language == 1){
            $language= json_decode(
                file_get_contents(asset('assets/json/english.json'),
                false,
                stream_context_create($options)),
                 true
            );
            $langUpdate=1;
        }else{
            $language= json_decode(
                file_get_contents(asset('assets/json/spanish.json'),
                false,
                stream_context_create($options)),
                 true
            );
            $langUpdate=0;
        }

        $arrival_date=$request->arrival_date_r;
        $departure_date=$request->departure_date_r;

        if($arrival_date == null && $departure_date == null){
            $arrival_date=$request->arrival_date_o_a;
            $departure_date=$request->departure_date_o_d;
        }

        return view('pages.booking',compact(
            'resort_options','unit_options','vehicles',
            'resorts','units','rates','start_location',
            'end_location','passengers','date_arrival',
            'date_departure','language','langUpdate','trip_type',
            'arrival_date','departure_date'
        ));
    }

    public function rateUs(){
        return redirect()->to('https://www.tripadvisor.ca/UserReview-g152516-d23359388-Cabo_Drivers_Services-San_Jose_del_Cabo_Los_Cabos_Baja_California-m11900.html');
    }

    /** for testing: */
    public function form(){
        $resort_options = '';
        $unit_options   = '';
        $vehicles = array();
        // $resorts = $wpdb->get_results('SELECT * FROM resorts ORDER BY name ASC');
        // $units   = $wpdb->get_results('SELECT * FROM units ORDER BY name ASC');
        // $rates   = $wpdb->get_results('SELECT * FROM rates ORDER BY zone_id, unit_id');
        $resorts = Resort::all()->sortBy("name");
        $units   = Unit::all()->sortBy("name");
        $rates   = Rate::where('unit_id','1')->get()->sortBy('zone_id');
        foreach ($resorts as $row) {
            $resort_options .=  '<option value="'.$row->id.'" data-zone="'.$row->zone_id.'">'.
                                    htmlentities($row->name).
                                '</option>';
        }
        foreach ($units as $unit) {
            $vehicles[$unit->id] = ['name'=> $unit->name, 'capacity'=> $unit->capacity];
            $unit_options .=  '<option value="'.$unit->id.'" data-name="'.$unit->id.'">'.
                                    htmlentities($unit->name).
                                '</option>';
        }
        $start_location = (isset($_GET['start_location'])) ? $_GET['start_location'] : '';
        $end_location   = (isset($_GET['end_location'])) ? $_GET['end_location'] : '';
        $passengers     = (isset($_GET['passengers'])) ? (int) $_GET['passengers'] : '';
        $date_arrival   = (isset($_GET['arrival'])) ?  $_GET['arrival'] : '';
        $date_departure = (isset($_GET['departure'])) ? $_GET['departure'] : '';
        return view('new',compact(
            'resort_options','unit_options','vehicles',
            'resorts','units','rates','start_location',
            'end_location','passengers','date_arrival',
            'date_departure'
        ));
    }

    public function ggg($id){
        $reservation= Reservation::where('id',$id)->first();
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

    public function services($slug){
        $post = WordpressPost::private()
        ->where('post_name', $slug)
        ->where('post_type', 'post')
        ->firstOrFail();

        return view('pages.articles', [
            'post' => $post,
            'excerpt' => $post->excerpt,
            'meta_description' => $post->meta_description,
        ]);
    }

    public function zoneMap(){
        $resorts = Resort::all()->sortBy("name");
        $units   = Unit::all()->sortBy("name");
        $rates= Rate::all()->sortBy('zone_id');
        $zones = Zone::all()->sortBy('zone');
        $start_location = (isset($_GET['start_location'])) ? $_GET['start_location'] : '';
        $end_location   = (isset($_GET['end_location'])) ? $_GET['end_location'] : '';
        $passengers     = (isset($_GET['passengers'])) ? (int) $_GET['passengers'] : '';
        $date_arrival   = (isset($_GET['arrival'])) ?  $_GET['arrival'] : '';
        $date_departure = (isset($_GET['departure'])) ? $_GET['departure'] : '';
        return view('pages.new.map',compact('resorts','units','rates','zones','start_location','end_location','passengers','date_arrival','date_departure'));
    }
}
