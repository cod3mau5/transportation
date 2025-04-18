<?php

namespace App\Http\Controllers;

use Datatables;
use App\MonedaPago;
use Illuminate\Http\Request;

class MonedaPagoController extends Controller
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

        return view('moneda.index', compact('submit_label'));
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
        $record = new MonedaPago;

        $record->create($request->except('_token'));

        return redirect()->route('moneda.index');
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

        $record = MonedaPago::findOrFail($id);

        return view('moneda.edit', compact('record', 'submit_label'));
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
        $record = MonedaPago::updateOrCreate(
                ['id'=>$request['id']], $request->except(['_token', '_method'])
        );

        return redirect()->route('moneda.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = MonedaPago::findOrFail($id);

        $record->delete();

        return redirect()->route('moneda.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(MonedaPago::query())
            ->addColumn('action', function ($row)
            {
                $html  = "<form class='delete-form text-right' action='/administracion/moneda/{$row->id}' method='post'>";
                $html .= csrf_field() . method_field('DELETE');
                $html .= "<a href='/administracion/moneda/{$row->id}/edit' class='btn btn-xs btn-primary actions'>";
                $html .= "<i class='glyphicon glyphicon-edit'></i> Editar</a>";
                $html .= "<button class='btn btn-xs btn-danger actions' style='margin:5px;padding:1px 5px!important;' type='button'>";
                $html .= "<i class='glyphicon glyphicon-remove'></i> Borrar</button></form>";
                return $html;
            })
            ->editColumn('nombre', function ($row) {
                return '<a href="/administracion/moneda/'.$row->id.'/edit">'.$row->nombre.'</a>';
            })
            ->rawColumns(['nombre', 'action'])
            ->make(true);
    }
}
