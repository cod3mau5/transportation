<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

/** LOGIN */
Auth::routes();
Route::get('/home', [Controllers\HomeController::class, 'index']);

/** ############## PAGES ############## */
Route::get('/', [Controllers\PagesController::class,'homepage'])->name('homepage');
Route::get('/gallery', [Controllers\PagesController::class,'gallery'])->name('gallery');
Route::get('/contact', [Controllers\PagesController::class,'contact'])->name('contact');
Route::get('/book-now', [Controllers\PagesController::class,'booking'])->name('book-now');
Route::get('/contact-us',[Controllers\PagesController::class,'contactUs'])->name('contact-us');
Route::get('/privacy-policy',[Controllers\PagesController::class,'privacy'])->name('privacy');
Route::get('/hotel/{hotelSlug}',[Controllers\PagesController::class,'hotel'])->name('hotel');
Route::get('/tour/{tourSlug}',[Controllers\PagesController::class,'tour'])->name('tour');
Route::get('/restaurant/{restaurantSlug}',[Controllers\PagesController::class,'restaurant'])->name('restaurant');
Route::get('/foreign/{foreignSlug}',[Controllers\PagesController::class,'foreign'])->name('foreign');



# Languages
Route::get('/lang/{lang}', function ($lang) {
    session(['applocale' => $lang]);
    return redirect()->back();
});
# Languages for vue
Route::get('/languages/{language}',[Controllers\PagesController::class,'getLanguages'])->name('getLanguages');

# Posts
Route::post('/send-reservation',[Controllers\ReservationsController::class,'sendReservation'])->name('sendReservation');
Route::post('/send-mail', [Controllers\PagesController::class,'sendMail'])->name('sendMail');

# VOUCHERS
Route::get('/reservation/{voucher}/show', [Controllers\ReservationsController::class,'showReservation']);

/** ############## PANEL ############## */
Route::get('/env', [Controllers\HomeController::class, 'env'])->name('app.env');
Route::get('/reservacion/data', [Controllers\ReservacionController::class, 'anyData'])->name('reservacion.data');
Route::get('/reservacion/{reservacion}/voucher',  [Controllers\ReservacionController::class, 'voucher'])->name('reservacion.voucher');
Route::resource('/reservacion', Controllers\ReservacionController::class);

Route::get('/user/data',[Controllers\UserController::class, 'anyData'])->name('user.data');
Route::resource('user', Controllers\UserController::class,);

Route::get('/facturacion',[Controllers\FacturacionController::class, 'index'])->name('facturacion.index');
Route::get('/facturacion/previo',[Controllers\FacturacionController::class, 'prefacturacion'])->name('facturacion.prefacturacion');
Route::post('/facturacion/procesar', [Controllers\FacturacionController::class, 'procesar'])->name('facturacion.procesar');

Route::post('/reportes/guardarAsig', [Controllers\ReportesController::class, 'guardarAsig'])->name('reportes.guardar-asig');

Route::prefix('/reportes')->group(function() {
    Route::get('/', [Controllers\ReportesController::class, 'index'])->name('reporte.index');
    Route::get('llegadas', [Controllers\ReportesController::class, 'llegadas'])->name('reporte.llegadas');
    Route::get('llegadas-csv', [Controllers\ReportesController::class, 'llegadasCSV'])->name('reporte.llegadas-csv');
    Route::get('llegadas-vertical', [Controllers\ReportesController::class, 'llegadasPDFVertical'])->name('reporte.llegadas-vertical');
    Route::get('llegadas-horizontal', [Controllers\ReportesController::class, 'llegadasPDFHorizontal'])->name('reporte.llegadas-horizontal');
    Route::get('salidas',[Controllers\ReportesController::class, 'salidas'])->name('reporte.salidas');
    Route::get('salidas-csv',[Controllers\ReportesController::class, 'salidasCSV'])->name('reporte.salidas-csv');
    Route::get('salidas-vertical', [Controllers\ReportesController::class, 'salidasPDFVertical'])->name('reporte.salidas-vertical');
    Route::get('salidas-horizontal', [Controllers\ReportesController::class, 'salidasPDFHorizontal'])->name('reporte.salidas-horizontal');
    Route::get('vouchers', [Controllers\ReportesController::class, 'voucherSalidas'])->name('reporte.voucher-salidas');
    Route::get('personalizado', [Controllers\ReportesController::class, 'personalizado'])->name('reporte.personalizado');
    Route::get('personalizado-horizontal', [Controllers\ReportesController::class, 'personalizadoPDF'])->name('reporte.personalizado-horizontal');
    Route::get('reservas-facturadas', [Controllers\ReportesController::class, 'reservasFacturadas'])->name('reporte.reservas-facturadas');

});
Route::prefix('/administracion')->group(function() {
    Route::get('/', [Controllers\PanelController::class,'administracion'])->name('administracion');
    //datatable data source
    Route::get('zonas/data', [Controllers\ZonaController::class, 'anyData'])->name('zonas.data');
    Route::get('hotel/data', [Controllers\HotelController::class, 'anyData'])->name('hotel.data');
    Route::get('tours/data', [Controllers\ToursController::class, 'anyData'])->name('tours.data');
    Route::get('clase/data', [Controllers\ClaseServicioController::class, 'anyData'])->name('clase.data');
    Route::get('tipo/data',  [Controllers\TipoServicioController::class, 'anyData'])->name('tipo.data');
    Route::get('formas/data', [Controllers\FormasPagoController::class, 'anyData'])->name('formas.data');
    Route::get('moneda/data', [Controllers\MonedaPagoController::class, 'anyData'])->name('moneda.data');
    Route::get('agencia/data',[Controllers\AgenciaController::class, 'anyData'])->name('agencia.data');
    Route::get('empleado/data',[Controllers\EmpleadoController::class, 'anyData'])->name('empleado.data');
    //controllers
    Route::resource('zonas',    Controllers\ZonaController::class);
    Route::resource('hotel',    Controllers\HotelController::class);
    Route::resource('tours',    Controllers\ToursController::class);
    Route::resource('clase',    Controllers\ClaseServicioController::class);
    Route::resource('tipo',     Controllers\TipoServicioController::class);
    Route::resource('formas',   Controllers\FormasPagoController::class);
    Route::resource('moneda',   Controllers\MonedaPagoController::class);
    Route::resource('agencia',  Controllers\AgenciaController::class);
    Route::resource('empleado', Controllers\EmpleadoController::class);

});


# For test
Route::get('/form',[Controllers\PagesController::class,'form'])->name('form');


