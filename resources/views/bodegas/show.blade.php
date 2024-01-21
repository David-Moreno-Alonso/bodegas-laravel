<!-- resources/views/bodegas/show.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles de la Bodega</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('bodegas.partials.header')
    <main class="mx-4 h-dvh">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-2 mb-6">
            <h1 class="text-2xl font-medium text-gray-700 uppercase text-center">Datos de la Bodega,
                {{ $bodega->nombre }}</h1>
            <table class="w-full text-sm rtl:text-right text-gray-500 dark:text-gray-400 text-center">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Localización
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Teléfono
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Contacto
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fundación
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Restaurante
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Hotel
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acción
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="px-6 py-4">{{ $bodega->id }}</td>
                        <td class="px-6 py-4">{{ $bodega->nombre }}</td>
                        <td class="px-6 py-4">{{ $bodega->localizacion }}</td>
                        <td class="px-6 py-4">{{ $bodega->telefono }}</td>
                        <td class="px-6 py-4">{{ $bodega->email }}</td>
                        <td class="px-6 py-4">{{ $bodega->contacto }}</td>
                        <td class="px-6 py-4">{{ $bodega->fundacion }}</td>
                        @if ($bodega->restaurante == 'S')
                            <td class="px-6 py-4">Si</td>
                        @else
                            <td class="px-6 py-4">No</td>
                        @endif
                        @if ($bodega->hotel == 'S')
                            <td class="px-6 py-4">Si</td>
                        @else
                            <td class="px-6 py-4">No</td>
                        @endif
                        <td class="flex items-center justify-center gap-2 m-2">
                            <a href="/bodegas/bodega/{{ $bodega->id }}"
                                class="px-5 py-2.5 font-medium bg-yellow-50 hover:bg-yellow-100 hover:text-yellow-600 text-yellow-500 rounded-lg text-sm">
                                Editar
                            </a>
                            <form action="{{ route('bodegas.destroy', $bodega->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-5 py-2.5 font-medium bg-red-50 hover:bg-red-100 hover:text-red-600 text-red-500 rounded-lg text-sm">
                                    Borrar
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-2">
            <h1 class="text-2xl font-medium text-gray-700 uppercase text-center">Vinos disponibles</h1>

            <table class="w-full text-sm rtl:text-right text-gray-500 dark:text-gray-400 text-center">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tipo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Año
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acción
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($bodega->vinos as $vino)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="px-6 py-4">{{ $vino->nombre }}</td>
                            <td class="px-6 py-4">{{ $vino->tipo }}</td>
                            <td class="px-6 py-4">{{ $vino->año }}</td>

                            <td class="flex items-center justify-center gap-2 m-2">
                                <a href="/bodegas/bodega/{{ $bodega->id }}"
                                    class="px-5 py-2.5 font-medium bg-blue-50 hover:bg-blue-100 hover:text-blue-600 text-blue-500 rounded-lg text-sm">
                                    Entrar
                                </a>
                                <form action="{{ route('vinos.destroy', ['bodega' => $bodega->id, 'vino' => $vino->id]) }}"  method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-5 py-2.5 font-medium bg-red-50 hover:bg-red-100 hover:text-red-600 text-red-500 rounded-lg text-sm">
                                        Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <div class=" w-full flex items-center justify-center mb-4">
            <a href="{{ route('vinos.create', $bodega->id) }}" class="relative inline-block text-lg group">
                <span
                    class="relative z-10 block px-5 py-3 overflow-hidden font-medium leading-tight text-blue-800 transition-colors duration-300 ease-out border-2 border-blue-800 rounded-lg group-hover:text-white">
                    <span class="absolute inset-0 w-full h-full px-5 py-3 rounded-lg bg-gray-50"></span>
                    <span
                        class="absolute left-0 w-48 h-48 -ml-2 transition-all duration-300 origin-top-right -rotate-90 -translate-x-full translate-y-12 bg-blue-900 group-hover:-rotate-180 ease"></span>
                    <span class="relative">+ Añadir Vino</span>
                </span>
                <span
                    class="absolute bottom-0 right-0 w-full h-12 -mb-1 -mr-1 transition-all duration-200 ease-linear bg-blue-900 rounded-lg group-hover:mb-0 group-hover:mr-0"
                    data-rounded="rounded-lg"></span>
            </a>
        </div>
        <div class="flex items-end justify-end mx-2">
            <a href="/bodegas" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Atras
            </a>
        </div>

    </main>
    @include('bodegas.partials.footer')
</body>

</html>
