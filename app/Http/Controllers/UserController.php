<?php

namespace AizaBoutique\Http\Controllers;

use AizaBoutique\Http\Requests\UserRequest;
use AizaBoutique\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use AizaBoutique\User as User2;
use Image;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('permission:user.index')->only('index');
        $this->middleware('permission:user.edit')->only(['edit','update']);
        $this->middleware('permission:user.show')->only('show');
        $this->middleware('permission:user.destory')->only('destory');
        $this->middleware('permission:user.miperfil')->only('miperfil');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Consultamos la base de datos y mostramos los datos en la pagina index
        $user = User::all();
        return view('pages.usuarios.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Para registrar nuevo Usuario accedemos por el controlador de registrar del metodo auth de laravel.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Para registrar nuevo Usuario accedemos por el controlador de registrar del metodo auth de laravel.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Consultamos la tabla de roles en la base de datos y mostramos los datos en la pagina show de los usuarios
        $role = Role::get();
        /*Consultamos la categoria por el parametro id y nos muestra la vista, findOrFail nos devuelve un error
        cuando el usuario intenta buscar un id en la url que no existe en la DB*/
        $user = User::findOrFail($id);
        //Redireccionamos al a vista
        return view('pages.usuarios.show', compact('user', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //El mismo metodo de parametro show pero redireccionamos a la vista edit
        $users = User::findOrFail($id);
        //Consultamos la tabla de roles en la base de datos y mostramos los datos en la pagina de editar los usuarios
        $roles = Role::get();
        return view('pages.usuarios.edit', compact('users', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $url = substr($request->headers->get('referer'), -8);
        // //Actualizamos Datos del Usuario en la DB
        if($request->hasFile('avatar'))
        {
            $foto = $request->file('avatar');
            //eliminamos el viejo avatar para evitar duplicados, y mantener la carpeta users mas limpia
            $beforeDelete = $request->user()->avatar;
            if($beforeDelete != 'default.jpg')
            {
                Storage::disk('public')->delete($beforeDelete);
            }
            //actualizamos en la base de datos con fill([...campos de la tabla user])
            $update = $request->user()->fill([
                //el metodo store de storage
                // nos guarda en la base de datos con un hash especial y
                //nos guarda la imagen al mismo tiempo en la carpeta users
                'avatar' => $foto->store('users','public')
            ]);
            if($update->save())
            {
                return redirect('/miperfil');
            }
            else
            {
                //retornar al blade con error
                return back()->with('errors','Oh no ocurrio un problema al actualizar la imagen, intente nuevamente.');
            }
        }
    }

    public function updateRoles(Request $request, $id)
    {
        $roleId = $request->input('roles')[0];
        //Actualizamos Datos del Rol del Usuario en la DB
        $user = User2::find($id);
        $user->roles()->sync($roleId);
        // //Redireccionar al index
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*Le pasamos el ID y eliminamos con el metodo delete y se actualiza el campo deleted_at del metodo
        SoftDeletes*/
        User::findOrFail($id)->delete();
        //Redireccionamos al vista index
        return redirect()->route('user.index');
    }

    public function miperfil()
    {
        $users = User::all();
        $users = Auth::user();
        return view('pages.usuarios.miperfil', compact('users'));
    }
}
