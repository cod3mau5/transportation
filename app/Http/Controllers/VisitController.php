<?php

namespace App\Http\Controllers;


use App\Models\Visit;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class VisitController extends Controller
{
    public function store(Request $request){
        // Encuentra o crea el visitante
        $visitor = Visitor::firstOrCreate([
            'visitor_id' => $request->visitor_id,
        ]);

        // Registra la visita
        $visit = new Visit;
        $visit->visitor_id = $visitor->id;
        $visit->device = $request->device;
        $visit->browser = $request->browser;
        $visit->referer = $request->referer;
        $location = Location::get($request->ip());
        // Si la ubicación no se pudo obtener, establece un valor por defecto
        if ($location && $location->countryName && $location->cityName) {
            $visit->location = $location->countryName . ', ' . $location->cityName;
        } else {
            $visit->location = 'Ubicación desconocida';
        }

        $visit->save();

        return response()->json(['success' => true]);
    }
    public function show(){
        $visits = Visit::all();
        return view('visits.index', ['visits' => $visits]);
    }
}
