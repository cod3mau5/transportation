<?php

use Illuminate\Support\Facades\Route;
use App\Models\Resort;
use App\Models\Rate;
use App\Models\Unit;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $resort_options = '';
    $unit_options   = '';
    $vehicles = array();

    // $resorts = $wpdb->get_results('SELECT * FROM resorts ORDER BY name ASC');
    // $units   = $wpdb->get_results('SELECT * FROM units ORDER BY name ASC');
    // $rates   = $wpdb->get_results('SELECT * FROM rates ORDER BY zone_id, unit_id');

    $resorts = Resort::all()->sortBy("name");
    $units   = Unit::all()->sortBy("name");
    $rates   = Rate::all()->sortBy('zone_id');
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
    $vehicles=json_encode($vehicles);
    
    return view('welcome',compact(
        'resort_options','unit_options','vehicles',
        'resorts','units','rates','start_location',
        'end_location','passengers','date_arrival',
        'date_departure'
    ));
});

Route::get('/new', function () {

    $resort_options = '';
    $unit_options   = '';
    $vehicles = array();

    // $resorts = $wpdb->get_results('SELECT * FROM resorts ORDER BY name ASC');
    // $units   = $wpdb->get_results('SELECT * FROM units ORDER BY name ASC');
    // $rates   = $wpdb->get_results('SELECT * FROM rates ORDER BY zone_id, unit_id');

    $resorts = Resort::all()->sortBy("name");
    $units   = Unit::all()->sortBy("name");
    $rates   = Rate::all()->sortBy('zone_id');
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
});
