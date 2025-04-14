<?php

namespace App\Http\Controllers;

use Datatables;
use App\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
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

        return view('empleado.index', compact('submit_label'));
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
        $record = new Empleado;

        $request = $request->except('_token');

        $request['licencia_exp']      = date('Y-m-d', strtotime(str_replace('/', '-', $request['licencia_exp'])));
        $request['cert_medico_fecha'] = date('Y-m-d', strtotime(str_replace('/', '-', $request['cert_medico_fecha'])));
        $request['cert_medico_exp']   = date('Y-m-d', strtotime(str_replace('/', '-', $request['cert_medico_exp'])));

        $record->create($request);

        return redirect()->route('empleado.index');
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

        $record = Empleado::findOrFail($id);

        $fecha = str_replace('-', '/', $record->licencia_exp);
        $record->licencia_exp = date('d/m/Y', strtotime($fecha));

        $record->cert_medico_fecha  = date('d/m/Y', strtotime(str_replace('-', '/', $record->cert_medico_fecha)));
        $record->cert_medico_exp    = date('d/m/Y', strtotime(str_replace('-', '/', $record->cert_medico_exp)));

        return view('empleado.edit', compact('record', 'submit_label'));
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
        $datos  = $request->except(['_token', '_method']);

        $fecha  = str_replace('/', '-', $datos['licencia_exp']);

        $datos['licencia_exp']      = date('Y-m-d', strtotime(str_replace('/', '-', $datos['licencia_exp'])));
        $datos['cert_medico_fecha'] = date('Y-m-d', strtotime(str_replace('/', '-', $datos['cert_medico_fecha'])));
        $datos['cert_medico_exp']   = date('Y-m-d', strtotime(str_replace('/', '-', $datos['cert_medico_exp'])));

        $record = Empleado::updateOrCreate(['id'=>$request['id']], $datos);

        return redirect()->route('empleado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Empleado::findOrFail($id);

        $record->delete();

        return redirect()->route('empleado.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(Empleado::query())
            ->addColumn('action', function ($row)
            {
                $html  = "<form class='delete-form text-right' action='/administracion/empleado/{$row->id}' method='post'>";
                $html .= csrf_field() . method_field('DELETE');
                $html .= "<a href='/administracion/empleado/{$row->id}/edit' class='btn btn-xs btn-primary actions'>";
                $html .= "<i class='glyphicon glyphicon-edit'></i> Editar</a>";
                $html .= "<button class='btn btn-xs btn-danger actions' style='margin:5px;padding:1px 5px!important;' type='button'>";
                $html .= "<i class='glyphicon glyphicon-remove'></i> Borrar</button></form>";
                return $html;
            })
            ->editColumn('nombre', function ($row) {
                return '<a href="/administracion/empleado/'.$row->id.'/edit">'.$row->nombre.'</a>';
            })
            ->rawColumns(['nombre', 'action'])
            ->make(true);
    }
}
