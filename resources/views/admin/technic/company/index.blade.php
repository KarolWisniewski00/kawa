<x-app-layout>
    <x-slot name="header">
        @include('admin.module.nav-technic')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-8">
            {{ __('Firma') }}
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
                            Firma
                        </h1>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table-fixed">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Typ
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Treść
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Edycja
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($elements as $element)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">
                                        {{$element->type}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$element->content}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('dashboard.technic.company.edit', $element->id) }}" class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>