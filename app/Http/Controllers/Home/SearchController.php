<?php

namespace App\Http\Controllers\Home;

use App\Helpers\CollectionHelper;
use App\Modelos\Excursiones;
use App\Modelos\Hotel;
use App\Modelos\PaginationMerger;
use App\Modelos\Provincia;
use App\Http\Controllers\Controller;

use App\Modelos\Producto;
use App\Modelos\EnlaceRed;
use App\Modelos\CarruselTraslations;
use Illuminate\Pagination\LengthAwarePaginator;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $destino = request('destino');
        $producto = request('producto');
        $fecha = request('fecha');


        //buscar por tipo de productos
        if ($producto != -1) {
            if ($destino != -1) {
                if ($fecha != null) {
                    if ($producto == 'hotel') {
                        $searchResult = Producto::where([['tipo_producto', 'hotel'], ['provincia_id', $destino]])
                            ->join("precios_pax_hotels", "productos.producto_id", "=", "precios_pax_hotels.hotel_id")
                            ->whereDate('precios_pax_hotels.fecha_inicio', '<=', $fecha)
                            ->whereDate('precios_pax_hotels.fecha_fin', '>=', $fecha)
                            ->distinct()
                            ->paginate(10);
                    } else if ($producto == 'excursion') {
                        $searchResult = Producto::where([['tipo_producto', 'excursion'], ['provincia_id', $destino]])
                            ->join("excursiones", "productos.producto_id", "=", "excursiones.id")
                            ->whereDate('excursiones.fecha_inicio', '<=', $fecha)
                            ->whereDate('excursiones.fecha_fin', '>=', $fecha)
                            ->distinct()
                            ->paginate(10);
                    } else if ($producto == 'circuito') {
                        $searchResult = Producto::where([['tipo_producto', 'circuito'], ['provincia_id', $destino]])
                            ->join("circuitos", "productos.producto_id", "=", "circuitos.id")
                            ->whereDate('circuitos.fecha_inicio', '<=', $fecha)
                            ->whereDate('circuitos.fecha_fin', '>=', $fecha)
                            ->distinct()
                            ->paginate(10);
                    } else if ($producto == 'evento') {
                        $searchResult = Producto::where([['tipo_producto', 'evento'], ['productos.provincia_id', $destino]])
                            ->join("eventos", "productos.producto_id", "=", "eventos.id")
                            ->whereDate('eventos.fecha_inicio', '<=', $fecha)
                            ->whereDate('eventos.fecha_fin', '>=', $fecha)
                            ->distinct()
                            ->paginate(10);
                    } else {
                        $searchResult = Producto::where([['tipo_producto', 'viaje'], ['productos.provincia_id', $destino]])
                            ->join("precios_por_viajes_medidas", "productos.producto_id", "=", "precios_por_viajes_medidas.viaje_medida_id")
                            ->whereDate('precios_por_viajes_medidas.fecha_inicio', '<=', $fecha)
                            ->whereDate('precios_por_viajes_medidas.fecha_fin', '>=', $fecha)
                            ->distinct()
                            ->paginate(10);
                    }
                    //dd($searchResult);
                } else {
                    $searchResult = Producto::where([['tipo_producto', $producto], ['provincia_id', $destino]])->paginate(10);
                }
            } else {
                if ($fecha != null) {
                    if ($producto == 'hotel') {
                        $searchResult = Producto::where('tipo_producto', 'hotel')
                            ->join("precios_pax_hotels", "productos.producto_id", "=", "precios_pax_hotels.hotel_id")
                            ->whereDate('precios_pax_hotels.fecha_inicio', '<=', $fecha)
                            ->whereDate('precios_pax_hotels.fecha_fin', '>=', $fecha)
                            ->distinct()
                            ->paginate(10);
                    } else if ($producto == 'excursion') {
                        $searchResult = Producto::where('tipo_producto', 'excursion')
                            ->join("excursiones", "productos.producto_id", "=", "excursiones.id")
                            ->whereDate('excursiones.fecha_inicio', '<=', $fecha)
                            ->whereDate('excursiones.fecha_fin', '>=', $fecha)
                            ->distinct()
                            ->paginate(10);
                    } else if ($producto == 'circuito') {
                        $searchResult = Producto::where('tipo_producto', 'circuito')
                            ->join("circuitos", "productos.producto_id", "=", "circuitos.id")
                            ->whereDate('circuitos.fecha_inicio', '<=', $fecha)
                            ->whereDate('circuitos.fecha_fin', '>=', $fecha)
                            ->distinct()
                            ->paginate(10);
                    } else if ($producto == 'evento') {
                        $searchResult = Producto::where('tipo_producto', 'evento')
                            ->join("eventos", "productos.producto_id", "=", "eventos.id")
                            ->whereDate('eventos.fecha_inicio', '<=', $fecha)
                            ->whereDate('eventos.fecha_fin', '>=', $fecha)
                            ->distinct()
                            ->paginate(10);
                    } else {
                        $searchResult = Producto::where('tipo_producto', 'viaje')
                            ->join("precios_por_viajes_medidas", "productos.producto_id", "=", "precios_por_viajes_medidas.viaje_medida_id")
                            ->whereDate('precios_por_viajes_medidas.fecha_inicio', '<=', $fecha)
                            ->whereDate('precios_por_viajes_medidas.fecha_fin', '>=', $fecha)
                            ->distinct()
                            ->paginate(10);
                    }
                } else {
                    $searchResult = Producto::where('tipo_producto', $producto)->paginate(10);
                }
            }

        } else {
            if ($destino != -1) {
                if ($fecha != null) {
                    $hotels = Producto::where([['tipo_producto', 'hotel'], ['provincia_id', $destino]])
                        ->join("precios_pax_hotels", "productos.producto_id", "=", "precios_pax_hotels.hotel_id")
                        ->whereDate('precios_pax_hotels.fecha_inicio', '<=', $fecha)
                        ->whereDate('precios_pax_hotels.fecha_fin', '>=', $fecha)
                        ->select('*')
                        ->distinct()->get();
                    $excursions = Producto::where([['tipo_producto', 'excursion'], ['provincia_id', $destino]])
                        ->join("excursiones", "productos.producto_id", "=", "excursiones.id")
                        ->whereDate('excursiones.fecha_inicio', '<=', $fecha)
                        ->whereDate('excursiones.fecha_fin', '>=', $fecha)
                        ->select('*')
                        ->distinct()->get();
                    $circuits = Producto::where([['tipo_producto', 'circuito'], ['provincia_id', $destino]])
                        ->join("circuitos", "productos.producto_id", "=", "circuitos.id")
                        ->whereDate('circuitos.fecha_inicio', '<=', $fecha)
                        ->whereDate('circuitos.fecha_fin', '>=', $fecha)
                        ->select('*')
                        ->distinct()->get();
                    $events = Producto::where([['tipo_producto', 'evento'], ['productos.provincia_id', $destino]])
                        ->join("eventos", "productos.producto_id", "=", "eventos.id")
                        ->whereDate('eventos.fecha_inicio', '<=', $fecha)
                        ->whereDate('eventos.fecha_fin', '>=', $fecha)
                        ->select('*')
                        ->distinct()->get();
                    $travels = Producto::where([['tipo_producto', 'viaje'], ['productos.provincia_id', $destino]])
                        ->join("precios_por_viajes_medidas", "productos.producto_id", "=", "precios_por_viajes_medidas.viaje_medida_id")
                        ->whereDate('precios_por_viajes_medidas.fecha_inicio', '<=', $fecha)
                        ->whereDate('precios_por_viajes_medidas.fecha_fin', '>=', $fecha)
                        ->distinct()->get();

                    $item = $this->concat_collections($circuits,$excursions,$travels,$events,$hotels);
                    $searchResult = CollectionHelper::paginate($item,10);
                } else {
                    $hotels = Producto::where([['tipo_producto', 'hotel'], ['provincia_id', $destino]])
                        ->distinct()->get();
                    $excursions = Producto::where([['tipo_producto', 'excursion'], ['provincia_id', $destino]])
                        ->distinct()->get();
                    $circuits = Producto::where([['tipo_producto', 'circuito'], ['provincia_id', $destino]])
                        ->distinct()->get();
                    $events = Producto::where([['tipo_producto', 'evento'], ['productos.provincia_id', $destino]])
                        ->select('*')
                        ->distinct()->get();
                    $travels = Producto::where([['tipo_producto', 'viaje'], ['productos.provincia_id', $destino]])
                        ->distinct()->get();

                    $item = $this->concat_collections($circuits,$excursions,$travels,$events,$hotels);
                    $searchResult = CollectionHelper::paginate($item,10);
                }
            } else {
                if ($fecha != null) {
                    $hotels = Producto::where('tipo_producto', 'hotel')
                        ->join("precios_pax_hotels", "productos.producto_id", "=", "precios_pax_hotels.hotel_id")
                        ->whereDate('precios_pax_hotels.fecha_inicio', '<=', $fecha)
                        ->whereDate('precios_pax_hotels.fecha_fin', '>=', $fecha)
                        ->select('*')
                        ->distinct()->get();
                    $excursions = Producto::where('tipo_producto', 'excursion')
                        ->join("excursiones", "productos.producto_id", "=", "excursiones.id")
                        ->whereDate('excursiones.fecha_inicio', '<=', $fecha)
                        ->whereDate('excursiones.fecha_fin', '>=', $fecha)
                        ->distinct()->get();
                    $circuits = Producto::where('tipo_producto', 'circuito')
                        ->join("circuitos", "productos.producto_id", "=", "circuitos.id")
                        ->whereDate('circuitos.fecha_inicio', '<=', $fecha)
                        ->whereDate('circuitos.fecha_fin', '>=', $fecha)
                        ->distinct()->get();
                    $events = Producto::where('tipo_producto', 'evento')
                        ->join("eventos", "productos.producto_id", "=", "eventos.id")
                        ->whereDate('eventos.fecha_inicio', '<=', $fecha)
                        ->whereDate('eventos.fecha_fin', '>=', $fecha)
                        ->distinct()->get();
                    $travels = Producto::where('tipo_producto', 'viaje')
                        ->join("precios_por_viajes_medidas", "productos.producto_id", "=", "precios_por_viajes_medidas.viaje_medida_id")
                        ->whereDate('precios_por_viajes_medidas.fecha_inicio', '<=', $fecha)
                        ->whereDate('precios_por_viajes_medidas.fecha_fin', '>=', $fecha)
                        ->distinct()->get();
                    $item = $this->concat_collections($circuits,$excursions,$travels,$events,$hotels);
                    $searchResult = CollectionHelper::paginate($item,10);
                } else {
                    $searchResult = Producto::paginate(10);
                }
            }
        }

        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        $enlaces = EnlaceRed::all();
        if ($carousel1) {
            $carouseles = CarruselTraslations::where('idioma', '=', 'es')
                ->where('id', '<>', $carousel1->id)->get();
        } else {
            $carouseles = null;
        }
        $destinos = Provincia::all();

        $params = ['destino' => $destino, 'producto' => $producto, 'fecha' => $fecha];
        return view('home.search_result', compact('searchResult', 'carouseles', 'carousel1', 'enlaces', 'destinos','params'));
    }

    private function concat_collections($circuits,$excursions,$travels,$events,$hotels){
        $collection = collect();

        foreach ($circuits as $circuit){
            $collection->push($circuit);
        }

        foreach ($excursions as $excursion){
            $collection->push($excursion);
        }

        foreach ($travels as $travel){
            $collection->push($travel);
        }

        foreach ($events as $event){
            $collection->push($event);
        }

        foreach ($hotels as $hotel){
            $collection->push($hotel);
        }

        return $collection;
    }
}
