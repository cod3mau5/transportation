<?php
namespace App\Http\Controllers;

use App\Models\Rate;
use Auth;
use App\Models\Zone;
use Datatables;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $submit_label = 'Agregar';
        // dd($submit_label);
        return view('zonas.index', compact('submit_label'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if (isset($request->nombre)) {
            $zona = new Zone;
            $zona->nombre = $request->nombre;
            $zona->save();
        }

        return redirect()->route('zonas.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $zona = Zone::findOrFail($id);
        $submit_label = 'Actualizar';
        // dd($zona->price);
        return view('zonas.edit', compact('zona', 'submit_label'));
    }


    public function update(Request $request, $id)
    {
        if ($request->nombre) {
            $zona = Zone::findOrFail($id);
            $zona->nombre = $request->nombre;

            $price=$zona->price;
            $price->oneway= $request->oneway;
            $price->roundtrip= $request->roundtrip;
            $price->privateoneway= $request->privateoneway;
            $price->privateroundtrip= $request->privateroundtrip;
            $price->save();
            $zona->save();
        }

        return redirect()->route('zonas.index');
    }


    public function destroy($id)
    {
        $zona = Zone::findOrFail($id);
        $zona->delete();

        return redirect()->route('zonas.index');
    }


    public function anyData()
    {
        return Datatables::of(Zone::query())
            ->addColumn('action', function ($row)
            {
                $html  = "<form class='delete-form text-right' action='".route('zonas.destroy',$row->id)."' method='post'>";
                $html .= csrf_field() . method_field('DELETE');
                $html .= "<a href='".route('zonas.edit',$row->id)."' class='btn btn-xs btn-primary actions'>";
                $html .= "<i class='glyphicon glyphicon-edit'></i> Editar</a>";
                $html .= "<button class='btn btn-xs btn-danger actions' style='margin:5px;padding:1px 5px!important;' type='button'>";
                $html .= "<i class='glyphicon glyphicon-remove'></i> Borrar</button></form>";
                return $html;
            })
            ->editColumn('name', function ($row) {
                return '<a href="'.route('zonas.edit',$row->id).'">'.$row->name.'</a>';
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }
}
