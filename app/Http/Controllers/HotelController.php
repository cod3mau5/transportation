<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\Zone;
use App\Models\Resort;
use Illuminate\Http\File;
use App\Models\ResortImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $submit_label = 'Agregar';

        $zonas = Zone::pluck(strtoupper('nombre'), 'id');

        return view('hoteles.index', compact('submit_label', 'zonas'));
    }


    public function store(Request $request)
    {
        $record = new Resort;
        $record->create($request->except('_token'));

        // Carga de imágenes
        if ($request->hasFile('images')) {
            $this->uploadImages($request->file('images'), $record);
        }

        return redirect()->route('hotel.index');
    }


    public function edit($id)
    {
        $submit_label = 'Actualizar';

        $record = Resort::findOrFail($id);

        $zonas  = Zone::pluck(strtoupper('name'), 'id');

        return view('hoteles.edit', compact('record', 'zonas', 'submit_label'));
    }


    public function update(Request $request, $id)
    {
        $imgIds_to_delete = $request->input('eliminar');
        if($imgIds_to_delete){
            foreach($imgIds_to_delete as $img_id) {
                $image = ResortImage::findOrFail($img_id);
                Storage::disk('public')->delete($image->path);
                // // si no funciona el sistema de archivos de laravel usar esto
                // if (file_exists(base_path('public_html/'.$image->path))) {
                //     unlink(base_path('public_html/'.$image->path));
                // }
                $image->delete();
            }
        }
        $record = Resort::findOrFail($id);
        $record->fill($request->except(['_token', '_method', 'cover', 'eliminar', 'images']));

        // Código para establecer la imagen de portada
        $coverImage = ResortImage::find($request->input('cover'));
        if ($coverImage && $coverImage->category !== 'cover') {
            // Primero, quita la categoría 'cover' de cualquier otra imagen del mismo hotel
            ResortImage::where('resort_id', $record->id)->where('category', 'cover')->update(['category' => null]);

            // Luego, establece la imagen seleccionada como portada
            $coverImage->category = 'cover';
            $coverImage->save();
        }

        $record->save();

        // Carga de imágenes
        if ($request->hasFile('images')) {
            $this->uploadImages($request->file('images'), $record);
        }

        return redirect()->route('hotel.edit',$record->id);
    }



    public function destroy($id)
    {
        $record = Resort::findOrFail($id);

        $record->delete();

        return redirect()->route('hotel.index');
    }

    protected function uploadImages($images, $hotel)
    {
        $basePath = base_path('public_html/assets/images/resort_images/') . Str::slug($hotel->name);
        $publicImgPath='assets/images/resort_images/' . Str::slug($hotel->name);
        Storage::disk('public')->makeDirectory($basePath);

        foreach ($images as $image) {
            $imageName = Str::slug($hotel->name) . '_' . uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $image->move($basePath, $imageName);

            $resortImage = new ResortImage();
            $resortImage->path = $publicImgPath . '/' . $imageName;
            $resortImage->name=$imageName;
            $hotel->images()->save($resortImage);
        }
    }

    public function anyData()
    {
        return Datatables::of(Resort::query())
            ->addColumn('action', function ($row)
            {
                $html  = "<form class='delete-form' action='".route('hotel.destroy',$row->id)."' method='POST'>";
                $html .= csrf_field() . method_field('DELETE');
                $html .= "<a href='".route('hotel.edit',$row->id)."' class='btn btn-xs btn-primary actions' title='Editar'>";
                $html .= "<i class='glyphicon glyphicon-edit'></i></a>";
                $html .= "<button class='btn btn-xs btn-danger actions' type='button' title='Eliminar'>";
                $html .= "<i class='glyphicon glyphicon-remove'></i></button></form>";
                return $html;
            })
            ->editColumn('name', function ($row) {
                return '<a href="'.route('hotel.edit',$row->id).'">'.$row->name.'</a>';
            })
            ->editColumn('zone', function ($row) {
                if ($row->zone && isset($row->zone->nombre)) {
                    return $row->zone->nombre;
                }
                return '-';
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }

}
