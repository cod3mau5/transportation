<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use App\Models\Resort;
use Datatables;
use Illuminate\Http\Request;

class HotelController extends Controller
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

        $zonas = Zone::pluck(strtoupper('nombre'), 'id');

        return view('hoteles.index', compact('submit_label', 'zonas'));
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
        $record = new Resort;

        $record->create($request->except('_token'));

        return redirect()->route('hotel.index');
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
        $submit_label = 'Actualizar';

        $record = Resort::findOrFail($id);
        $zonas  = Zone::pluck(strtoupper('name'), 'id');

        return view('hoteles.edit', compact('record', 'zonas', 'submit_label'));
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
        $record = Resort::updateOrCreate(['id'=>$request['id']], $request->except(['_token', '_method']));

        return redirect()->route('hotel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Resort::findOrFail($id);

        $record->delete();

        return redirect()->route('hotel.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(Resort::query())
            ->addColumn('action', function ($row)
            {
                $html  = "<form class='delete-form' action='/administracion/hotel/{$row->id}' method='post'>";
                $html .= csrf_field() . method_field('DELETE');
                $html .= "<a href='/administracion/hotel/{$row->id}/edit' class='btn btn-xs btn-primary actions' title='Borrar'>";
                $html .= "<i class='glyphicon glyphicon-edit'></i></a>";
                $html .= "<button class='btn btn-xs btn-danger actions' type='button' title='Eliminar'>";
                $html .= "<i class='glyphicon glyphicon-remove'></i></button></form>";
                return $html;
            })
            ->editColumn('name', function ($row) {
                return '<a href="/administracion/hotel/'.$row->id.'/edit">'.$row->name.'</a>';
            })
            ->editColumn('zone', function ($row) {
                if ($row->zone && isset($row->zone->name)) {
                    return $row->zone->name;
                }
                return '-';
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }
}
