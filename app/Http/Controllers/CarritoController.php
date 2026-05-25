<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Carrito;
use App\Models\CarritoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    // Mostrar carrito
    public function index()
    {
        $user = Auth::user();

        $carrito = Carrito::firstOrCreate([
            'user_id' => $user->id
        ]);

        $items = $carrito->items()->with('producto')->get();

        $productos = [];
        $total = 0;

        foreach ($items as $item) {

            $producto = $item->producto;

            if ($producto) {

                $subtotal = $producto->precio * $item->cantidad;

                $total += $subtotal;

                $productos[] = [
                    'producto' => $producto,
                    'cantidad' => $item->cantidad,
                    'subtotal' => $subtotal,
                ];
            }
        }

        return view('carrito.index', compact('productos', 'total'));
    }

    // Agregar producto
    public function agregar($id)
    {
        $producto = Producto::findOrFail($id);

        $user = Auth::user();

        $carrito = Carrito::firstOrCreate([
            'user_id' => $user->id
        ]);

        $item = CarritoItem::where('carrito_id', $carrito->id)
                           ->where('producto_id', $producto->id_producto)
                           ->first();

        if ($item) {

            if ($item->cantidad < $producto->stock) {

                $item->cantidad++;

                $item->save();

            } else {

                return back()->with(
                    'error',
                    'No hay más stock disponible de ' . $producto->nombre
                );
            }

        } else {

            CarritoItem::create([
                'carrito_id' => $carrito->id,
                'producto_id' => $producto->id_producto,
                'cantidad' => 1
            ]);
        }

        return back()->with(
            'success',
            $producto->nombre . ' agregado al carrito.'
        );
    }

    // Quitar producto
    public function quitar($id)
    {
        $user = Auth::user();

        $carrito = Carrito::where('user_id', $user->id)->first();

        if (!$carrito) {
            return back();
        }

        $item = CarritoItem::where('carrito_id', $carrito->id)
                           ->where('producto_id', $id)
                           ->first();

        if ($item) {

            if ($item->cantidad > 1) {

                $item->cantidad--;

                $item->save();

            } else {

                $item->delete();
            }
        }

        return back()->with(
            'info',
            'Producto actualizado en el carrito.'
        );
    }

    // Vaciar carrito
    public function vaciar()
    {
        $user = Auth::user();

        $carrito = Carrito::where('user_id', $user->id)->first();

        if ($carrito) {

            CarritoItem::where(
                'carrito_id',
                $carrito->id
            )->delete();
        }

        return back()->with(
            'info',
            'El carrito ha sido vaciado.'
        );
    }
}