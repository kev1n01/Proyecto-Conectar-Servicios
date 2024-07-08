<x-app-layout>
    <div class="dark:bg-gray-100 mx-auto p-5 h-auto">
        <div class="p-5">
            <form method="GET" action="{{ route('servicios') }}">
                <div class="container mx-auto gap-2 flex ">
                    <x-text-input id="search" class="block mt-1 w-[500px]" type="text" name="search" :value="request('search')"
                        placeholder="Buscar por servicios" />
                    
                    <select name="ciudad" id="ciudad"
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm w-auto">
                        <option value="">Seleccione una ciudad disponible</option>
                        @foreach ($ciudadesRegistradas as $cr)
                            <option value="{{ $cr }}" {{ request('ciudad') == $cr ? 'selected' : '' }}>{{ $cr }}</option>
                        @endforeach
                    </select>

                    <select name="categoria" id="categoria"
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm w-auto">
                        <option value="">Seleccione una categoría</option>
                        @foreach ($categorias as $cat)
                            <option value="{{ $cat }}" {{ request('categoria') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Buscar
                    </button>
                </div>
            </form>
            <div class="container mx-auto py-12">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach ($servicios as $servicio)
                        {{-- // empieza los servicios --}}
                        <div class="bg-background rounded-lg shadow-lg overflow-hidden">
                            <img src="https://neetwork.com/wp-content/uploads/2019/10/caracteristicas.jpg"
                                alt="servicios" width="300" height="200" class="w-full h-48 object-cover"
                                style="aspect-ratio: 400 / 300; object-fit: cover;" />
                            <div class="p-4 bg-white">
                                <h3 class="text-lg font-bold mb-2">{{ $servicio->nombre }} | <span class="text-sm text-gray-600">{{ $servicio->categoria }} | {{ $servicio->proveedor->ciudad }}</span></h3>
                                <p class="text-muted-foreground mb-4">{{ $servicio->descripcion }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-primary font-bold">S/. {{ $servicio->precio }}</span>

                                    <a class="bg-slate-800 hover:bg-slate-600 p-2  inline-flex items-center justify-centerno-underline text-sm text-gray-200   rounded-md focus:outline-none"
                                        href="{{ route('servicio.ver', $servicio->id) }}">
                                        Ver detalles
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- // empieza los servicios --}}
                    @endforeach
                </div>
            </div>
        </div>
</x-app-layout>
