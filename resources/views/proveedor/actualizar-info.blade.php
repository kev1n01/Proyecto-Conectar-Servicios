<x-app-layout>
    <div class="flex flex-col items-center justify-center mx-auto md:px-32 sm:px-12 lg:px-40 xl:px-80 py-12">
        @if (session('success'))
            <div class="w-full bg-green-300 shadow-lg rounded-lg p-6">
                {{ session('success') }}
            </div>
        @endif
        <div class="w-full bg-slate-800 shadow-lg rounded-lg p-6 mt-6 overflow-hidden">

            <form method="POST" action="{{ route('proveedor.actualizar', auth()->user()->id) }}" class="flex flex-col">
                @csrf
                @method('PUT')
                <div>
                    <x-input-label for="nombre" :value="__('Nombre')" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $proveedor->user->name)"
                        required autofocus autocomplete="nombre" />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="correo" :value="__('Correo')" />
                    <x-text-input id="correo" class="block mt-1 w-full" type="email" name="correo"
                        :value="old('correo', $proveedor->user->email)" required autofocus autocomplete="correo" />
                    <x-input-error :messages="$errors->get('correo')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="ciudad" :value="__('Ciudad')" />
                    <select value="{{ old('ciudad', $proveedor->ciudad) }}" name="ciudad" id="ciudad" required
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                        <option value="">Seleccione una ciudad</option>
                        @foreach ($ciudadesPeru as $cp)
                            <option value="{{ $cp }}"
                                {{ old('ciudad', $proveedor->ciudad) == $cp ? 'selected' : '' }}>
                                {{ $cp }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('ciudad')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="biografia" :value="__('biografia')" />
                    <textarea required
                        class ="block mt-1 w-full dark:text-gray-300 border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md"
                        name="biografia" id="biografia" cols="30" rows="2">{{ old('biografia', $proveedor->biografia) }}</textarea>
                    <x-input-error :messages="$errors->get('biografia')" class="mt-2" />
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
