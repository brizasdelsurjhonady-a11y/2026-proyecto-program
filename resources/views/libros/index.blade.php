<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Biblioteca Virtual</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f3f6fa;
            color: #1f2937;
        }

        /* =========================
           ENCABEZADO
        ========================== */

        header {
            background: linear-gradient(135deg, #163a63, #2563a6);
            color: white;
            padding: 35px 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .header-contenido {
            max-width: 1200px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-icono {
            font-size: 48px;
        }

        .logo h1 {
            font-size: 32px;
            margin-bottom: 5px;
        }

        .logo p {
            font-size: 15px;
            opacity: 0.9;
        }

        .contador {
            background: rgba(255, 255, 255, 0.15);
            padding: 12px 18px;
            border-radius: 12px;
            text-align: center;
            backdrop-filter: blur(5px);
        }

        .contador strong {
            display: block;
            font-size: 25px;
        }

        .contador span {
            font-size: 13px;
        }

        /* =========================
           CONTENEDOR
        ========================== */

        .contenedor {
            width: 92%;
            max-width: 1200px;
            margin: 35px auto;
        }

        .cabecera-seccion {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 20px;
        }

        .cabecera-seccion h2 {
            color: #163a63;
            font-size: 27px;
        }

        .cabecera-seccion p {
            color: #6b7280;
            margin-top: 5px;
        }

        /* =========================
           BUSCADOR
        ========================== */

        .buscador {
            margin-bottom: 30px;
            background: white;
            padding: 18px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
        }

        .buscador input {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid #d6dde6;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            transition: 0.3s;
        }

        .buscador input:focus {
            border-color: #2563a6;
            box-shadow: 0 0 0 3px rgba(37, 99, 166, 0.12);
        }

        /* =========================
           GRID DE LIBROS
        ========================== */

        .libros {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        /* =========================
           TARJETA
        ========================== */

        .libro {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e8edf3;
        }

        .libro:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.14);
        }

        /* =========================
           PORTADA
        ========================== */

        .portada {
            width: 100%;
            height: 300px;
            background: linear-gradient(135deg, #e9eef5, #dce5ef);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .portada img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.4s ease;
        }

        .libro:hover .portada img {
            transform: scale(1.04);
        }

        .portada-vacia {
            text-align: center;
            color: #64748b;
            padding: 20px;
        }

        .portada-vacia .icono {
            font-size: 55px;
            display: block;
            margin-bottom: 10px;
        }

        /* =========================
           INFORMACIÓN
        ========================== */

        .informacion {
            padding: 22px;
        }

        .libro h3 {
            color: #163a63;
            font-size: 21px;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .datos {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .dato {
            display: flex;
            gap: 8px;
            align-items: flex-start;
            font-size: 14px;
            color: #4b5563;
        }

        .dato .icono {
            width: 22px;
            flex-shrink: 0;
        }

        .dato strong {
            color: #1f2937;
        }

        /* =========================
           ETIQUETAS
        ========================== */

        .etiquetas {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 15px 0;
        }

        .etiqueta {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #e8f1fb;
            color: #1d5d96;
            font-size: 12px;
            font-weight: 600;
        }

        .etiqueta.tipo {
            background: #eef2ff;
            color: #4f46a5;
        }

        /* =========================
           PIE DE TARJETA
        ========================== */

        .pie-tarjeta {
            margin-top: 18px;
            padding-top: 15px;
            border-top: 1px solid #edf0f3;
            font-size: 12px;
            color: #9ca3af;
        }

        /* =========================
           SIN LIBROS
        ========================== */

        .sin-libros {
            grid-column: 1 / -1;
            background: white;
            padding: 50px;
            border-radius: 15px;
            text-align: center;
            color: #6b7280;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
        }

        .sin-libros .icono {
            font-size: 55px;
            margin-bottom: 15px;
        }

        /* =========================
           PIE DE PÁGINA
        ========================== */

        footer {
            margin-top: 60px;
            background: #163a63;
            color: white;
            text-align: center;
            padding: 25px;
        }

        footer p {
            margin: 5px;
            font-size: 14px;
            opacity: 0.9;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 950px) {
            .libros {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 650px) {

            header {
                padding: 25px 15px;
            }

            .header-contenido {
                flex-direction: column;
                text-align: center;
            }

            .logo {
                justify-content: center;
            }

            .logo h1 {
                font-size: 25px;
            }

            .logo-icono {
                font-size: 38px;
            }

            .contador {
                width: 100%;
            }

            .cabecera-seccion {
                flex-direction: column;
                align-items: flex-start;
            }

            .libros {
                grid-template-columns: 1fr;
            }

            .portada {
                height: 330px;
            }

            .contenedor {
                width: 94%;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
         ENCABEZADO
    ========================== -->

    <header>

        <div class="header-contenido">

            <div class="logo">

                <div class="logo-icono">
                    📚
                </div>

                <div>
                    <h1>Biblioteca Virtual</h1>
                    <p>Catálogo digital de libros</p>
                </div>

            </div>

            <div class="contador">

                <strong>{{ $libros->count() }}</strong>

                <span>
                    {{ $libros->count() == 1 ? 'Libro disponible' : 'Libros disponibles' }}
                </span>

            </div>

        </div>

    </header>


    <!-- =========================
         CONTENIDO PRINCIPAL
    ========================== -->

    <main class="contenedor">

        <div class="cabecera-seccion">

            <div>
                <h2>📖 Colección de libros</h2>

                <p>
                    Explora nuestra colección disponible.
                </p>
            </div>

        </div>


        <!-- =========================
             BUSCADOR
        ========================== -->

        <div class="buscador">

            <input
                type="text"
                id="buscador"
                placeholder="🔎 Buscar por título, autor, género o editorial..."
            >

        </div>


        <!-- =========================
             LIBROS
        ========================== -->

        <div class="libros" id="lista-libros">

            @forelse($libros as $libro)

                <article
                    class="libro"
                    data-busqueda="
                        {{ strtolower($libro->Titulo) }}
                        {{ strtolower($libro->genero ?? '') }}
                        {{ strtolower($libro->Tipo ?? '') }}
                        {{ strtolower($libro->autor->Nombre ?? '') }}
                        {{ strtolower($libro->autor->Apellidos ?? '') }}
                        {{ strtolower($libro->editor->nombre_editorial ?? '') }}
                    "
                >

                    <!-- PORTADA -->

                    @if($libro->archivo)

                        <div class="portada">

                            <img
                                src="{{ $libro->archivo }}"
                                alt="Portada de {{ $libro->Titulo }}"
                                onerror="this.parentElement.innerHTML='<div class=&quot;portada-vacia&quot;><span class=&quot;icono&quot;>📕</span><span>Portada no disponible</span></div>';"
                            >

                        </div>

                    @else

                        <div class="portada">

                            <div class="portada-vacia">

                                <span class="icono">
                                    📕
                                </span>

                                <span>
                                    Portada no disponible
                                </span>

                            </div>

                        </div>

                    @endif


                    <!-- INFORMACIÓN -->

                    <div class="informacion">

                        <h3>
                            {{ $libro->Titulo }}
                        </h3>


                        <!-- ETIQUETAS -->

                        <div class="etiquetas">

                            @if($libro->Tipo)

                                <span class="etiqueta tipo">
                                    {{ $libro->Tipo }}
                                </span>

                            @endif


                            @if($libro->genero)

                                <span class="etiqueta">
                                    {{ $libro->genero }}
                                </span>

                            @endif

                        </div>


                        <!-- DATOS -->

                        <div class="datos">

                            <!-- AUTOR -->

                            <div class="dato">

                                <span class="icono">
                                    👤
                                </span>

                                <div>

                                    <strong>Autor</strong><br>

                                    @if($libro->autor)

                                        {{ $libro->autor->Nombre }}
                                        {{ $libro->autor->Apellidos }}

                                    @else

                                        No registrado

                                    @endif

                                </div>

                            </div>


                            <!-- EDITORIAL -->

                            <div class="dato">

                                <span class="icono">
                                    🏢
                                </span>

                                <div>

                                    <strong>Editorial</strong><br>

                                    @if($libro->editor)

                                        {{ $libro->editor->nombre_editorial }}

                                    @else

                                        No registrada

                                    @endif

                                </div>

                            </div>


                            <!-- TRADUCTOR -->

                            <div class="dato">

                                <span class="icono">
                                    🌐
                                </span>

                                <div>

                                    <strong>Traductor</strong><br>

                                    @if($libro->traductor)

                                        {{ $libro->traductor->Nombre }}
                                        {{ $libro->traductor->Apellidos }}

                                    @else

                                        No registrado

                                    @endif

                                </div>

                            </div>

                        </div>


                        <!-- PIE DE TARJETA -->

                        <div class="pie-tarjeta">

                            📚 Biblioteca Virtual

                        </div>

                    </div>

                </article>

            @empty

                <div class="sin-libros">

                    <div class="icono">
                        📚
                    </div>

                    <h3>
                        No hay libros registrados
                    </h3>

                    <p>
                        Actualmente no existen libros disponibles en la biblioteca.
                    </p>

                </div>

            @endforelse

        </div>

    </main>


    <!-- =========================
         PIE DE PÁGINA
    ========================== -->

    <footer>

        <p>
            📚 Biblioteca Virtual
        </p>

        <p>
            Sistema de gestión y consulta de libros
        </p>

    </footer>


    <!-- =========================
         BUSCADOR CON JAVASCRIPT
    ========================== -->

    <script>

        const buscador = document.getElementById('buscador');

        const libros = document.querySelectorAll('.libro');

        buscador.addEventListener('input', function () {

            const texto = this.value.toLowerCase().trim();

            libros.forEach(function (libro) {

                const contenido = libro.dataset.busqueda.toLowerCase();

                if (contenido.includes(texto)) {

                    libro.style.display = '';

                } else {

                    libro.style.display = 'none';

                }

            });

        });

    </script>

</body>
</html>
