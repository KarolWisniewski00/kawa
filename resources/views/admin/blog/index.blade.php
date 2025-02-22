<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-8">
            {{ __('Blog') }}
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
                            Wszystkie wpisy
                        </h1>
                        <a href="{{route('dashboard.blog.create')}}" class="h-10 whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                            <i class="fa-solid fa-plus mr-2"></i>NOWA WPIS KRÓTKI
                        </a>
                        <a href="{{route('dashboard.blog.create.second')}}" class="h-10 whitespace-nowrap inline-flex items-center px-4 py-2 bg-emerald-300 dark:bg-emerald-300 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-emerald-700 dark:hover:bg-emerald-300 focus:bg-emerald-700 dark:focus:bg-emerald-300 active:bg-emerald-900 dark:active:bg-emerald-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-emerald-800 transition ease-in-out duration-150">
                            <i class="fa-solid fa-plus mr-2"></i>NOWA WPIS DŁUGI
                        </a>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Zdjęcie
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        tytuł
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Data
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Motyw
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
                                @foreach($blogs as $blog)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        <img src="{{ asset('photo/' . $blog->photo) }}" alt="" class="img-fluid" height="48px" width="48px" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$blog->title}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$blog->created_at}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$blog->type}}
                                    </td>
                                    @if($blog->type == null)
                                    <td class="px-6 py-4">
                                        <a href="{{ route('dashboard.blog.edit', $blog->id) }}" class="h-10  mt-8  whitespace-nowrap inline-flex items-center px-4 py-2 bg-blue-300 dark:bg-blue-300 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-300 focus:bg-blue-700 dark:focus:bg-blue-300 active:bg-blue-900 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150">
                                            <i class="fa-solid fa-pen-to-square mr-2"></i>EDYTUJ WPIS KRÓTKI
                                        </a>
                                    </td>
                                    @else
                                    <td class="px-6 py-4">
                                        <a href="{{ route('dashboard.blog.edit.second', $blog->id) }}" class="h-10 whitespace-nowrap inline-flex items-center px-4 py-2 bg-violet-300 dark:bg-violet-300 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-violet-700 dark:hover:bg-violet-300 focus:bg-violet-700 dark:focus:bg-violet-300 active:bg-violet-900 dark:active:bg-violet-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-violet-800 transition ease-in-out duration-150">
                                            <i class="fa-solid fa-pen-to-square mr-2"></i>EDYTUJ WPIS DŁUGI
                                        </a>
                                    </td>
                                    @endif
                                    <td class="px-6 py-4">
                                        <form action="{{ route('dashboard.blog.delete', $blog->id) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć ten wpis?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="h-10 whitespace-nowrap inline-flex items-center px-4 py-2 bg-red-300 dark:bg-red-300 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-red-300 focus:bg-red-700 dark:focus:bg-red-300 active:bg-red-900 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="px-4 py-2">
                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>