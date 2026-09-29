<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Sistema de Biblioteca')</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
            color: #1f2937;
        }

        /* MENÚ LATERAL */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #172554;
            color: white;
            padding: 25px 15px;
        }

        .logo {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .logo p {
            font-size: 13px;
            color: #bfdbfe;
        }

        .menu-title {
            font-size: 12px;
            color: #93c5fd;
            text-transform: uppercase;
            margin: 20px 12px 8px;
        }

        .menu a {
            display: block;
            text-decoration: none;
            color: white;
            padding: 13px 15px;
            border-radius: 8px;
            margin-bottom: 6px;
            transition: 0.2s;
        }

        .menu a:hover {
            background: #1d4ed8;
        }

        .menu a.active {
            background: #2563eb;
        }

        /* CONTENIDO */
        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        .topbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .topbar h2 {
            font-size: 20px;
        }

        .user {
            font-size: 14px;
            color: #6b7280;
        }

        .content {
            padding: 30px;
        }

        /* TARJETAS */
        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.06);
            margin-bottom: 20px;
        }

        .card h3 {
            margin-bottom: 10px;
        }

        /* BOTONES */
        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 7px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-success {
            background: #16a34a;
            color: white;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        /* TABLAS */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #eff6ff;
            color: #1e3a8a;
            text-align: left;
            padding: 13px;
        }

        td {
            padding: 13px;
            border-bottom: 1px solid #e5e7eb;
        }

        tr:hover {
            background: #f9fafb;
        }

        /* FORMULARIOS */
        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            font-size: 14px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
            }

            .content {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <!-- MENÚ LATERAL -->
    <aside class="sidebar">

        <div class="logo">
            <h1>📚 Biblioteca</h1>
            <p>Sistema de Gestión</p>
        </div>

        <div class="menu-title">
            Principal
        </div>

        <nav class="menu">

            <a href="{{ url('/') }}">
                🏠 Inicio
            </a>

            <a href="{{ url('/libros') }}">
                📖 Libros
            </a>

            <a href="{{ route('autores.index') }}">
                ✍️ Autores
            </a>

        </nav>

        <div class="menu-title">
            Gestión
        </div>

        <nav class="menu">

            <a href="{{ route('autores.create') }}">
                ➕ Nuevo autor
            </a>

        </nav>

    </aside>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="main">

        <header class="topbar">
            <h2>@yield('page-title', 'Panel principal')</h2>

            <div class="user">
                👤 Administrador
            </div>
        </header>

        <section class="content">

            @yield('content')

        </section>

    </main>

</body>
</html>
