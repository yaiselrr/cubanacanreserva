<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');
Route::post('importarpri-excel', 'Admin\TarifarioPrivadoController@import');

Route::get('/home/productos/lugarescon', 'Home\TrasladoConectandoCubaController@getLugares');

Route::get('/login', 'CubanacanController@showLoginForm')->name('login');
Route::post('/login', 'CubanacanController@login');
Route::post('/logout', 'CubanacanController@logout')->name('logout');

Route::prefix('home')->namespace('Home')->name('home.')->group(function () {
Route::get('/quienes-somos', 'QuieneSomosController@index')->name('quienes-somos');
Route::get('/servicios', 'ServicioController@index')->name('servicios');
Route::get('/preguntas', 'PreguntasController@index')->name('preguntas');
Route::get('/suscribirse', 'SubscriptionController@showSubscriptionForm')->name('mostrar-suscribirce');
Route::post('/suscribirse', 'SubscriptionController@subscription')->name('suscribirse');
Route::get('/encuesta', 'EncuestaController@index')->name('index-encuesta');
Route::get('/encuesta/type_of_products', 'EncuestaController@getTypeOfProduct')->name('encuesta-type-products');
Route::post('/encuesta/save_encuesta', 'EncuestaController@save')->name('encuesta-save-encuesta');
Route::get('/contactos', 'ContactoController@index')->name('contactos');
Route::post('/contactos', 'ContactoController@sendMessage')->name('sendMessage');
Route::get('productos/hoteles', 'HotelController@index')->name('hoteles');
Route::get('productos/traslados', 'TrasladosController@index')->name('traslados');
Route::get('productos/excursiones', 'ExcursionesController@index')->name('excursiones');
Route::get('productos/excursiones/detalles-excursion/{excursion}', 'ExcursionesController@detallesExcursion')->name('detalles-excursiones');
Route::post('productos/excursiones/detalles-excursion/{excursion}', 'ExcursionesController@reservarExcursion')->name('reserva-excursion');
Route::get('productos/carrito-compras/', 'CarritoComprasController@index')->name('carrito-compras');
Route::delete('productos/carrito-compras/{carrito}', 'CarritoComprasController@eliminarCarritoCompra')->name('eliminar-carrito');
Route::get('productos/circuitos', 'CircuitosController@index')->name('circuitos');
Route::get('productos/hoteles/detalles-hotel/{hotel}', 'HotelController@detallesHotel')->name('detalles-hotel');
Route::post('productos/hoteles/detalles-hotel/{hotel}', 'HotelController@reservarHabHotel')->name('reservar-habitacion');
Route::get('/ofertas-especiales', 'OfertaEspecialController@index')->name('ofertas-especial');
Route::get('/viajes-a-la-medida', 'ViajesMedidaController@index')->name('viajes-medida');
Route::get('productos/viajes-a-la-medida/detalles-viajes-a-la-medidas/{viajes}', 'ViajesMedidaController@detalleViajeMedida')->name('detalle-viajes-medida');
Route::post('productos/viajes-a-la-medida/detalles-viajes-a-la-medidas/{viajes}', 'ViajesMedidaController@reservarViajeMedida')->name('reserva-viajes-medida');

    Route::get('productos/circuitos', 'CircuitosController@index')->name('circuitos');
    Route::get('productos/circuitos/detalles-circuito/{circuito}', 'CircuitosController@detallescircuitos')->name('detalles-circuitos');
    Route::post('productos/circuitos/detalles-circuito/{circuito}', 'CircuitosController@reservarHabCircuito')->name('reservar-circuito');

    Route::get('productos/eventos', 'EventosController@index')->name('eventos');
    Route::get('productos/eventos/{eventos}/habitaciones', 'EventosController@eventoshabitaciones')->name('eventos-habitaciones');
    Route::get('productos/eventos/detalles-evento/{evento}', 'EventosController@detalleseventos')->name('detalles-eventos');
    Route::post('productos/eventos/detalles-evento/{evento}', 'EventosController@adicionarDatosHabitacionesClientes')->name('guardar-eventos-datosclientes');

    Route::get('blogs', 'BlogController@index')->name('blogs');
    Route::get('blogs/detalles-blog/{blog}', 'BlogController@detallesblog')->name('detalles-blogs');

    //rutas conectando cuba
    Route::resource('productos/trasladosconectandocuba', 'TrasladoConectandoCubaController');
    Route::get('productos/trasladosconectandocubat', 'TrasladoConectandoCubaController@create')->name('trasladosconectandocubat');

    //rutas colectivos
    Route::resource('productos/transfercolectivo', 'TransferColectivoController');
    Route::get('productos/transfercolectivot', 'TransferColectivoController@create')->name('transfercolectivot');

    //rutas privados
    Route::resource('productos/transferprivado', 'TransferPrivadoController');
    Route::get('productos/transferprivadot', 'TransferPrivadoController@create')->name('transferprivadot');

    Route::get('productos/transfercolectivoprecio', 'TransferColectivoPrecioController@create')->name('transfercolectivoprecio');

    Route::get('productos/ofertas', 'OfertaController@index')->name('ofertas');

Route::get('productos/FlexyFlyDrive', 'FlexyFlyDriveController@index')->name('flexyflydrive');
Route::get('productos/FlexyFlyDrive/getAutos/','FlexyFlyDriveController@getAutos')->name('flexyflydrive.getAutos');
Route::get('productos/FlexyFlyDrive/getNacionalidades/','FlexyFlyDriveController@getNacionalidades')->name('flexyflydrive.getNacionalidades');
Route::get('productos/FlexyFlyDrive/getHoteles/','FlexyFlyDriveController@getHoteles')->name('flexyflydrive.getHoteles');
Route::get('productos/FlexyFlyDrive/getCantidadDisponible/{hotel}','FlexyFlyDriveController@getCantidadDisponible')->name('flexyflydrive.getCantidadDisponible');
Route::post('productos/FlexyFlyDrive/store', 'FlexyFlyDriveController@store')->name('flexyflydrive.store');
Route::post('productos/FlexyFlyDrive/getTarifa', 'FlexyFlyDriveController@getTarifa')->name('flexyflydrive.getTarifa');
Route::post('productos/FlexyFlyDrive/reservarFlexiFlyDrive', 'FlexyFlyDriveController@reservarFlexiFlyDrive')->name('flexyflydrive.reservarFlexiFlyDrive');
Route::get('productos/Payment', 'PaymentController@index')->name('payment');


    Route::post('/search', 'SearchController@search')->name('search');
    /*Route::get('/blogs', 'BlogController@notes')->name('blogs');
    Route::get('/productos', 'ProductosController@index')->name('productos');
    Route::get('/ofertas', 'OfertasController@index')->name('ofertas');
    Route::get('/survey', 'SurveyController@create')->name('survey');
    Route::get('/search', 'SearchController@index')->name('search');
    Route::post('/survey/store', 'SurveyController@store')->name('survey.store');
    Route::get('/service/{service}', 'ServicesController@index')->name('service');
    Route::post('/service/store', 'ServicesController@store')->name('service.store');
    Route::get('/info/{info}', 'GeneralInfoController@index')->name('info');
    Route::get('/atms', 'AtmControllºer@index')->name('atms');
    Route::get('/news', 'NewsController@index')->name('news');
    Route::get('/news/{news}', 'NewsController@show')->name('news.details');
    Route::get('/downloads', 'DownloadsController@index')->name('downloads');
    Route::get('/apps', 'AppsController@index')->name('apps');
    Route::get('/service/{service}/{slug}', 'ServicesController@page')->name('pages');
    Route::get( '/download/{file}/{id}', 'DownloadsController@download')->name('download');
    Route::get('/offices', 'OfficesController@index')->name('offices');
    Route::post('/contact-store', 'ContactController@store')->name('contact.store');*/
});

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', 'AdminController@index')->name('index');
    Route::name('manager.')->group(function () {
        Route::resource('/users', 'Admin\UserController',
            ['except'=>['show']]);
        Route::get('/users/password-reset/{user}/edit', 'Admin\UserController@editPassword')
            ->name('users.password-reset');
        Route::put('/users/password-reset/{user}', 'Admin\UserController@updatePassword')
            ->name('users.password-update');
        Route::resource('/roles', 'Admin\RoleController',
            ['except'=>['show']]);
    });

    Route::name('nomenclator.')->group(function () {
        Route::resource('/categorias', 'Admin\CategoriaController',
            ['except'=>['show']]);
        Route::resource('/facilidades', 'Admin\FacilidadController',
            ['except'=>['show']]);
        Route::resource('/plan-alojamiento', 'Admin\PlanAlojamientoController',
            ['except'=>['show']]);
        Route::resource('/dias-antelacion-reserva', 'Admin\DiasAntelacionController',
            ['except'=>['show']]);
        Route::resource('/idiomas', 'Admin\IdiomaController',
            ['except'=>['show']]);
        Route::resource('/duracion', 'Admin\DuracionController',
            ['except'=>['show']]);
        Route::resource('/dias-semana', 'Admin\DiasSemanaController',
            ['except'=>['show']]);
        Route::resource('/frecuencia', 'Admin\FrecuenciaController',
            ['except'=>['show']]);
        Route::resource('/lugar', 'Admin\LugarController',
            ['except'=>['show']]);
        Route::resource('/modalidad', 'Admin\ModalidadController',
            ['except'=>['show']]);
        Route::resource('/nacionalidades', 'Admin\NacionalidadController',
            ['except'=>['show']]);
        Route::resource('/provincias', 'Admin\ProvinciaController',
            ['except'=>['show']]);
    });

    Route::name('content.')->group(function () {
        Route::resource('/preguntas', 'Admin\PreguntaController',
            ['except'=>['show']]);
        Route::resource('/contactos', 'Admin\ContactoController',
            ['except'=>['show']]);
        Route::resource('/servicios', 'Admin\ServicioController',
            ['except'=>['show']]);
        Route::resource('/quienes-somos', 'Admin\QuienesSomosController',
             ['except'=>['show']]);
       Route::resource('/hoteles', 'Admin\HotelController',
           ['except'=>['show']]);
        Route::resource('/hotel-flexy-drive', 'Admin\HotelFlexyDriveController',
            ['except'=>['show']]);
        Route::resource('/hoteles-eventos', 'Admin\HotelEventoController',
            ['except'=>['show']]);
        Route::resource('/hotel-recogida', 'Admin\HotelRecogidaController',
            ['except'=>['show']]);
        Route::resource('/precios-pax-hotel', 'Admin\PreciosPaxHotelController');
        Route::resource('/tarjeta-credito', 'Admin\TarjetaCreditoController',
            ['except'=>['show']]);
         Route::resource('/autos-flexifly-drive', 'Admin\AutosFlexiFlyDriveController',
            ['except'=>['show']]);
        Route::resource('/viajes-medidas', 'Admin\ViajesMedidaController',
            ['except'=>['show']]);
        Route::resource('/precios-por-viajes-medidas', 'Admin\PreciosPorViajesMedidaController');
        Route::resource('/flexi-drive', 'Admin\FlexiDriveController',
            ['except'=>['show']]);
        Route::resource('/excursiones', 'Admin\ExcursionesController',
            ['except'=>['show']]);
        Route::resource('/encuestas', 'Admin\EncuestasController',
            ['except'=>['show']]);
        Route::get('/reservas', 'Admin\ReservasController@index')->name('reservas');
        Route::get('/reservas/detalles/{id}/{type}', 'Admin\ReservasController@show')->name('reservas-detalles');

        Route::resource('/oficinas', 'Admin\OficinaController');
        Route::resource('/buros', 'Admin\BuroController');
        Route::resource('/carruseles', 'Admin\CarruselController');
        Route::resource('/privados', 'Admin\PrivadoController');
        Route::resource('/preciosunicos', 'Admin\TransferPrecioUnicoController');
        Route::resource('/colectivos', 'Admin\ColectivoController');
        Route::resource('/conectandos', 'Admin\ConectandoCubaController');
        Route::resource('/circuitos', 'Admin\CircuitoController');
        Route::resource('/blogs', 'Admin\BlogController');
        Route::resource('/clientes', 'Admin\ClienteController');
        Route::resource('/precipaxs', 'Admin\PreciPaxController');
        Route::resource('/eventos', 'Admin\EventoController');
        Route::resource('/enlace_interesantes', 'Admin\EnlaceInteresanteController');
        Route::resource('/enlace_reds', 'Admin\EnlaceRedController');
        Route::resource('/privadosimport', 'Admin\TarifarioPrivadoController');
        Route::resource('/colectivosimport', 'Admin\TarifarioColectivoController');

        Route::resource('/rutas', 'Admin\RutaController');
        Route::resource('/lugaresrecogida', 'Admin\LugarRecogidaController');
    });

});
