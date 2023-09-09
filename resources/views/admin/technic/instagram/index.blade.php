<x-app-layout>
    <x-slot name="header">
        @include('admin.module.nav-technic')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-8">
            {{ __('Instagram') }}
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
                            Instagram
                        </h1>
                        <a href="{{ route('dashboard.technic.instagram.create') }}" class="inline-flex items-center justify-center w-10 h-10 mr-2 text-green-100 transition-colors duration-150 bg-green-500 rounded-full focus:shadow-outline hover:bg-green-600">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>
                    <div class="grid grid-cols-4 gap-4">
                        @foreach($instagrams as $i)
                        <div class="flex flex-col text-center">

                            <img alt="gallery" class="block h-full w-full rounded-lg object-cover object-center" src="{{asset('photo/'.$i->photo)}}" />

                            <div class="flex flex-col xl:flex-row h-fit">
                                <div class="mx-auto pt-1 xl:py-2">
                                    <a href="{{$i->url}}" class="m-2 flex py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-600 focus:z-10 focus:ring-4 focus:ring-gray-200"><i class="fa-solid fa-eye"></i></a>
                                </div>
                                <div class="mx-auto pt-1 xl:py-2">
                                    <a href="{{route('dashboard.technic.instagram.edit', $i->id)}}" class="flex m-2 text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                </div>
                                <div class="mx-auto pt-1 xl:py-2">
                                    <form action="{{ route('dashboard.technic.instagram.delete', $i->id) }}" method="POST">
                                        <button type="submit" onclick="return confirm('Czy na pewno chcesz usunąć to zdjęcie?');" class="m-2 text-red-500 hover:text-white border border-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><i class="fa-solid fa-trash"></i></button>
                                        @method('delete')
                                        @csrf
                                    </form>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>