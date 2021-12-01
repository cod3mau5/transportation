<?php

namespace App\Http\Controllers;

use Datatables;
use App\ClaseServicio;
use Illuminate\Http\Request;

class ClaseServicioController extends Controller
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

        return view('clase.index', compact('submit_label'));
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
        $record = new ClaseServicio;

        $record->create($request->except('_token'));

        return redirect()->route('clase.index');
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

        $record = ClaseServicio::findOrFail($id);

        return view('clase.edit', compact('record', 'submit_label'));
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
        $record = ClaseServicio::updateOrCreate(
                ['id'=>$request['id']], $request->except(['_token', '_method'])
        );

        return redirect()->route('clase.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = ClaseServicio::findOrFail($id);

        $record->delete();

        return redirect()->route('clase.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(ClaseServicio::query())
            ->addColumn('action', function ($row)
            {
                $html  = "<form class='delete-form' action='/administracion/clase/{$row->id}' method='post'>";
                $html .= csrf_field() . method_field('DELETE');
                $html .= "<a href='/administracion/clase/{$row->id}/edit' class='btn btn-xs btn-primary actions'>";
                $html .= "<i class='glyphicon glyphicon-edit'></i> Editar</a>";
                $html .= "<button class='btn btn-xs btn-danger actions' type='button'>";
                $html .= "<i class='glyphicon glyphicon-remove'></i> Borrar</button></form>";
                return $html;
            })
            ->editColumn('name', function ($row) {
                return '<a href="/administracion/clase/'.$row->id.'/edit">'.$row->nombre.'</a>';
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }
}
