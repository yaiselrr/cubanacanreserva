<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Modelos\Role;
use App\Modelos\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('hasPermission:users.create')->only(['create','store']);
        $this->middleware('hasPermission:users.destroy')->only(['destroy']);
        $this->middleware('hasPermission:users.index')->only(['index']);
        $this->middleware('hasPermission:users.edit')->only(['update','editPassword','updatePassword','edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::latest()->paginate();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.add', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $input = $request->validated();
        $input['password'] = bcrypt($request->password);
        if($request->hasFile('avatar')){
            $input['avatar'] = $request->avatar->store('users', 'public');
        }
        //dd($input);
        User::create($input);
        return redirect()->route('admin.manager.users.index')->with('success',__('cubanacan.add-content',['contenido'=>'Usuario']));
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
    public function edit(Request $request,User $user)
    {
        $roles=Role::all();
        return view('admin.users.edit',compact('user','roles'));
    }

    public function editPassword(Request $request,User $user)
    {
        //
        return view('admin.users.password',compact('user'));

    }

    public function updatePassword(Request $request, User $user){
        $input['password'] = bcrypt($request->password);
        $rules = [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',

        ];
        $messages =[
            'password.required' => 'El campo contraseña nueva es obligatorio.',
            'password_confirmation.required' => 'El campo confirmar contraseña nueva es obligatorio.',
            'password.confirmed'=> 'La confirmación del campo confirmar contraseña no coincide.',
        ];
        $this->validate($request, $rules, $messages);
        $user->update($input);
        return redirect()->route('admin.manager.users.index')->with('success','Contraseña editada satisfactoriamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $validated = $request->validated();
        if($request->hasFile('avatar')){
            $old_file = $user->avatar;
            $validated['avatar'] = $request->avatar->store('users', 'public');

            $user->update($validated);
            if($old_file){
                Storage::disk('public')->delete($old_file);
            }
        }
        else
        {
            $user->update($validated);
        }
        return redirect()->route('admin.manager.users.index')->with('success',__('cubanacan.edit-content',['contenido'=>'Usuario']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        Storage::disk('public')->delete($user->imagen);
        User::destroy($id);
        return redirect()->route('admin.manager.users.index')->with('success',__('cubanacan.delete-content',['contenido'=>'Usuario']));
    }
}
