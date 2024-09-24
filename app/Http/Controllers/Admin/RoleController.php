<?php

namespace App\Http\Controllers\Admin;

use App\Modelos\Permiso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Role;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:roles.create')->only(['create','store']);
        $this->middleware('hasPermission:roles.destroy')->only(['destroy']);
        $this->middleware('hasPermission:roles.index')->only(['index']);
        $this->middleware('hasPermission:roles.edit')->only(['update','edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::latest()->paginate();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos=Permiso::all();
        return view('admin.roles.add',compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
           'nombre' => 'required|unique:roles',
            'permisos' => 'required',

        ];
        $messages =[
            'required' => 'El campo :attribute es obligatorio.',
            'unique'=> 'El campo :attribute debe ser único. Ya existe este tipo de nombre',
            ];
        $this->validate($request, $rules, $messages);
        $validated = $request->all();
        $role=Role::create($validated);
        $role->permisos()->attach($request->permisos);
        return redirect()->route('admin.manager.roles.index')->with('success',__('cubanacan.add-content',['contenido'=>'Rol']));
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
    public function edit(Request $request,Role $role)
    {
        $permisos= Permiso::all();
        $role->permisos = $role->permisos()->get()->modelKeys();
        //dd($role);
        return view('admin.roles.edit',compact('role','permisos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $rules = [
            'nombre' => 'required',

        ];
        $messages =[
            'required' => 'El campo :attribute es obligatorio.',
        ];
        $this->validate($request, $rules, $messages);
        $validated = $request->all();
        $role->update($validated);
        $role->permisos()->detach();
        $role->permisos()->attach($request->permisos);
        return redirect()->route('admin.manager.roles.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Rol']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->route('admin.manager.roles.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Rol']));
    }
}
