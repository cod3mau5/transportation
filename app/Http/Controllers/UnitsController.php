<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submit_label = 'Agregar unidad';

        $units = Unit::pluck(strtoupper('name'), 'id');

        return view('units.index', compact('submit_label', 'units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (isset($request->nombre)) {
            $unit = new Unit;
            $unit->nombre = $request->nombre;
            $unit->save();
        }

        return redirect()->route('units.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unit = Unit::findOrFail($id);
        $submit_label = 'Actualizar';
        return view('units.edit', compact('unit', 'submit_label'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->name) {
            $unit = Unit::findOrFail($id);
            $unit->name = $request->name;
            $unit->capacity = $request->capacity;
            $unit->capacidad = $request->capacity;


            $unit->save();
        }

        return redirect()->route('units.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = Unit::findOrFail($id);

        $record->delete();

        return redirect()->route('units.index');
    }

    public function anyData()
    {
        return Datatables::of(Unit::query())
            ->addColumn('action', function ($row)
            {
                $html  = "<form class='delete-form text-right' action='".route('units.destroy',$row->id)."' method='POST'>";
                $html .= csrf_field() . method_field('DELETE');
                $html .= "<a href='".route('units.edit',$row->id)."' class='btn btn-xs btn-primary actions' style='padding:1px 5px!important;' title='Editar'>";
                $html .= "<i class='glyphicon glyphicon-edit'></i> Editar</a>";
                $html .= "<button class='btn btn-xs btn-danger actions' style='margin:5px;padding:1px 5px!important;' type='button'>";
                $html .= "<i class='glyphicon glyphicon-remove'></i> Borrar</button></form>";
                return $html;
            })
            ->editColumn('name', function ($row) {
                return '<a href="'.route('units.edit',$row->id).'">'.$row->name.'</a>';
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }
}
