<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'ProductosApp') | DAI</title>
    <style>

:root{
    --bg: #0f1115;
    --surface: rgba(255,255,255,0.04);
    --surface-2: rgba(255,255,255,0.06);

    --border: rgba(255,255,255,0.08);

    --text: #f5f7fa;
    --text-soft: #9ca3af;

    --primary: #ffffff;
    --accent: #7c3aed;

    --success:#10b981;
    --danger:#ef4444;

    --radius: 22px;

    --shadow:
        0 10px 30px rgba(0,0,0,.35);

    --blur: blur(18px);
}

/* RESET */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:
        radial-gradient(circle at top left,#1a1d25 0%,#0f1115 40%),
        #0f1115;

    color:var(--text);

    font-family:
        Inter,
        SF Pro Display,
        Segoe UI,
        sans-serif;

    min-height:100vh;

    -webkit-font-smoothing: antialiased;
}

/* LINKS */

a{
    text-decoration:none;
    color:inherit;
}

/* NAVBAR */

.navbar{

    position:sticky;
    top:0;

    z-index:1000;

    display:flex;
    justify-content:space-between;
    align-items:center;

    padding:1rem 2rem;

    backdrop-filter: var(--blur);

    background: rgba(15,17,21,.65);

    border-bottom:1px solid var(--border);
}

.brand{

    font-size:1.2rem;
    font-weight:700;

    letter-spacing:.4px;
}

.brand span{
    color:var(--accent);
}

.navbar nav{
    display:flex;
    align-items:center;
    gap:1rem;
}

.navbar nav a{

    color:var(--text-soft);

    transition:.25s ease;
}

.navbar nav a:hover{
    color:var(--text);
}

/* MAIN */

.main-content{

    max-width:1400px;

    margin:auto;

    padding:2rem;
}

/* BUTTONS */

.btn{

    border:none;

    cursor:pointer;

    border-radius:14px;

    padding:.8rem 1.3rem;

    font-weight:600;

    transition:.25s ease;

    font-size:.92rem;
}

.btn-primary{

    background:var(--primary);
    color:#000;
}

.btn-primary:hover{

    transform:translateY(-2px);

    opacity:.92;
}

.btn-outline{

    background:transparent;

    border:1px solid var(--border);

    color:var(--text);
}

.btn-outline:hover{

    background:rgba(255,255,255,.06);
}

/* CARDS */

.card,
.producto-card{

    background:var(--surface);

    backdrop-filter: var(--blur);

    border:1px solid var(--border);

    border-radius:var(--radius);

    overflow:hidden;

    box-shadow:var(--shadow);
}

/* GRID */

.galeria-grid{

    display:grid;

    grid-template-columns:
        repeat(auto-fill,minmax(280px,1fr));

    gap:1.8rem;
}

/* PRODUCT CARD */

.producto-card{

    transition:
        transform .35s ease,
        border-color .35s ease,
        background .35s ease;
}

.producto-card:hover{

    transform:translateY(-8px);

    border-color:rgba(255,255,255,.18);

    background:var(--surface-2);
}

.producto-card img{

    width:100%;
    height:240px;

    object-fit:cover;
}

/* CARD BODY */

.card-body{

    padding:1.4rem;
}

.card-body h3{

    font-size:1.05rem;

    margin-bottom:.5rem;
}

.marca{

    color:var(--text-soft);

    font-size:.9rem;

    margin-bottom:1rem;
}

.precio{

    font-size:1.5rem;

    font-weight:700;

    margin-top:1rem;
}

/* FOOTER CARD */

.card-footer{

    padding:1rem 1.4rem;

    border-top:1px solid var(--border);

    display:flex;

    justify-content:space-between;

    align-items:center;
}

/* BADGES */

.badge-categoria{

    background:rgba(255,255,255,.06);

    border:1px solid var(--border);

    padding:.45rem .9rem;

    border-radius:999px;

    font-size:.78rem;

    color:var(--text-soft);
}

/* ALERTS */

.alert{

    padding:1rem 1.2rem;

    border-radius:18px;

    margin-bottom:1rem;

    border:1px solid var(--border);

    backdrop-filter: var(--blur);
}

.alert-success{

    background:rgba(16,185,129,.12);

    color:#6ee7b7;
}

.alert-danger{

    background:rgba(239,68,68,.12);

    color:#fca5a5;
}

.alert-info{

    background:rgba(59,130,246,.12);

    color:#93c5fd;
}

/* FORM */

.form-group{

    margin-bottom:1.2rem;
}

.form-group label{

    display:block;

    margin-bottom:.6rem;

    color:var(--text-soft);

    font-size:.92rem;
}

.form-group input,
.form-group select,
.form-group textarea{

    width:100%;

    padding:1rem;

    border-radius:16px;

    border:1px solid var(--border);

    background:rgba(255,255,255,.03);

    color:var(--text);

    outline:none;

    transition:.25s ease;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus{

    border-color:rgba(124,58,237,.8);

    background:rgba(255,255,255,.05);
}

/* TABLES */

table{

    width:100%;

    border-collapse:collapse;

    overflow:hidden;

    border-radius:20px;

    background:var(--surface);
}

th{

    text-align:left;

    padding:1rem;

    color:var(--text-soft);

    font-weight:600;

    border-bottom:1px solid var(--border);
}

td{

    padding:1rem;

    border-bottom:1px solid rgba(255,255,255,.04);
}

tr:hover td{

    background:rgba(255,255,255,.03);
}

/* FOOTER */

.site-footer{

    margin-top:4rem;

    padding:2rem;

    text-align:center;

    color:var(--text-soft);

    border-top:1px solid var(--border);
}

</style>
    @stack('styles')
</head>
<body>
 
<!-- Navbar -->
<div class="navbar">
    <a href="{{ route('home') }}" class="brand">Productos<span>App</span></a>
    <nav>
        @auth
            <a href="{{ route('productos.galeria') }}">Galeria</a>
            <a href="{{ route('productos.index') }}">Productos</a>
            <a href="{{ route('categorias.index') }}">Categorias</a>
            <a href="{{ route('carrito.index') }}" class="carrito-btn">
                Carrito
                @if(session('carrito') && count(session('carrito')) > 0)
                    ({{ count(session('carrito')) }})
                @endif
            </a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline">
                @csrf
                <button type="submit" class="btn btn-outline" style="margin-left:1rem">
                    Cerrar sesion
                </button>
            </form>
        @else
            <a href="{{ route('login') }}">Iniciar sesion</a>
        @endauth
    </nav>
</div>
 
<!-- Contenido principal -->
<div class="main-content">
 
    {{-- Mensajes flash de sesion --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(session('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
    @endif
 
    @yield('contenido')
</div>
 
<div class="site-footer">
    Desarrollo de Aplicaciones en Internet &mdash; Ciclo III &mdash; {{ date('Y') }}
</div>
 
@stack('scripts')
</body>
</html>
