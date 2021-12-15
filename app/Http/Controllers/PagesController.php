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
    public function home(){
        return view('pages.home');
    }
    public function contactUs(){
        return view('pages.contact');
    }
    public function gallery(){
        return view('pages.gallery');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function booking(){
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
        return view('pages.booking',compact(
            'resort_options','unit_options','vehicles',
            'resorts','units','rates','start_location',
            'end_location','passengers','date_arrival',
            'date_departure'
        ));
    }
    public function sendMail(Request $request){
        Mail::to($request->email)->send(new sendMail($request));
        return back();
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
