<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HotelFlexyDriveUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Hotel;
use App\Modelos\HotelTraslation;
use App\Modelos\HotelFlexyDrive;
use App\Modelos\Provincia;
use App\Http\Requests\HotelFlexyDriveStoreRequest;
use App\Http\Requests\PreciosPaxHotelUpdateRequest;

class HotelFlexyDriveController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:hoteles-flexy-drive.create')->only(['create', 'store']);
        $this->middleware('hasPermission:hoteles-flexy-drive.destroy')->only(['destroy']);
        $this->middleware('hasPermission:hoteles-flexy-drive.index')->only(['index']);
        $this->middleware('hasPermission:hoteles-flexy-drive.edit')->only(['update', 'edit']);
        $this->middleware('hasPermission:hoteles-flexy-drive.index')->only(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotelflexydrives = HotelFlexyDrive::join("hotels", "hotels.id", "=", "hotel_flexy_drives.hotel_id")
            ->join("provincias", "provincias.id", "=", "hotel_flexy_drives.provincia_id")
            ->select('hotel_flexy_drives.id as flexydriveId', 'hotels.id', 'hotel_flexy_drives.hotel_id', 'provincias.provincia'
                , 'hotel_flexy_drives.cantidad_habitaciones_dobles', 'hotel_flexy_drives.created_by', 'hotels.nombre')
            ->paginate();
        return view('admin.hotelflexydrives.index', compact('hotelflexydrives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoteles = Hotel::all();
        $provincias = Provincia::all();
        return view('admin.hotelflexydrives.add', compact('hoteles', 'provincias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelFlexyDriveStoreRequest $request)
    {
        $validated = $request->validated();
        HotelFlexyDrive::create($validated);

        return redirect()->route('admin.content.hotel-flexy-drive.index')->with('success', __('cubanacan.add-content', ['contenido' => 'Hotel de Flexy & Drive']));
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
    public function edit($id)
    {
        $hotelflexydrive = HotelFlexyDrive::find($id);
        $hoteles = Hotel::all();
        $provincias = Provincia::all();
        return view('admin.hotelflexydrives.edit', ['hotelflexydrive' => $hotelflexydrive], compact('hoteles', 'provincias'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(HotelFlexyDriveUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $hotelflexydrive = HotelFlexyDrive::find($id);
        $hotelflexydrive->update($validated);
        return redirect()->route('admin.content.hotel-flexy-drive.index')->with('success', __('cubanacan.edit-content', ['contenido' => 'Hotel de Flexy & Drive']));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HotelFlexyDrive::destroy($id);
        return redirect()->route('admin.content.hotel-flexy-drive.index')->with('success', __('cubanacan.delete-content', ['contenido' => 'Hotel de Flexy & Drive']));
    }
}
