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

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $submit_label = 'Agregar';
        // dd($submit_label);
        return view('zonas.index', compact('submit_label'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->nombre)) {
            $zona = new Zone;
            $zona->nombre = $request->nombre;
            $zona->save();
        }

        return redirect()->route('zonas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zona = Zone::findOrFail($id);
        $submit_label = 'Actualizar';
        // dd($zona->price);
        return view('zonas.edit', compact('zona', 'submit_label'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zona = Zone::findOrFail($id);
        $zona->delete();

        return redirect()->route('zonas.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(Zone::query())
            ->addColumn('action', function ($row)
            {
                $html  = "<form class='delete-form' action='/administracion/zonas/{$row->id}' method='post'>";
                $html .= csrf_field() . method_field('DELETE');
                $html .= "<a href='/administracion/zonas/{$row->id}/edit' class='btn btn-xs btn-primary actions'>";
                $html .= "<i class='glyphicon glyphicon-edit'></i> Editar</a>";
                $html .= "<button class='btn btn-xs btn-danger actions' type='button'>";
                $html .= "<i class='glyphicon glyphicon-remove'></i> Borrar</button></form>";
                return $html;
            })
            ->editColumn('name', function ($row) {
                return '<a href="/administracion/zonas/'.$row->id.'/edit">'.$row->name.'</a>';
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }
}
