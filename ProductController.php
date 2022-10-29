<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //*Dos formas de hacer lo mismo... porq eu son diferentes?
        /* $products = DB::table('products')->get();
        return view('products.index', ['products' => $products]); */
        $products = Product::all();
        return view('products.index', compact('products') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $producto = new Product();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->existencia = $request->existencia;
        $producto->fotografia = $request->fotografia;
        $producto->save();
        // return redirect()->route('products.index');
        return redirect('products.index')->with('success', 'Producto guardado correctamente');
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
        //*Esta función se utiliza para consultar la información el registro y colocarla en el form para despues hacer el update
        // dd($id);
        $products = Product::findOrFail($id);
        return view('products.edit', compact('products'));

        
    }
    /**
     * 
     * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //*Esta función se utiliza para hacer la actualización del registro
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:500',
            'existencia' => 'required',
            'fotografia' => 'required|max:255'
        ]);
        $productOBJ = Product::findOrFail($id);
        $productOBJ->nombre;
        $productOBJ->descripcion;
        $productOBJ->existencia;
        if ($request->fotografia != "" ){
            $productOBJ->fotografia = $request->fotografia;
        }else{
            $productOBJ->fotografia = "https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png?20200912122019";
        }
        // $productOBJ->save();        
        Product::whereId($id)->update($validatedData);
        return redirect('products.index')->with('success', 'Registro modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('products.index')->with('success', 'Registro eliminado correctamente');

    }
}
