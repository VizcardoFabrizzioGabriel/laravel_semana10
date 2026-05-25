<!-- resources/views/productos/index.blade.php -->

@extends('layouts.app')

@section('titulo', 'Productos')

@section('contenido')

<h1 style="
    margin-bottom:1.5rem;
    font-size:2rem;
    font-weight:700;
">
    Productos

    <span style="
        font-size:1rem;
        font-weight:normal;
        color:#888;
    ">
        ({{ $productos->count() }} registros)
    </span>
</h1>

<!-- FILTROS -->
<div class="card" style="margin-bottom:2rem;">

    <form method="GET"
          action="{{ route('productos.index') }}">

        @csrf

        <div style="
            display:flex;
            gap:1rem;
            flex-wrap:wrap;
            align-items:center;
        ">

            <!-- BUSCADOR -->
            <input
                type="text"
                name="buscar"
                placeholder="Buscar producto o marca..."
                value="{{ request('buscar') }}"
                style="
                    flex:1;
                    min-width:250px;
                "
            >

            <!-- FILTRO CATEGORIAS -->
            <select name="categoria">

                <option value="">
                    Todas las categorias
                </option>

                @foreach($categorias as $categoria)

                    <option
                        value="{{ $categoria->id_categoria }}"
                        {{ request('categoria') == $categoria->id_categoria ? 'selected' : '' }}
                    >
                        {{ $categoria->descripcion }}
                    </option>

                @endforeach

            </select>

            <!-- BOTON -->
            <button type="submit"
                    class="btn btn-primary">

                Buscar

            </button>

        </div>

    </form>

</div>

@if($productos->isEmpty())

    <div class="card">

        <p style="
            color:#888;
            padding:1rem;
        ">
            No se encontraron productos.
        </p>

    </div>

@else

    <div class="card">

        <table>

            <thead>

                <tr>

                    <th>#</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoría</th>

                </tr>

            </thead>

            <tbody>

                @foreach($productos as $producto)

                    <tr>

                        <td>
                            {{ $producto->id_producto }}
                        </td>

                        <td>
                            <strong>
                                {{ $producto->nombre }}
                            </strong>
                        </td>

                        <td>
                            {{ $producto->marca }}
                        </td>

                        <td>
                            S/. {{ number_format($producto->precio, 2) }}
                        </td>

                        <td>

                            @if($producto->stock > 20)

                                <span class="badge-categoria badge-stock-ok">

                                    {{ $producto->stock }}

                                </span>

                            @elseif($producto->stock > 5)

                                <span class="badge-categoria badge-stock-warn">

                                    {{ $producto->stock }}

                                </span>

                            @else

                                <span class="badge-categoria badge-stock-low">

                                    {{ $producto->stock }} ⚠

                                </span>

                            @endif

                        </td>

                        <td>

                            <span class="badge-categoria">

                                {{ $producto->categoria->descripcion ?? 'Sin categoría' }}

                            </span>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

@endif

<!-- LIVE SEARCH -->
<script>

document.addEventListener('DOMContentLoaded', () => {

    const form = document.querySelector('form');

    const buscar = document.querySelector(
        'input[name="buscar"]'
    );

    if(buscar){

        let timeout;

        buscar.addEventListener('input', () => {

            clearTimeout(timeout);

            timeout = setTimeout(() => {

                form.submit();

            }, 600);

        });

    }

});

</script>

@endsection