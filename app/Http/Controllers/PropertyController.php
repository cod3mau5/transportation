<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function search(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $radius = $request->input('radius', 10); // Radio de búsqueda por defecto (10 km)

        // Lógica para buscar propiedades cercanas utilizando la fórmula de Haversine
        $properties = Property::select('id', 'title', 'description', 'latitude', 'longitude')
            ->selectRaw(
                "(6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance",
                [$latitude, $longitude, $latitude]
            )
            ->having('distance', '<=', $radius)
            ->get();

        return response()->json(['properties' => $properties]);
    }
}
