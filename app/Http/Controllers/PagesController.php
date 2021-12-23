<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Unit;
use App\Mail\sendMail;
use App\Models\Resort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function homepage(Request $request){
        $options=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        ); 
        if(request('language') === '0'){
            $language= json_decode(file_get_contents(asset('assets/json/spanish.json'),false,stream_context_create($options)), true);
            $langUpdate=0;
        }else{
            $language= json_decode(file_get_contents(asset('assets/json/english.json'),false,stream_context_create($options)), true);
            $langUpdate=1;
        }
        if($request->about_us == "true"){
            $about_us=true;
        }else{
            $about_us=false;
        }
        return view('pages.home',compact('language','langUpdate','about_us'));
    }
    public function inicio($language){
        $options=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        ); 
        if($language == 1){
            $language= json_decode(file_get_contents(asset('assets/json/english.json'),false,stream_context_create($options)), true);
            $langUpdate=1;
        }else{
            $language= json_decode(file_get_contents(asset('assets/json/spanish.json'),false,stream_context_create($options)), true);
            $langUpdate=0;
        }
        return view('pages.home',compact('language','langUpdate'));
    }
    public function contactUs($language){
        $options=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        ); 
        if($language == 1){
            $language= json_decode(file_get_contents(asset('assets/json/english.json'),false,stream_context_create($options)), true);
            $langUpdate=1;
        }else{
            $language= json_decode(file_get_contents(asset('assets/json/spanish.json'),false,stream_context_create($options)), true);
            $langUpdate=0;
        }
        return view('pages.contact',compact('language','langUpdate'));
    }
    public function gallery($language){
        $options=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        ); 
        if($language == 1){
            $language= json_decode(file_get_contents(asset('assets/json/english.json'),false,stream_context_create($options)), true);
            $langUpdate=1;
        }else{
            $language= json_decode(file_get_contents(asset('assets/json/spanish.json'),false,stream_context_create($options)), true);
            $langUpdate=0;
        }
        return view('pages.gallery',compact('language','langUpdate'));
    }
    public function contact($language){
        $options=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        ); 
        if($language == 1){
            $language= json_decode(file_get_contents(asset('assets/json/english.json'),false,stream_context_create($options)), true);
            $langUpdate=1;
        }else{
            $language= json_decode(file_get_contents(asset('assets/json/spanish.json'),false,stream_context_create($options)), true);
            $langUpdate=0;
        }
        return view('pages.contact',compact('language','langUpdate'));
    }
    public function booking($language){
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

        $options=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        ); 
        if($language == 1){
            $language= json_decode(file_get_contents(asset('assets/json/english.json'),false,stream_context_create($options)), true);
            $langUpdate=1;
        }else{
            $language= json_decode(file_get_contents(asset('assets/json/spanish.json'),false,stream_context_create($options)), true);
            $langUpdate=0;
        }
        return view('pages.booking',compact(
            'resort_options','unit_options','vehicles',
            'resorts','units','rates','start_location',
            'end_location','passengers','date_arrival',
            'date_departure','language','langUpdate'
        ));
    }
    public function sendMail(Request $request){
        Mail::to('cabodriverloscabos@gmail.com')->cc(['cabodriversservices@gmail.com','maubkpro@hotmail.com'])->send(new sendMail($request));

        
            $notification="El mensaje se ha enviado correctamente";

        return back()->with(compact('notification'));
    }

    public function getLanguages($language){

        $options=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        ); 
        if($language == 1){
            return json_decode(file_get_contents(asset('assets/json/english.json'),false,stream_context_create($options)), true);
        }else{
            return json_decode(file_get_contents(asset('assets/json/spanish.json'),false,stream_context_create($options)), true);
        }
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
}
