@extends('layouts.app')

@section('title', 'Autores')

@section('page-title', 'Autores')

@section('content')

<div class="card">

    <div style="
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    ">

        <div>
            <h3>Gestión de autores</h3>

            <p style="
                color: #6b7280;
                margin-top: 6px;
            ">
                Administra los autores registrados en el sistema.
            </p>
        </div>

        <a
            href="{{ route('autores.create') }}"
            class="btn btn-primary"
        >
            + Nuevo autor
        </a>

    </div>


    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>


        <tbody>

            @forelse($autores ?? [] as $autor)

                <tr>

                    <td>
                        {{ $autor->ID_autores }}
                    </td>

                    <td>
                        {{ $autor->Nombre }}
                    </td>

                    <td>
                        {{ $autor->Apellidos }}
                    </td>

                    <td>
                        {{ $autor->telefono }}
                    </td>

                    <td>
                        {{ $autor->correo }}
                    </td>

                    <td>

                        <a
                            href="{{ route('autores.edit', $autor->ID_autores) }}"
                            class="btn btn-primary"
                        >
                            Editar
                        </a>

                        <form
                            action="{{ route('autores.destroy', $autor->ID_autores) }}"
                            method="POST"
                            style="display:inline;"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger"
                                onclick="return confirm('¿Deseas eliminar este autor?')"
                            >
                                Eliminar
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="6"
                        style="
                            text-align: center;
                            padding: 35px;
                            color: #6b7280;
                        "
                    >
                        No hay autores registrados.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection
