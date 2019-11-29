<?php

namespace AizaBoutique\Http\Controllers;

use AizaBoutique\User;
use AizaBoutique\color;
use AizaBoutique\http\Requests\ColorRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function __construct(){
        $this->middleware('permission:color.create')->only(['create','store']);
        $this->middleware('permission:color.index')->only('index');
        $this->middleware('permission:color.edit')->only(['edit','update']);
        $this->middleware('permission:color.show')->only('show');
        $this->middleware('permission:color.destory')->only('destory');
        $this->middleware('permission:color.pdf')->only('pdf');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Consultamos la base de datos y mostramos los datos en la pagina index
        $color = Color::all();
        $user = User::get();
        return view('pages.color.index', compact('color', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Vista del formulario
        return view('pages.color.create');
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
        Color::create($request->all());
        //Redireccionar al index
        return redirect()->route('color.index');
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
    public function edit($id)
    {
        $color = Color::findOrFail($id);
        return view('pages.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Actualizamos Datos en la DB
        Color::findOrFail($id)->update($request->all());
        //Redireccionar al index
        return redirect()->route('color.index');
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
        Color::findOrFail($id)->delete();
        //Redireccionamos al vista index
        return redirect()->route('color.index');
    }
}
