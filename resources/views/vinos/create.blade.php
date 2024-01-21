<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Vino</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('bodegas.partials.header')
    <main class="h-dvh">
        <form action="{{ route('vinos.store', $bodega->id) }}" method="POST">
            @csrf
            <div class="flex items-center justify-center">
                <div class="container max-w-screen-lg mx-auto">
                    <div>
                        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                                <div class="text-gray-600 lg:border-r-2">
                                    <p class="font-medium text-lg">Datos de la bodega</p>
                                    <p>Rellene todos los campos.</p>
                                </div>
                                <div class="lg:col-span-2">
                                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                        <div class="md:col-span-5">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" name="nombre"
                                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                                value="" />
                                        </div>

                                        <div class="md:col-span-5">
                                            <label for="descripcion">Descripcion</label>
                                            <input type="text" name="descripcion"
                                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                                placeholder="" />
                                        </div>

                                        <div class="md:col-span-5">
                                            <label for="alcohol">Alcohol</label>
                                            <input type="text" name="alcohol"
                                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                                placeholder="" />
                                        </div>

                                        <div class="md:col-span-5">
                                            <label for="año">Año:</label>
                                            <input type="date" name="año"
                                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                                placeholder="" />
                                        </div>

                                        <div class="md:col-span-5">
                                            <label for="tipo">Tipo:</label>
                                            <select name="tipo"
                                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">
                                                <option value="Tinto">Tinto</option>
                                                <option value="Reserva">Reserva</option>
                                            </select>
                                        </div>

                                        <div class="md:col-span-5">
                                            <div class="inline-flex items-center">
                                                <input type="checkbox" name="billing_same" id="billing_same"
                                                    class="form-checkbox" required />
                                                <label for="billing_same" class="ml-2">Acepto los <span
                                                        class="text-blue-700">terminos y condiciones.</span></label>
                                            </div>
                                        </div>

                                        <div class="md:col-span-5 text-right">
                                            <div class="inline-flex items-end gap-2">
                                                <button type="submit"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Agregar</button>
                                                <a href="/bodegas/bodega/{{ $bodega->id }}"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                    Cancelar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    @include('bodegas.partials.footer')
</body>

</html>
