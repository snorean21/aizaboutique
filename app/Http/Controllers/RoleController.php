<?php

namespace AizaBoutique\Http\Controllers;

use AizaBoutique\User;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('permission:role.create')->only(['create','store']);
        $this->middleware('permission:role.index')->only('index');
        $this->middleware('permission:role.edit')->only(['edit','update']);
        $this->middleware('permission:role.show')->only('show');
        $this->middleware('permission:role.destory')->only('destory');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Consultamos la base de datos y mostramos los datos en la pagina index
        $roles = Role::all();
        $user = User::get();
        return view('pages.roles.index', compact('roles', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        //Vista del formulario
        return view('pages.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*Guardar Datos en la DB con el metodo all que envia todos los campos establecidos
        en el modelo en el campo protected $fillable*/
        $role = Role::create($request->all());
        $role->permissions()->sync($request->get('permissions'));
        //Redireccionar al index
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \AizaBoutique\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permissions = Permission::get();
        //Redireccionamos al a vista
        return view('pages.roles.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \AizaBoutique\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();
        return view('pages.roles.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \AizaBoutique\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->get('permissions'));
        return redirect()->route('role.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \AizaBoutique\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
