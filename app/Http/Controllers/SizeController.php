<?php

namespace AizaBoutique\Http\Controllers;

use AizaBoutique\Size;
use AizaBoutique\User;
use AizaBoutique\http\Requests\SizeRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function __construct(){
        $this->middleware('permission:category.create')->only(['create','store']);
        $this->middleware('permission:category.index')->only('index');
        $this->middleware('permission:category.edit')->only(['edit','update']);
        $this->middleware('permission:category.destory')->only('destory');
        $this->middleware('permission:category.pdf')->only('pdf');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Consultamos la base de datos y mostramos los datos en la pagina index
        $size = Size::all();
        $user = User::get();
        return view('pages.tallas.index', compact('size', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Vista del formulario
        return view('pages.tallas.create');
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
        Size::create($request->all());
        //Redireccionar al index
        return redirect()->route('tallas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \AizaBoutique\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \AizaBoutique\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        //El mismo metodo de parametro show pero redireccionamos a la vista edit
        $size = Size::findOrFail($id);
        return view('pages.tallas.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \AizaBoutique\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        //Actualizamos Datos en la DB
        Size::findOrFail($id)->update($request->all());
        //Redireccionar al index
        return redirect()->route('tallas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \AizaBoutique\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        /*Le pasamos el ID y eliminamos con el metodo delete y se actualiza el campo deleted_at del metodo
        SoftDeletes*/
        Size::findOrFail($id)->delete();
        //Redireccionamos al vista index
        return redirect()->route('tallas.index');
    }
}
