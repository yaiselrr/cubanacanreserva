<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modelos\HotelRecogida;
use Illuminate\Http\Request;
use App\Modelos\Excursiones;
use App\Http\Requests\HotelRecogidaStoreRequest;
use App\Http\Requests\HotelRecogidaUpdateRequest;

class HotelRecogidaController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:hoteles-recogida.create')->only(['create', 'store']);
        $this->middleware('hasPermission:hoteles-recogida.destroy')->only(['destroy']);
        $this->middleware('hasPermission:hoteles-recogida.index')->only(['index']);
        $this->middleware('hasPermission:hoteles-recogida.edit')->only(['update', 'edit']);
        $this->middleware('hasPermission:hoteles-recogida.index')->only(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $hotelrecogidas = HotelRecogida::join("excursiones", "excursiones.id", "=", "hotel_recogidas.excursion_id")
            ->select('hotel_recogidas.id', 'excursiones.nombre', 'hotel_recogidas.hotel', 'hotel_recogidas.created_by'
                , 'hotel_recogidas.hora')
            ->paginate();
        return view('admin.hotelesrecogidas.index', compact('hotelrecogidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $excursiones = Excursiones::all();
        return view('admin.hotelesrecogidas.add', compact('excursiones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(HotelRecogidaStoreRequest $request)
    {

        $requestData = $request->validated();

        HotelRecogida::create($requestData);

        return redirect()->route('admin.content.hotel-recogida.index')->with('success', __('cubanacan.add-content', ['contenido' => 'Hotel de Recogida']));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $excursiones = Excursiones::all();
        $hotelrecogida = HotelRecogida::findOrFail($id);

        return view('admin.hotelesrecogidas.edit', compact('hotelrecogida', 'excursiones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(HotelRecogidaUpdateRequest $request, $id)
    {

        $requestData = $request->validated();

        $hotelrecogida = HotelRecogida::findOrFail($id);
        $hotelrecogida->update($requestData);

        return redirect()->route('admin.content.hotel-recogida.index')->with('success', __('cubanacan.edit-content', ['contenido' => 'Hotel de Recogida']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        HotelRecogida::destroy($id);

        return redirect()->route('admin.content.hotel-recogida.index')->with('success', __('cubanacan.delete-content', ['contenido' => 'Hotel de Recogida']));
    }
}
