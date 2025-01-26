<x-app-layout>
    <x-slot name="header">
        @include('admin.module.nav-shop')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-8">
            {{ __('Kategorie') }}
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
                            Wszystkie kategorie
                        </h1>
                        <a href="{{route('dashboard.shop.category.create')}}" class="inline-flex items-center justify-center w-10 h-10 mr-2 text-green-100 transition-colors duration-150 bg-green-500 rounded-full focus:shadow-outline hover:bg-green-600">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nazwa
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Opis
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Edycja
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Usuwanie
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                @if($category->parent_id == null)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        {{$category->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$category->description}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{route('dashboard.shop.category.edit', $category)}}" class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('dashboard.shop.category.delete', $category->id) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć ten rozmiar opakowania?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-white border border-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                @foreach($categories as $cat)
                                @if($cat->parent_id == $category->id)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                    <i class="fa-solid fa-arrow-right me-2"></i>{{$cat->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$cat->description}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{route('dashboard.shop.category.edit', $cat)}}" class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('dashboard.shop.category.delete', $cat->id) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć ten rozmiar opakowania?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-white border border-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                @foreach($categories as $c)
                                @if($c->parent_id == $cat->id)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                    <i class="fa-solid fa-arrow-right me-2"></i><i class="fa-solid fa-arrow-right me-2"></i>{{$c->name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$c->description}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{route('dashboard.shop.category.edit', $c)}}" class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('dashboard.shop.category.delete', $c->id) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć ten rozmiar opakowania?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-white border border-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endif
                                @endforeach
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div class="px-4 py-2">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>