<?php

namespace AizaBoutique\Http\Controllers;

use Illuminate\Http\Request;
use AizaBoutique\http\Requests\CategoryRequest;
use AizaBoutique\Category;
use AizaBoutique\User;
use Barryvdh\DomPDF\Facade as PDF;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('permission:category.create')->only(['create','store']);
        $this->middleware('permission:category.index')->only('index');
        $this->middleware('permission:category.edit')->only(['edit','update']);
        $this->middleware('permission:category.show')->only('show');
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
        $categorys = Category::all();
        $user = User::get();
        return view('pages.categoria.index', compact('categorys', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Vista del formulario
        return view('pages.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        /*Guardar Datos en la DB con el metodo all que envia todos los campos establecidos
        en el modelo en el campo protected $fillable*/
        Category::create($request->all());
        //Redireccionar al index
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*Consultamos la categoria por el parametro id y nos muestra la vista, findOrFail nos devuelve un error
        cuando el usuario intenta buscar un id en la url que no existe en la DB*/
        $category = Category::findOrFail($id);
        //Redireccionamos al a vista
        return view('pages.categoria.show', compact('category'));
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
        $category =Category::findOrFail($id);
        return view('pages.categoria.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        //Actualizamos Datos en la DB
        Category::findOrFail($id)->update($request->all());
        //Redireccionar al index
        return redirect()->route('category.index');
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
        Category::findOrFail($id)->delete();
        //Redireccionamos al vista index
        return redirect()->route('category.index');
    }

    public function exportPdf($filtro)
    {
        if($filtro == "SinFiltro"){
            $category = Category::all();
            $pdf = PDF::loadView('pages.categoria.pdfcategory', compact('category'));
            return $pdf->stream();
        }else{
            $category = Category::where('id','LIKE', '%'.$filtro.'%')->orWhere('name','LIKE', '%'.$filtro.'%')->get();
            $pdf = PDF::loadView('pages.categoria.pdfcategory', compact('category'));
            return $pdf->stream();
        }
    }
}