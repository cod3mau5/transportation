<?php

namespace App\Http\Controllers;

use Datatables;
use App\Models\TipoServicio;
use Illuminate\Http\Request;

class TipoServicioController extends Controller
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

        return view('tipo.index', compact('submit_label'));
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
        $record = new TipoServicio;

        $record->create($request->except('_token'));

        return redirect()->route('tipo.index');
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

        $record = TipoServicio::findOrFail($id);

        return view('tipo.edit', compact('record', 'submit_label'));
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
        $record = TipoServicio::updateOrCreate(
                ['id'=>$request['id']], $request->except(['_token', '_method'])
        );

        return redirect()->route('tipo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = TipoServicio::findOrFail($id);

        $record->delete();

        return redirect()->route('tipo.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(TipoServicio::query())
            ->addColumn('action', function ($row)
            {
                $html  = "<form class='delete-form' action='/administracion/tipo/{$row->id}' method='post'>";
                $html .= csrf_field() . method_field('DELETE');
                $html .= "<a href='/administracion/tipo/{$row->id}/edit' class='btn btn-xs btn-primary actions'>";
                $html .= "<i class='glyphicon glyphicon-edit'></i> Editar</a>";
                $html .= "<button class='btn btn-xs btn-danger actions' type='button'>";
                $html .= "<i class='glyphicon glyphicon-remove'></i> Borrar</button></form>";
                return $html;
            })
            ->editColumn('nombre', function ($row) {
                return '<a href="/administracion/tipo/'.$row->id.'/edit">'.$row->nombre.'</a>';
            })
            ->editColumn('tipo', function ($row) {
                $tipos = [
                    'ow'=>'One Way',
                    'rt'=>'Round Trip',
                    'os'=>'Open Service',
                    'ws'=>'One Way Salida',
                    'wh'=>'One Way Hotel'
                ];
                return $tipos[$row->tipo];
            })
            ->rawColumns(['nombre', 'action'])
            ->make(true);
    }
}
