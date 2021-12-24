<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Resort;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('reportes.index');
    }

    public function llegadas(Request $request)
    {
        $hoteles = Resort::orderBy('name', 'asc')->pluck('name', 'id');

        if (isset($request->desde))
        {
            $fecha = explode('/', $request->desde);
            $fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];
            $reservas = Reservation::with(['resort'])->where('arrival_date', $fecha);
            if ($request->hotel_id) {
                $reservas->where('resort_id', $request->hotel_id);
            }
            $reservas = $reservas->orderBy('arrival_time')->get();
        }else{
            $fecha= Carbon::now()->format('Y-m-d');
            $reservas = Reservation::with(['resort'])->where('arrival_date', $fecha);
            $reservas = $reservas->orderBy('arrival_time')->get();
        }


        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $fecha = Carbon::parse($fecha);
        $mes = $meses[($fecha->format('n')) - 1];
        $mes=strtoupper($mes);
        $fecha = $fecha->format('d') . ' DE ' . $mes . ' DEL ' . $fecha->format('Y');

        return view('reportes.llegadas', compact('hoteles', 'reservas','fecha'));
    }

    public function llegadasPDFVertical(Request $request)
    {
        $reservas = array();

        if (isset($request->desde))
        {
            $fecha = explode('/', $request->desde);
            $fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

            $fechaString = $this->fechaString($fecha);

            $reservas = Reservacion::with(['hotel', 'agencia'])->where('arrival_date', $fecha);
            if ($request->agencia_id) {
                $reservas->where('agencia_id', $request->agencia_id);
            }
            if ($request->hotel_id) {
                $reservas->where('hotel_id', $request->hotel_id);
            }
            $reservas = $reservas->orderBy('arrival_time')->get();
        }

        $view = \View::make('pdf.llegadas_vertical', compact('reservas', 'fechaString'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream('invoice');
    }

    public function llegadasPDFHorizontal(Request $request)
    {
        $reservas = array();

        if (isset($request->desde))
        {
            $fecha = explode('/', $request->desde);
            $fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

            $fechaString = $this->fechaString($fecha);

            $reservas = Reservacion::with(['hotel', 'agencia'])->where('arrival_date', $fecha);
            if ($request->agencia_id) {
                $reservas->where('agencia_id', $request->agencia_id);
            }
            if ($request->hotel_id) {
                $reservas->where('hotel_id', $request->hotel_id);
            }
            $reservas = $reservas->orderBy('arrival_time')->get();
        }

        $view =  \View::make('pdf.llegadas_horizontal', compact('reservas', 'fechaString'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('letter', 'landscape');

        return $pdf->stream('invoice');
    }

    public function voucherSalidas(Request $request)
    {
        $reservas = array();

        if (isset($request->desde))
        {
            $fecha = explode('/', $request->desde);
            $fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

            $fechaString = $this->fechaString($fecha);

            $reservas = Reservacion::with(['hotel', 'agencia'])
                            ->where('arrival_date', $fecha)
                            ->where('tipo_servicio_id', 2);

            if ($request->agencia_id) {
                $reservas->where('agencia_id', $request->agencia_id);
            }
            if ($request->hotel_id) {
                $reservas->where('hotel_id', $request->hotel_id);
            }

            $reservas = $reservas->orderBy('departure_time')->get();
        }

        $view = \View::make('pdf.voucher_salidas', compact('reservas', 'fechaString'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream('invoice');
        // return view('pdf.voucher_salidas', compact('reservas', 'fechaString'));
    }

    public function salidas(Request $request)
    {
        $hoteles = Resort::orderBy('name', 'asc')->pluck('name', 'id');

        if (isset($request->desde))
        {
            $fecha = explode('/', $request->desde);
            $fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];
            $reservas = Reservation::with(['resort'])->where('departure_date', $fecha);
            if ($request->hotel_id) {
                $reservas->where('resort_id', $request->hotel_id);
            }
            $reservas = $reservas->orderBy('departure_time')->get();
        }else{
            $fecha= Carbon::now()->format('Y-m-d');
            $reservas = Reservation::with(['resort'])->where('departure_date', $fecha);
            $reservas = $reservas->orderBy('departure_time')->get();
        }

        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $fecha = Carbon::parse($fecha);
        $mes = $meses[($fecha->format('n')) - 1];
        $mes=strtoupper($mes);
        $fecha = $fecha->format('d') . ' DE ' . $mes . ' DEL ' . $fecha->format('Y');
        // return view('reportes.salidas', compact('hoteles', 'agencias', 'reservas'));  <-- this is old
        return view('reportes.salidas', compact('hoteles','reservas','fecha'));
    }

    public function fechaString($fecha)
    {
        $ts = strtotime($fecha);

        $dias  = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
        $meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];

        return $dias[date('N', $ts)-1]." ".date('j', $ts)." DE ".$meses[date('n', $ts)-1]." DEL ".date('Y', $ts);
    }

    public function personalizado(Request $request)
    {
        $reservas  = (isset($request->fields)) ? $this->customResults($request) : null;
        $etiquetas = $this->customReportLabels();
        $agencias  = Agencia::pluck('nombre', 'id');
        $hoteles   = Hotel::orderBy('nombre', 'asc')->pluck('nombre', 'id');

        return view('reportes.personalizado', compact('hoteles', 'agencias', 'reservas', 'etiquetas'));
    }

    public function personalizadoPDF(Request $request)
    {
        $fecha = explode('/', $request->desde);
        $desde = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

        $fecha = explode('/', $request->hasta);
        $hasta = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

        $fechaString    = "DEL ". $this->fechaString($desde). " HASTA ".$this->fechaString($hasta);
        $reservas       = (isset($request->fields)) ? $this->customResults($request) : null;
        $etiquetas      = $this->customReportLabels();

        $view = \View::make('pdf.reporte_personalizado', compact('reservas', 'etiquetas', 'fechaString'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('letter', 'landscape');

        return $pdf->stream('invoice');
    }

    public function customResults($request)
    {
        $selectedFields = array();
        $databaseFields = $this->customReportFields();

        $fields = str_replace('&', ',', str_replace('field[]=', '', $request->fields));
        $fields = explode(',', $fields);

        foreach ($fields as $field)
        {
            switch ($field)
            {
                case 'hotel':
                    $selectedFields[] = 'hoteles.nombre as hotel';
                    break;
                case 'tipoServicio':
                    $selectedFields[] = 'tipo_servicios.nombre as tipo_servicio';
                    break;
                case 'claseServicio':
                    $selectedFields[] = 'clase_servicios.nombre as clase_servicio';
                    break;
                case 'monedaPago':
                    $selectedFields[] = 'moneda_pagos.nombre as moneda_pago';
                    break;
                case 'formaPago':
                    $selectedFields[] = 'formas_pagos.nombre as forma_pago';
                    break;
                case 'agencia':
                    $selectedFields[] = 'agencias.nombre as agencia';
                    break;
                 case 'empleado':
                    $selectedFields[] = 'empleados.nombre as empleado';
                    break;

                default:
                    $selectedFields[] = $databaseFields[$field];
                    break;
            }
        }

        $dateField = ($request->campo_fecha == 'arrival') ? 'arrival' : 'departure';
        $fieldList = implode(",", $selectedFields);

        $query = DB::table('reservaciones')
                    ->leftJoin('hoteles', 'reservaciones.hotel_id', '=', 'hoteles.id')
                    ->leftJoin('tipo_servicios', 'reservaciones.tipo_servicio_id', '=', 'tipo_servicios.id')
                    ->leftJoin('clase_servicios', 'reservaciones.clase_servicio_id', '=', 'clase_servicios.id')
                    ->leftJoin('moneda_pagos', 'reservaciones.moneda_pago_id', '=', 'moneda_pagos.id')
                    ->leftJoin('formas_pagos', 'reservaciones.forma_pago_id', '=', 'formas_pagos.id')
                    ->leftJoin('agencias', 'reservaciones.agencia_id', '=', 'agencias.id')
                    ->leftJoin('empleados', 'reservaciones.empleado_id', '=', 'empleados.id');

        $query->select(DB::raw($fieldList));

        $desde = date('Y-m-d', strtotime(str_replace('/', '-', $request['desde'])));
        $query->where($dateField.'_date', '>=', $desde);

        if (isset($request->hasta)) {
            $hasta = date('Y-m-d', strtotime(str_replace('/', '-', $request['hasta'])));
            $query->where($dateField.'_date', '<=', $hasta);
        }

        // DB::enableQueryLog();

        $results = $query->get();

        // dd(DB::getQueryLog());

        return $results;
    }

    public function customReportFields()
    {
        return array(
                'hotel'             => 'hotel_id',
                'agencia'           => 'agencia_id',
                'tipoServicio'      => 'tipo_servicio_id',
                'claseServicio'     => 'clase_servicio_id',
                'name'              => 'name',
                'email'             => 'email',
                'phone'             => 'phone',
                'pax'               => 'pax',
                'arrivalDate'       => 'arrival_date',
                'arrivalFlight'     => 'arrival_flight',
                'arrivalTime'       => 'arrival_time',
                'departureDate'     => 'departure_date',
                'departureFlight'   => 'departure_flight',
                'departureTime'     => 'departure_time',
                'pickupTime'        => 'pickup_time',
                'amount'            => 'amount',
                'monedaPago'        => 'moneda_pago',
                'formaPago'         => 'forma_pago',
                'pagoEstatus'       => 'pago_estatus',
                'comments'          => 'comments',
                'specialComments'   => 'special_comments'
        );
    }

    public function customReportLabels()
    {
        return array(
                'hotel'             => 'Hotel',
                'agencia'           => 'Agencia',
                'tipo_servicio'     => 'Tipo Servicio',
                'clase_servicio'    => 'Clase Servicio',
                'name'              => 'Nombre',
                'email'             => 'E-mail',
                'phone'             => 'Telefono',
                'pax'               => 'Pax',
                'arrival_date'      => 'Arrival Date',
                'arrival_flight'    => 'Arrival Flight',
                'arrival_time'      => 'Arrival Time',
                'departure_date'    => 'Departure Date',
                'departure_flight'  => 'Departure Flight',
                'departure_time'    => 'Departure Time',
                'pickup_time'       => 'Pick-up Time',
                'amount'            => 'Total',
                'moneda_pago'       => 'Moneda',
                'forma_pago'        => 'Forma de pago',
                'pago_estatus'      => 'Estatus pago',
                'comments'          => 'Comentarios',
                'special_comments'  => 'Comentarios Especiales'
        );
    }

    public function salidasCSV(Request $request)
    {
        //fputs($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));

        $reservas = $salidas = array();

        if (isset($request->desde))
        {
            $fecha = explode('/', $request->desde);
            $fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

            $fechaString    = $this->fechaString($fecha);
            $reservas       = Reservation::with(['resort'])->where('departure_date', $fecha);

            if ($request->hotel_id) {
                $reservas->where('resort_id', $request->hotel_id);
            }

            $reservas = $reservas->orderBy('departure_time')->get()->toArray();
        }else{
            $fecha= Carbon::now()->format('Y-m-d');
            $reservas = Reservation::with(['resort'])->where('departure_date', $fecha);
            $reservas = $reservas->orderBy('departure_time')->get();
        }

        $salidas[] = [
                        'VOUCHER',
                        'TIPO',
                        'FECHA',
                        'HORA',
                        'AEROLINEA',
                        'VUELO',
                        'PICK UP',
                        'PAX',
                        'HOTEL',
                        'NOMBRE',
                        'EMAIL',
                        'PHONE',
                        'COMENTARIOS',
                        'SHOPPING STOP'
                    ];

        foreach ($reservas as $row)
        {
            $salidas[] = [
                            $row['voucher'],
                            strtoupper($row['type']),
                            $row['departure_date'],
                            $row['departure_time'],
                            $row['departure_airline'],
                            $row['departure_flight'],
                            $row['pickup_time'],
                            $row['passengers'],
                            strtoupper($row['resort']['name']),
                            strtoupper($row['fullname']),
                            $row['email'],
                            $row['phone'],
                            $row['comments'],
                            ($row['shopping_stop']) ? 'SI' : 'NO'
                        ];
        }


        $this::sendReportCSV('salidas_'.$fecha, $salidas);
    }

    public function llegadasCSV(Request $request)
    {
        $reservas = $llegadas = array();

        if (isset($request->desde))
        {
            $fecha = explode('/', $request->desde);
            $fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

            $fechaString = $this->fechaString($fecha);
            $reservas    = Reservation::with(['resort'])->where('arrival_date', $fecha);

            if ($request->resort_id) {
                $reservas->where('resort_id', $request->resort_id);
            }

            $reservas = $reservas->orderBy('arrival_time')->get()->toArray();
        }else{
            $fecha= Carbon::now()->format('Y-m-d');
            $reservas = Reservation::with(['resort'])->where('arrival_date', $fecha);
            $reservas = $reservas->orderBy('arrival_time')->get();
        }

        $llegadas[] = [
                        'VOUCHER',
                        'TIPO',
                        'FECHA',
                        'HORA',
                        'AEROLINEA',
                        'VUELO',
                        'PAX',
                        'HOTEL',
                        'NOMBRE',
                        'EMAIL',
                        'PHONE',
                        'SALIDA',
                        'COMENTARIOS',
                        'SHOPPING STOP'
                    ];

        foreach ($reservas as $row)
        {
            $resortName=!empty($row['resort']['name']) ? $row['resort']['name'] : 'hotel eliminado';
            $llegadas[] = [
                            $row['voucher'],
                            strtoupper($row['type']),
                            $row['arrival_date'],
                            $row['arrival_time'],
                            $row['arrival_airline'],
                            $row['arrival_flight'],
                            $row['passengers'],
                            $resortName,
                            strtoupper($row['fullname']),
                            $row['email'],
                            $row['phone'],
                            ($row['departure_date'] == '0000-00-00') ? '' : $row['departure_date'],
                            $row['comments'],
                            ($row['shopping_stop']) ? 'SI' : 'NO'
                        ];
        }

        $this::sendReportCSV('llegadas_'.$fecha, $llegadas);
    }

    public function sendReportCSV($csv_filename, $data_array)
    {
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Content-type'        => 'text/csv',
            'Content-disposition' => 'attachment; filename='.$csv_filename.'.csv',
            'Expires'             => '0',
            'Pragma'              => 'public'
        ];

        $callback = function() use ($data_array)
        {
            $FH = fopen('php://output', 'w');
            foreach ($data_array as $row) {
                fputcsv($FH, $row);
            }
            fclose($FH);
        };

        $response = new StreamedResponse($callback, 200, $headers);

        $response->send();
    }
}