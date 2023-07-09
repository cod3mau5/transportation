<?php

namespace App\Http\Controllers;

use Datatables;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\TourImg;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ToursController extends Controller
{

    public function index()
    {
        $submit_label = 'Agregar tour';

        $tours = Tour::pluck(strtoupper('name'), 'id');

        return view('tours.index', compact('submit_label', 'tours'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $record = new Tour;
        $record->fill($request->except('_token'));
        $record->save();
        // dd($record);

        // Carga de imágenes
        if ($request->hasFile('images')) {
            $this->uploadImages($request->file('images'), $record);
        }

        return redirect()->route('tours.index');
    }


    public function edit(string $id)
    {
        $submit_label = 'Actualizar tour';

        $record = Tour::findOrFail($id);

        return view('tours.edit', compact('record', 'submit_label'));
    }


    public function update(Request $request, string $id)
    {
        $imgIds_to_delete = $request->input('eliminar');
        if($imgIds_to_delete){
            foreach($imgIds_to_delete as $img_id) {
                $image = TourImg::findOrFail($img_id);
                Storage::disk('public')->delete($image->path);
                // // si no funciona el sistema de archivos de laravel usar esto
                // if (file_exists(base_path('public_html/'.$image->path))) {
                //     unlink(base_path('public_html/'.$image->path));
                // }
                $image->delete();
            }
        }
            $record = Tour::findOrFail($id);
            $record->fill($request->except(['_token', '_method', 'cover', 'eliminar', 'images']));

            // Código para establecer la imagen de portada
            $coverImage = TourImg::find($request->input('cover'));
            if ($coverImage && $coverImage->category !== 'cover') {
                // Primero, quita la categoría 'cover' de cualquier otra imagen del mismo hotel
                TourImg::where('tour_id', $record->id)->where('category', 'cover')->update(['category' => null]);

                // Luego, establece la imagen seleccionada como portada
                $coverImage->category = 'cover';
                $coverImage->save();
            }

            $record->save();

            // Carga de imágenes
            if ($request->hasFile('images')) {
                $this->uploadImages($request->file('images'), $record);
            }

            return redirect()->route('tours.edit',$record->id);
    }


    public function destroy(string $id)
    {
        $record = Tour::findOrFail($id);

        $record->delete();

        return redirect()->route('tours.index');
    }

    public function anyData()
    {
        return Datatables::of(Tour::query())
            ->addColumn('action', function ($row)
            {
                $html  = "<form class='delete-form' action='".route('tours.destroy',$row->id)."' method='POST'>";
                $html .= csrf_field() . method_field('DELETE');
                $html .= "<a href='".route('tours.edit',$row->id)."' class='btn btn-xs btn-primary actions' title='Editar'>";
                $html .= "<i class='glyphicon glyphicon-edit'></i></a>";
                $html .= "<button class='btn btn-xs btn-danger actions' type='button' title='Eliminar'>";
                $html .= "<i class='glyphicon glyphicon-remove'></i></button></form>";
                return $html;
            })
            ->editColumn('name', function ($row) {
                return '<a href="'.route('tours.edit',$row->id).'">'.$row->name.'</a>';
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }

    protected function uploadImages($images, $hotel)
    {
        $basePath = base_path('public_html/assets/images/tours_images/') . Str::slug($hotel->name);
        $publicImgPath='assets/images/tours_images/' . Str::slug($hotel->name);
        Storage::disk('public')->makeDirectory($basePath);

        foreach ($images as $image) {
            $imageName = Str::slug($hotel->name) . '_' . uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $image->move($basePath, $imageName);

            $resortImage = new TourImg();
            $resortImage->path = $publicImgPath . '/' . $imageName;
            $resortImage->name=$imageName;
            $hotel->images()->save($resortImage);
        }
    }
}
