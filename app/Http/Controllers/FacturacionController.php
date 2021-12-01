<?php

namespace App\Http\Controllers;

use Auth;
use App\Agencia;
use App\Reservacion;
use Illuminate\Http\Request;

class FacturacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $agencias  = Agencia::pluck('nombre', 'id');

        return view('facturacion.index', compact('agencias'));
    }

    public function prefacturacion(Request $request)
    {
        $agencias   = Agencia::pluck('nombre', 'id');
        $query      = Reservacion::with(['hotel', 'agencia']);

        if (isset($request->desde)) {
            $desde      = date('Y-m-d', strtotime(str_replace('/', '-', $request['desde'])));
            $hasta      = date('Y-m-d', strtotime(str_replace('/', '-', $request['hasta'])));

            if ($request->campo_fecha == 'ambas') {
                $where = "pago_estatus = 'pendiente' AND ((arrival_date >= '{$desde}' AND arrival_date <= '{$hasta}') OR (departure_date >= '{$desde}' AND departure_date <= '{$hasta}'))";

                if ($request->agencia_id) {
                    $where = "agencia_id = ". $request->agencia_id." AND ".$where;
                }

                $query->whereRaw($where);

            } else {
                $dateField  = ($request->campo_fecha == 'arrival') ? 'arrival_date' : 'departure_date';

                $query->where('pago_estatus', Reservacion::PENDIENTE);
                $query->where($dateField, '>=', $desde);
                $query->where($dateField, '<=', $hasta);

                if ($request->agencia_id) $query->where('agencia_id', $request->agencia_id);
            }
            $suma     = $query->sum('amount');
            $reservas = $query->get();
        }

        return view('facturacion.prefacturacion', compact('reservas', 'agencias'));
    }

    public function procesar(Request $request)
    {
        $reservaciones = array();

        if (isset($request->Reservacion)) {
            foreach ($request->Reservacion as $id => $reserva) {
                $reservaciones[] = $id;
                if ($reserva['pago_estatus'] != Reservacion::PENDIENTE) {
                    $reservacion = Reservacion::findOrFail($id);
                    $reservacion->pago_estatus = $reserva['pago_estatus'];
                    $reservacion->last_edited_user_id = Auth::id();
                    $reservacion->save();
                }
            }
        }

        $reservas = implode(',',$reservaciones);

        return redirect('/reportes/reservas-facturadas?reservas='.$reservas);
    }
}