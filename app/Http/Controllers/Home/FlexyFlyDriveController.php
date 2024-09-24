<?php

namespace App\Http\Controllers\Home;

use App\Modelos\Provincia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\AutosFlexiFlyDrive;
use App\Modelos\Hotel;
use Illuminate\Support\Carbon;
use App\Modelos\EnlaceRed;
use App\Modelos\Carrusel;
use App\Modelos\CarruselTraslations;
use App\Modelos\FlexiDrive;
use App\Modelos\PasajerosFlexiDrive;
use App\Modelos\ReservarFlexiDrive;
use App\Modelos\DatosCliente;
use App\Modelos\ReservarFlexiFlyDrive;
use Illuminate\Support\Facades\DB;
use App\Exceptions\Handler;
use App\Modelos\HotelFlexyDrive;
use Exception;
use App\Modelos\CarritoCompra;
use Illuminate\Support\Facades\Config;

class FlexyFlyDriveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fechaHoy = Carbon::now()->format('Y-m-d');
        $contenido= FlexiDrive::join("flexi_drive_traslations","flexi_drives.id","=","flexi_drive_traslations.flexi_drive_id")
        ->where('flexi_drive_traslations.locale', '=', 'es')
        ->select('flexi_drive_traslations.descripcion_general','flexi_drive_traslations.descripcion_autos','flexi_drive_traslations.descripcion_hoteles',
        'flexi_drives.fichero_informacion_ampliada','flexi_drives.fichero_listado_hoteles','flexi_drives.imagen')->first();
        $enlaces = EnlaceRed::all();

        $carousel1 = CarruselTraslations::where('idioma', '=', 'es')->first();
        if ($carousel1){
            $carouseles = CarruselTraslations::where('idioma', '=', 'es')
                ->where('id', '<>',$carousel1->id )->get();
        }else{
            $carouseles = null;
        }
        //  verificar si esto hace falta pues en los RF no se usan listas desplegables si no cuadros de texto , por lo tanto esto
        // es una query a la db por gusto
        $destinos = Provincia::all();
        return view('home.productosflexiflydrive', compact('contenido','enlaces','carouseles', 'carousel1','destinos'));
    }

    /*
    AJAX request
    */
    public function reservarFlexiFlyDrive(Request $request)
    {
      //  try
       // {
            $pasajerosObject=[];
            $cantidadHabitaciones=0;
            $reservaffd=ReservarFlexiFlyDrive::create([
            'fecha'=>$request->Fecha,
            'autos_flexi_fly_drives_id'=>$request->Auto_Id,
            'lugar_entrega'=>$request->LugarEntrega,
            'hora_entrega'=>$request->HoraEntrega,
            'lugar_recogida'=>$request->LugarRecogida,
            'hora_recogida'=>$request->HoraRecogida,
            'cantidad_noches'=>$request->CantidadNoches,
            'cantidad_adultos'=>$request->CantidadAdultos,
            'cantidad_ninnos'=>$request->CantidadNinnos,
            'precio_total'=>$request->PrecioTotal
            ]);
            $pasajerosModelObject=(object)$request->input("pasasjerosModel");
            foreach ($pasajerosModelObject as $pasajero) {
                $pasajeroToCreate=DatosCliente::Create([
                    'fecha_nacimiento'=>$pasajero['FechaArribo'],
                    'nacionalidad_id'=>$pasajero['Nacionalidad_Id'],
                    'numero_pasaporte'=>$pasajero['NoPasaporte'],
                    'nombre'=>$pasajero['NombreApellidos'],
                    'numero_vuelo_arribo_cuba'=>$pasajero['NoVuelo']
                ]);
                array_push($pasajerosObject,$pasajeroToCreate);
            }
            foreach ($pasajerosObject as $pasajero) {
                $itemPasajero=DatosCliente::find($pasajero['id']);
                $itemPasajero->resevar_flexi_fly_drives()->attach($reservaffd->id);
            }
            $hotelesModelObject=(object)$request->input("hotelesCantHab");
            foreach ($hotelesModelObject as $hotel) {
                $itemHotel=HotelFlexyDrive::where('hotel_id', '=',$hotel["Hotel_Id"] )->first();
                $itemHotel->reservar_flexi_drives()->attach($reservaffd->id,['cantidad_habitaciones_dobles'=>$hotel["CantidadHab"]]);
                $cantidadHabitaciones+=$hotel["CantidadHab"];
            }
            $carrito = CarritoCompra::create([
                'total_precio' => $reservaffd->precio_total,
                'nombre_producto' => 'Programa Flexi Fly Drive',
                'tipo_producto' => 'Programa Flexi Fly Drive',
                'estado' => Config::get('constants.estados.espera'),
                'reservar_flexi_drives_id' =>$reservaffd->id
            ]);
            $cart = [
                "idCarrito" => $carrito->id,
                "cantAdultos" =>  $reservaffd->cantidad_adultos,
                "cantN012" =>$reservaffd->cantidad_ninnos,
                "nombre_producto" => $carrito->nombre_producto,
                "tipo_producto" =>'Programa Flexi Fly Drive',
                "fecha" =>  $reservaffd->fecha,
                "reservar_flexi_drives_id" => $reservaffd->id,
                "auto"=>$request->Auto,
                "cantidadnoches"=>$request->CantidadNoches,
                "cantHabitaciones"=>$cantidadHabitaciones,
                "total_precio" => $reservaffd->precio_total,
                "estado" => Config::get('constants.estados.espera')

            ];
            session()->push('cart', $cart);
            $redirect = route('home.carrito-compras', ['añadido' => 1 . ' ' . 'producto']);
            return response()->json(array('isValid'=>true,'success' => 'El producto se ha añadido al Carrito de compras.', 'redirect' => $redirect));
      //  }
      //  catch(Exception $ex)
      //  {
         //   return response()->json(array('isValid'=>false,'error' => $ex));
      //  }
    }


    /*
     AJAX request
    */
    public function getTarifa(Request $request)
    {
        $tempData=explode(" ", $request->auto);
        $tempAutoData=implode(' ', $tempData);
        $autoFixed= str_replace(" ", "_",$tempAutoData);
        $optionsField="auto_".strtolower($autoFixed)."_1auto_".$request->cantHab."hab";
        $autos=DB::table('tarifario_f_f_d_s')
        ->where('noches','=',$request->cantidadNoches)
        ->select($optionsField)
        ->get()
        ->first();
        $response[] = array(
            "precioffd"=>$autos->$optionsField
        );
        echo json_encode($response);
        exit;
    }

   /*
   AJAX request
   */
   public function getAutos()
   {
        $autos=DB::table('autos_flexi_fly_drives')
        ->join("autos_flexi_fly_drive_traslations","autos_flexi_fly_drives.id","=","autos_flexi_fly_drive_traslations.autosdrive_id")
        ->where('locale','=','es')
        ->orderby('autos_flexi_fly_drive_traslations.caracteristicas')
        ->select('autos_flexi_fly_drives.id','autos_flexi_fly_drive_traslations.caracteristicas','autos_flexi_fly_drives.capacidad_pasajero')
        ->get();
        $response = array();
        foreach($autos as $auto){
                $response[] = array(
                        "id"=>$auto->id,
                        "text"=>$auto->caracteristicas,
                        "capacidad_pasajero"=>$auto->capacidad_pasajero
                );
        }
        echo json_encode($response);
        exit;
    }

    /*
   AJAX request
   */
   public function getNacionalidades()
   {
        $nacionalidades=DB::table('nacionalidads')
        ->select('nacionalidads.id','nacionalidads.nacionalidad')
        ->get();
        $response = array();
        foreach($nacionalidades as $nacionalidad){
                $response[] = array(
                        "id"=>$nacionalidad->id,
                        "text"=>$nacionalidad->nacionalidad
                );
        }
        echo json_encode($response);
        exit;
    }

    /*
   AJAX request
   */
  public function getHoteles()
  {
       $hoteles=DB::table('hotel_flexy_drives')
       ->join("hotels","hotels.id","=","hotel_flexy_drives.hotel_id")
       ->join("hotel_traslations","hotels.id","=","hotel_traslations.hotel_id")
       ->where('hotel_traslations.locale','=','es')
       ->select('hotels.id','hotels.nombre','hotel_flexy_drives.cantidad_habitaciones_dobles')
       ->get();
       $response = array();
       foreach($hoteles as $hotel){
            $response[] = array(
                    "id"=>$hotel->id,
                    "text"=>$hotel->nombre
            );
       }
       echo json_encode($response);
       exit;
   }

     /*
   AJAX request
   */
  public function getCantidadDisponible($id)
  {
       $hoteles=DB::table('hotel_flexy_drives')
       ->where('hotel_flexy_drives.hotel_id','=',$id)
       ->select('hotel_flexy_drives.cantidad_habitaciones_dobles')
       ->get();
       $response = array();
       foreach($hoteles as $hotel){
            $response[] = array(
                    "cantdobles"=>$hotel->cantidad_habitaciones_dobles
            );
       }
       echo json_encode($response);
       exit;
   }

   private function uclast($str) {
        return strrev(ucfirst(strrev($str)));
   }
}
