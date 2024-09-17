<x-app-layout>
    <x-slot name="header">
        @include('admin.module.nav-shop')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-8">
            {{ __('Produkty') }}
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
                            Wszystkie kody rabatowe
                        </h1>
                        <a href="{{ route('dashboard.shop.discount.create') }}" class="inline-flex items-center justify-center w-10 h-10 mr-2 text-green-100 transition-colors duration-150 bg-green-500 rounded-full focus:shadow-outline hover:bg-green-600">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Kod
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Typ
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Wartość
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Usuwanie
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($discounts as $discount)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4">
                                            {{ $discount->code }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ ucfirst($discount->type) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $discount->value }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <form action="{{ route('dashboard.shop.discount.delete', $discount->id) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć ten kod?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-white border border-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="px-4 py-2">
                            <!-- Jeśli jest paginacja, dodaj ją tutaj -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
