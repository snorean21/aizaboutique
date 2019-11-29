<?php

namespace AizaBoutique\Http\Controllers;

use AizaBoutique\Product;
use AizaBoutique\User;
use AizaBoutique\http\Requests\ProductRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('permission:product.create')->only(['create','store']);
        $this->middleware('permission:product.index')->only('index');
        $this->middleware('permission:product.edit')->only(['edit','update']);
        $this->middleware('permission:product.show')->only('show');
        $this->middleware('permission:product.destory')->only('destory');
        $this->middleware('permission:product.pdf')->only('pdf');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Consultamos la base de datos y mostramos los datos en la pagina index
        $product = Product::all();
        $user = User::get();
        return view('pages.producto.index', compact('product', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Vista del formulario
        return view('pages.producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        /*Guardar Datos en la DB con el metodo all que envia todos los campos establecidos
        en el modelo en el campo protected $fillable*/
        $product =(new Product)->fill( $request->all() );
        $product->image = $request->file('image')->store('public');
        $product->save();
        //$product = Product::create($request->all());
        //IMAGENES
        // if($request->file('image')){
        //     $file = Storage::disk('public')->put('img', $request->file('image'));
        //     $product->fill(['image'=>asset($file)])->save();
        // }
        //Redireccionar al index
        return redirect()->route('product.index');
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
        $product = Product::findOrFail($id);
        //Redireccionamos al a vista
        return view('pages.producto.show', compact('product'));
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
        $product = Product::findOrFail($id);
        return view('pages.producto.edit', compact('product'));
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
        $product = Product::findOrFail($id);
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('public/img/product/body');
        }
        $product->update($request->all());
        //Redireccionar al index
        return redirect()->route('product.index');
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
        Product::findOrFail($id)->delete();
        //Redireccionamos al vista index
        return redirect()->route('product.index');
    }

    public function exportPdf($filtro)
    {
        if($filtro == "SinFiltro"){
            $product = Product::all();
            $pdf = PDF::loadView('pages.producto.pdfproducto', compact('product'));
            $pdf->setPaper('legal');
            return $pdf->stream();
        }else{
            $product = Product::where('id','LIKE', '%'.$filtro.'%')->orWhere('reference','LIKE', '%'.$filtro.'%')->get();
            $pdf = PDF::loadView('pages.producto.pdfproducto', compact('product'));
            $pdf->setPaper('legal');
            return $pdf->stream();
        }
    }
}
