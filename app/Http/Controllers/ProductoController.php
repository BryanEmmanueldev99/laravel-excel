<?php

namespace App\Http\Controllers;

use App\Imports\ProductosImport;
use App\Models\Producto;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductoController extends Controller
{
    
    public function index()
    {
        $productos = Producto::get();
        return view('cargar-productos', compact('productos'));
    }

    
    public function store(Request $request)
    {
        Excel::import(new ProductosImport, $request->file('excel_file'));
        return redirect()->back()->with('exito', 'Productos cargados exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
