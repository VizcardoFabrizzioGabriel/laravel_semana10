<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // LISTA PRODUCTOS
    public function index(Request $request)
    {
        $query = Producto::with('categoria');

        // BUSQUEDA
        if ($request->filled('buscar')) {

            $query->where(function($q) use ($request){

                $q->where('nombre', 'LIKE', '%' . $request->buscar . '%')
                  ->orWhere('marca', 'LIKE', '%' . $request->buscar . '%');

            });
        }

        // FILTRO CATEGORIA
        if ($request->filled('categoria')) {

            $query->where(
                'id_categoria',
                $request->categoria
            );
        }

        $productos = $query->get();

        $categorias = Categoria::all();

        return view(
            'productos.index',
            compact('productos', 'categorias')
        );
    }

    // DETALLE
    public function show($id)
    {
        $producto = Producto::with('categoria')
                    ->findOrFail($id);

        return view(
            'productos.show',
            compact('producto')
        );
    }

    // GALERIA
    public function galeria(Request $request)
    {
        $query = Producto::with('categoria');

        // BUSQUEDA
        if ($request->filled('buscar')) {

            $query->where(function($q) use ($request){

                $q->where('nombre', 'LIKE', '%' . $request->buscar . '%')
                  ->orWhere('marca', 'LIKE', '%' . $request->buscar . '%');

            });
        }

        // FILTRO CATEGORIA
        if ($request->filled('categoria')) {

            $query->where(
                'id_categoria',
                $request->categoria
            );
        }

        $productos = $query->get();

        $categorias = Categoria::all();

        return view(
            'productos.galeria',
            compact('productos', 'categorias')
        );
    }
}