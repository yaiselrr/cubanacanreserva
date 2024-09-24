<?php

namespace App\Http\Controllers\Admin;

use App\Modelos\PlanAlojamiento;
use App\Modelos\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Hotel;
use App\Modelos\HotelTraslation;
use App\Modelos\Facilidad;
use App\Modelos\Provincia;
use App\Modelos\Categoria;
use App\Modelos\DiasAntelacionReserva;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\HotelUpdateRequest;
use App\Http\Requests\HotelStoreRequest;

class HotelController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:hoteles.create')->only(['create', 'store']);
        $this->middleware('hasPermission:hoteles.destroy')->only(['destroy']);
        $this->middleware('hasPermission:hoteles.index')->only(['index']);
        $this->middleware('hasPermission:hoteles.edit')->only(['update', 'edit']);
        $this->middleware('hasPermission:precios-pax-hotels.index')->only(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoteles = Hotel::join("hotel_traslations", "hotels.id", "=", "hotel_traslations.hotel_id")
            ->where('hotel_traslations.locale', '=', 'es')
            ->join("categorias", "categorias.id", "=", "hotels.categoria_id")
            ->join("categoria_traslations", "categoria_traslations.categoria_id", "=", "hotels.categoria_id")
            ->where('categoria_traslations.locale', '=', 'es')
            ->select('hotels.id', 'categoria_traslations.categoria', 'hotels.categoria_id', 'hotels.precio_desde', 'hotel_traslations.direccion', 'hotels.nombre', 'hotels.created_by')
            ->paginate();
        return view('admin.hoteles.index', compact('hoteles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ofertaespeciales = [
            ['value' => 'Activo', 'oferta' => 'Activo'],
            ['value' => 'Inactivo', 'oferta' => 'Inactivo'],
        ];

        $estados = [
            ['value' => 'Activo', 'estado' => 'Activo'],
            ['value' => 'Inactivo', 'estado' => 'Inactivo'],
        ];
        $provincias = Provincia::all();
        $facilidades = Facilidad::join("facilidad_traslations", "facilidads.id", "=", "facilidad_traslations.facilidad_id")
            ->where('locale', '=', 'es')
            ->select('facilidads.id', 'facilidad_traslations.facilidad', 'facilidad_traslations.facilidad_id')->get();
        $categorias = Categoria::join("categoria_traslations", "categorias.id", "=", "categoria_traslations.categoria_id")
            ->where('locale', '=', 'es')
            ->select('categorias.id', 'categoria_traslations.categoria', 'categoria_traslations.categoria_id')->get();
        $diasantelacionreservas = DiasAntelacionReserva::all();
        $planalojamientos = PlanAlojamiento::all();
        return view('admin.hoteles.add', compact('ofertaespeciales', 'provincias'
            , 'facilidades', 'categorias', 'planalojamientos', 'estados', 'diasantelacionreservas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelStoreRequest $request)
    {
        $validated = $request->validated();

        $facilidades = $request->input('facilidades_ids');
        $facilidades = implode(',', $facilidades);
        $input = $request->except('facilidades_ids');
        $input['facilidades_ids'] = $facilidades;
        $validated['facilidades_ids'] = $input['facilidades_ids'];

        $planalojamientos = implode(',', $request->input('plan_alojamiento_id'));
        $validated['plan_alojamiento_id'] = $planalojamientos;

        if ($request->hasFile('imagen')) {
            foreach ($request->file('imagen') as $item) {
                $item->store('hoteles', 'public');
                $imageneshas[] = 'hoteles/' . $item->hashName();
                $validated['imagen'] = implode(',', $imageneshas);
            }

        }
        $hotel = Hotel::create($validated);

        //guardar en tabla producto
        Producto::create([
            'producto_id' => $hotel->id,
            'tipo_producto' => 'hotel',
            'oferta_especial' => ($validated['oferta_especial'] == 'Activo') ? 1 : 0,
            'provincia_id' => $hotel->provincia_id
        ]);
        $locales = array('es', 'en', 'fr', 'de', 'it', 'pt');
        foreach ($locales as $value) {
            $direccion = 'direccion_' . $value;
            $descripcion = 'descripcion_' . $value;

            HotelTraslation::create(
                [
                    'direccion' => $request->$direccion,
                    'descripcion' => $request->$descripcion,
                    'hotel_id' => $hotel->id,
                    'locale' => $value
                ]
            );

        }
        return redirect()->route('admin.content.hoteles.index')->with('success', __('cubanacan.add-content', ['contenido' => 'Hotel']));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $ofertaespeciales = [
            ['value' => 'Activo', 'oferta' => 'Activo'],
            ['value' => 'Inactivo', 'oferta' => 'Inactivo'],
        ];

        $estados = [
            ['value' => 'Activo', 'estado' => 'Activo'],
            ['value' => 'Inactivo', 'estado' => 'Inactivo'],
        ];
        $provincias = Provincia::all();
        $categorias = Categoria::join("categoria_traslations", "categorias.id", "=", "categoria_traslations.categoria_id")
            ->where('locale', '=', 'es')
            ->select('categorias.id', 'categoria_traslations.categoria', 'categoria_traslations.categoria_id')->get();
        $planalojamientos = PlanAlojamiento::all();
        $diasantelacionreservas = DiasAntelacionReserva::all();

        $facilidades = Facilidad::join("facilidad_traslations", "facilidads.id", "=", "facilidad_traslations.facilidad_id")
            ->where('locale', '=', 'es')
            ->select('facilidads.id', 'facilidad_traslations.facilidad', 'facilidad_traslations.facilidad_id')->get();
        $hotel = Hotel::find($id);
        $hotelestraslation = HotelTraslation::where('hotel_id', $hotel->id)->get();
        $data = array();
        foreach ($hotelestraslation as $item) {
            if ($item['locale'] == 'es') {
                $data['direccion_es'] = $item['direccion'];
                $data['descripcion_es'] = $item['descripcion'];
            }
            if ($item['locale'] == 'en') {
                $data['direccion_en'] = $item['direccion'];
                $data['descripcion_en'] = $item['descripcion'];
            }
            if ($item['locale'] == 'fr') {
                $data['direccion_fr'] = $item['direccion'];
                $data['descripcion_fr'] = $item['descripcion'];
            }
            if ($item['locale'] == 'de') {
                $data ['direccion_de'] = $item['direccion'];
                $data['descripcion_de'] = $item['descripcion'];
            }
            if ($item['locale'] == 'it') {
                $data ['direccion_it'] = $item['direccion'];
                $data['descripcion_it'] = $item['descripcion'];
            }
            if ($item['locale'] == 'pt') {
                $data ['direccion_pt'] = $item['direccion'];
                $data['descripcion_pt'] = $item['descripcion'];
            }
        }

        return view('admin.hoteles.edit', ['hotel' => $hotel], compact('ofertaespeciales', 'provincias'
            , 'facilidades', 'categorias', 'planalojamientos', 'estados', 'diasantelacionreservas', 'data'));//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(HotelUpdateRequest $request, $id)
    {
        $validated = $request->validated();

        $facilidades = $request->input('facilidades_ids');
        $facilidades = implode(',', $facilidades);
        $input = $request->except('facilidades_ids');
        $input['facilidades_ids'] = $facilidades;
        $validated['facilidades_ids'] = $input['facilidades_ids'];

        $planalojamientos = implode(',', $request->input('plan_alojamiento_id'));
        $validated['plan_alojamiento_id'] = $planalojamientos;

        $hotel = Hotel::find($id);

        //modificar en tabla producto
        $producto = Producto::where([['producto_id', $id],['tipo_producto','hotel']])->first();
        if ($producto) {
            $producto->oferta_especial = ($validated['oferta_especial'] == 'Activo') ? 1 : 0;
            $producto->provincia_id = $hotel->provincia_id;
            $producto->save();
        } else {
            Producto::create([
                'producto_id' => $hotel->id,
                'tipo_producto' => 'hotel',
                'oferta_especial' => ($validated['oferta_especial'] == 'Activo') ? 1 : 0,
                'provincia_id' => $hotel->provincia_id
            ]);
        }
        if ($request->hasFile('imagen')) {
            $old_file[] = explode(',', $hotel->imagen);
            foreach ($request->file('imagen') as $item) {
                $item->store('hoteles', 'public');
                $imageneshas[] = 'hoteles/' . $item->hashName();
                $validated['imagen'] = implode(',', $imageneshas);
            }
            foreach ($old_file as $item) {
                Storage::disk('public')->delete($item);
            }
            $hotel->update($validated);
        } else {
            $hotel->update($validated);
        }

        $hotelestraslation = HotelTraslation::where('hotel_id', $hotel->id)->get();
        foreach ($hotelestraslation as $item) {
            $direccion = 'direccion_' . $item['locale'];
            $descripcion = 'descripcion_' . $item['locale'];
            $item->update([
                'direccion' => $request->$direccion,
                'descripcion' => $request->$descripcion
            ]);
        }
        return redirect()->route('admin.content.hoteles.index')->with('success', __('cubanacan.edit-content', ['contenido' => 'Hotel']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        foreach (explode(',', $hotel->imagen) as $item) {
            Storage::disk('public')->delete($item);
        }
        Hotel::destroy($id);
        return redirect()->route('admin.content.hoteles.index')->with('success', __('cubanacan.delete-content', ['contenido' => 'Hotel']));
    }
}
