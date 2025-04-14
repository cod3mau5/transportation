<?php

namespace App\Http\Controllers;

use Datatables;


use App\Models\Unit;
use App\Models\User;
use App\Models\Resort;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ReservacionController extends Controller
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
    public function index(Request $request)
    {
        $submit_label   = 'Agregar';
        $resorts        = Resort::orderBy('name', 'asc')->pluck('name', 'id');
        $usuarios       = User::pluck('username', 'id');

        return view('reservacion.index',compact('submit_label', 'resorts', 'usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $submit_label   = 'Agregar';
        $resorts        = Resort::orderBy('name', 'asc')->pluck('name', 'id');
        $usuarios       = User::pluck('username', 'id');
        $tipos          = ['oneway'=>'One way', 'roundtrip'=>'Round-trip'];
        $pagos          = ['cash'=>'Cash', 'paypal'=>'PayPal'];
        $units          = Unit::pluck('name', 'id');
        $record         = new Reservation;

        $resorts->prepend('Los Cabos Int. Airport (SJD)', 0);

        return view('reservacion.create',  compact('submit_label', 'resorts', 'usuarios', 'record', 'units', 'tipos', 'pagos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->except(['_token', '_method']);

        $request['arrival_date'] = !empty($request['arrival_date'])
                                    ? date('Y-m-d', strtotime(str_replace('/', '-', $request['arrival_date'])))
                                    : null;

        $request['pickup_time']     = !empty($request['pickup_time']) ? date('H:i:s', strtotime($request['pickup_time'])) : null;
        $request['arrival_time']    = !empty($request['arrival_time']) ? date('H:i:s', strtotime($request['arrival_time'])) : null;
        $request['departure_time']  = !empty($request['departure_time']) ? date('H:i:s', strtotime($request['departure_time'])) : null;
        $request['departure_date']  = !empty($request['departure_date']) ? date('Y-m-d', strtotime(str_replace('/', '-', $request['departure_date']))) : null;
        $request['voucher']         = "A-".mt_rand();

        $record = new Reservation;
        $record->create($request);

        return redirect()->route('reservacion.index');
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
        $submit_label   = 'Actualizar';
        $tipos          = ['oneway'=>'One way', 'roundtrip'=>'Round-trip'];
        $pagos          = ['cash'=>'Cash', 'paypal'=>'PayPal'];
        $usuarios       = User::pluck('username', 'id');
        $units          = Unit::pluck('name', 'id');
        $record         = Reservation::findOrFail($id);
        $resorts        = Resort::orderBy('name', 'asc')->pluck('name', 'id');

        $resorts->prepend('Los Cabos Int. Airport (SJD)', 0);

        $record->arrival_date   = !empty($record->arrival_date) ? date('d/m/Y', strtotime($record->arrival_date)) : null;
        $record->departure_date = !empty($record->departure_date) ? date('d/m/Y', strtotime($record->departure_date)) : null;

        return view('reservacion.edit', compact('submit_label', 'resorts', 'usuarios', 'record', 'units', 'tipos', 'pagos'));
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
        $request = $request->except(['_token', '_method']);

        $request['pickup_time']  = !empty($request['pickup_time']) ? date('H:i:s', strtotime($request['pickup_time'])) : null;
        $request['arrival_time'] = !empty($request['arrival_time']) ? date('H:i:s', strtotime($request['arrival_time'])) : null;
        $request['departure_time'] = !empty($request['departure_time']) ? date('H:i:s', strtotime($request['departure_time'])) : null;
        $request['departure_date'] = !empty($request['departure_date']) ? date('Y-m-d', strtotime(str_replace('/', '-', $request['departure_date']))) : null;
        $request['arrival_date'] = !empty($request['arrival_date']) ? date('Y-m-d', strtotime(str_replace('/', '-', $request['arrival_date']))) : null;

        $record = Reservation::updateOrCreate(['id'=>$request['id']], $request);

        return redirect()->route('reservacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Reservation::findOrFail($id);

        $record->delete();

        return redirect()->route('reservacion.index');
    }

    // public function voucher(Reservacion $reservacion)
    // {
    //     $fechaString = " DE {$reservacion->name}";

    //     $reservas = Reservacion::with(['hotel', 'agencia'])->where('id', $reservacion->id)->get();

    //     $view = \View::make('pdf.voucher_salidas', compact('reservas', 'fechaString'))->render();
    //     $pdf = \App::make('dompdf.wrapper');
    //     $pdf->loadHTML($view);

    //     return $pdf->stream('invoice');
    // }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {

        // $model = Reservation::with(['resort'])->orderBy('id', 'desc')->get();

        $model = Reservation::with('resort')->orderBy('id', 'desc')->select('reservations.*');

        // $model = Reservation::with('resort');

        return Datatables::eloquent($model)
            ->addColumn('action', function ($row)
            {
                $html  = "<form class='delete-form text-center' action=".route('reservacion.destroy',$row->id)." method='post'>";
                $html .= csrf_field() . method_field('DELETE');
                $html .= "<a href='".route('reservacion.edit',$row->id)."' title='Editar reservación' class='btn btn-xs btn-primary actions' style='padding:1px 5px!important;'>";
                $html .= "<i class='glyphicon glyphicon-edit'></i> Editar</a>";
                if (!Auth::user()->hasRole('representante')) {
                    $html .= "<button class='btn btn-xs btn-danger actions' style='margin:5px;padding:1px 5px!important;' type='button'>";
                    $html .= "<i class='glyphicon glyphicon-remove'></i> Borrar</button></form>";
                }
                $html .= '</form>';

                // $html .= "<a href='/reservacion/{$row->id}/voucher' target='_blank' title='Imprimir voucher' class='btn btn-xs btn-default actions'>";
                // $html .= "<i class='fa fa-sticky-note-o'></i></a>";

                return $html;
            })
            // ->editColumn('resort', function ($row) {
            //     return strtoupper($row->resort->name);
            // })
            ->editColumn('voucher', function ($row) {
                return "<a href='".route('reservacion.edit',$row->id)."'>{$row->voucher}</a>";
            })
            ->editColumn('fullname', function ($row) {
                return strtoupper($row->fullname);
            })
            ->editColumn('type', function ($row) {
                return strtoupper($row->type);
            })
            ->editColumn('total', function ($row) {
                return "$ ".number_format($row->total,2);
            })
            ->rawColumns(['action', 'fullname', 'voucher'])
            ->make(true);
    }
}
