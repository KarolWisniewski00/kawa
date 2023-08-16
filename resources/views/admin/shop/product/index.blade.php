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
                            Wszystkie produkty
                        </h1>
                        <a href="{{route('dashboard.shop.product.create')}}" class="inline-flex items-center justify-center w-10 h-10 mr-2 text-green-100 transition-colors duration-150 bg-green-500 rounded-full focus:shadow-outline hover:bg-green-600">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table-fixed">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Zdjęcie
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nazwa
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Wyświetlenia
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        W Koszyku
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Sprzedanych
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Cena
                                    </th>
                                    <!--
                                    <th scope="col" class="px-6 py-3">
                                        Podgląd
                                    </th>
-->
                                    <th scope="col" class="px-6 py-3">
                                        Edycja
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Usuwanie
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @foreach($photos as $photo)
                                        @if($photo->product_id == $product->id)
                                        @if($photo->order == 1)
                                        <img src="{{ asset('photo/' . $photo->image_path) }}" alt="" class="img-fluid" height="48px" width="48px" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                                        @endif
                                        @endif
                                        @endforeach
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$product->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$product->view}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$product->busket}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$product->sell}}
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                        $minPrice = null;
                                        $maxPrice = null;
                                        @endphp

                                        @foreach($variants as $variant)
                                        @if($variant->product_id == $product->id && $variant->size_id != null)
                                        @php
                                        // Sprawdź minimalną cenę
                                        if ($minPrice === null || $variant->price < $minPrice) { $minPrice=$variant->price;
                                            }

                                            // Sprawdź maksymalną cenę
                                            if ($maxPrice === null || $variant->price > $maxPrice) {
                                            $maxPrice = $variant->price;
                                            }
                                            @endphp
                                            @endif
                                            @endforeach

                                            @if($minPrice !== null && $maxPrice !== null)
                                            {{$minPrice}} PLN - {{$maxPrice}} PLN
                                            @else
                                            Brak dostępnych cen.
                                            @endif
                                    </td>
                                    <!--
                                    <td class="px-6 py-4">
                                        <button type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-600 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"><i class="fa-solid fa-eye"></i></button>
                                    </td>
                                        -->
                                    <td class="px-6 py-4">
                                        <a href="{{ route('dashboard.shop.product.edit', $product->id) }}" class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('dashboard.shop.product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć ten produkt?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-white border border-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="px-4 py-2">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>