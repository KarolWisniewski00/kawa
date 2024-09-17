<x-app-layout>
    <x-slot name="header">
        @include('admin.module.nav-shop')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-8">
            {{ __('Dodawanie nowego kodu rabatowego') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    @include('admin.module.alerts')
                    <x-application-logo class="block h-12 w-auto" />
                    <div class="flex flex-row justify-between">
                        <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                            Dodawanie nowego kodu rabatowego
                        </h1>
                        <a href="{{ route('dashboard.shop.discount') }}" type="button" class="mt-8 mb-4 text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                            <i class="fa-solid fa-chevron-left me-2"></i>Powrót
                        </a>
                    </div>
                    <form action="{{ route('dashboard.shop.discount.store') }}" method="POST">
                        @csrf
                        <!-- Kod rabatowy -->
                        <div class="mb-6">
                            <label for="code" class="block mb-2 text-sm font-medium text-gray-900">Kod rabatowy</label>
                            <input value="{{ old('code') }}" type="text" name="code" id="code" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Wprowadź kod rabatowy" required>
                            @error('code')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Typ rabatu -->
                        <div class="mb-6">
                            <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Rodzaj rabatu</label>
                            <select name="type" id="type" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option value="kwotowy" {{ old('type') == 'kwotowy' ? 'selected' : '' }}>Kwotowy</option>
                                <option value="procentowy" {{ old('type') == 'procentowy' ? 'selected' : '' }}>Procentowy</option>
                            </select>
                            @error('type')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Wartość rabatu -->
                        <div class="mb-6">
                            <label for="value" class="block mb-2 text-sm font-medium text-gray-900">Wartość rabatu</label>
                            <input value="{{ old('value') }}" type="number" name="value" id="value" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Wprowadź wartość rabatu" required>
                            @error('value')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Przyciski -->
                        <button type="submit" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">
                            <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                        </button>
                        <a href="{{ route('dashboard.shop.discount') }}" class="text-red-500 hover:text-white border border-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            <i class="fa-solid fa-x mr-2"></i>Anuluj
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
