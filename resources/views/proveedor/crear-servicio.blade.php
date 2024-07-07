<x-app-layout>
    <div class="flex flex-col items-center justify-center mx-auto md:px-32 sm:px-12 lg:px-40 xl:px-80 py-12">
        @if (session('success'))
            <div class="w-full bg-green-300 shadow-lg rounded-lg p-6">
                {{ session('success') }}
            </div>
        @endif
        <div class="w-full bg-slate-800 shadow-lg rounded-lg p-6 mt-6 overflow-hidden">
            <form method="POST" action="{{ route('servicio-guardar') }}" class="flex flex-col">
                @csrf
                <div>
                    <x-input-label for="nombre" :value="__('Nombre')" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')"
                        required autofocus autocomplete="nombre" />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="categoria" :value="__('Categoria')" />
                    <select :value="old('categoria')" name="categoria" id="categoria" required
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                        <option value="">Seleccione una categoria</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria }}">{{ $categoria }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <x-input-label for="descripcion" :value="__('Descripcion')" />
                    <textarea class="block mt-1 w-full dark:text-gray-300 border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md"
                        :value="old('descripcion')" name="descripcion" id="descripcion" cols="30" rows="2"></textarea>
                    <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="precio" :value="__('Precio')" />
                    <x-text-input id="precio" class="block mt-1 w-full" type="text" name="precio"
                        :value="old('precio')" required autofocus autocomplete="precio" />
                    <x-input-error :messages="$errors->get('precio')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __('Guardar') }}
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
