<x-app-layout>
    <x-slot name="header">
        @include('admin.module.nav-technic')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-8">
            {{ __('Ustawienia') }}
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
                            Ustawienia
                        </h1>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
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
                                @if($element->type == 'name_company')
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td colspan="3" class="px-6 py-4 font-bold text-xl text-center">
                                        Dane firmy wyświetlające się w zamówieniach
                                    </td>
                                </tr>
                                @endif
                                @if($element->type == 'info_top_website')
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td colspan="3" class="px-6 py-4 font-bold text-xl text-center">
                                        Dane techniczne
                                    </td>
                                </tr>
                                @endif
                                @if($element->type == 'adres_contact_page')
                                <tr class="bg-white border-b  hover:bg-gray-50 ">
                                    <td colspan="3" class="px-6 py-4 font-bold text-xl text-center">
                                        Dane podstrony kontakt
                                    </td>
                                </tr>
                                @endif
                                @if($element->type == 'hero_h1')
                                <tr class="bg-white border-b  hover:bg-gray-50 ">
                                    <td colspan="3" class="px-6 py-4 font-bold text-xl text-center">
                                        Dane strony głównej
                                    </td>
                                </tr>
                                @endif
                                @if($element->type == 'about_company_about_page')
                                <tr class="bg-white border-b  hover:bg-gray-50 ">
                                    <td colspan="3" class="px-6 py-4 font-bold text-xl text-center">
                                        Dane podstrony o nas (firma)
                                    </td>
                                </tr>
                                @endif
                                @if($element->type == 'collaboration_page')
                                <tr class="bg-white border-b  hover:bg-gray-50 ">
                                    <td colspan="3" class="px-6 py-4 font-bold text-xl text-center">
                                        Dane podstrony współpraca
                                    </td>
                                </tr>
                                @endif
                                <tr class="bg-white border-b  hover:bg-gray-50 ">
                                    <td class="px-6 py-4">
                                        {{$element->pl}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$element->content}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('dashboard.technic.company.edit', $element->id) }}" class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">
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