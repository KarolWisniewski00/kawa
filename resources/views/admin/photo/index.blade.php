<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zdjęcia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    @include('admin.module.alerts')
                    <x-application-logo class="block h-12 w-auto" />

                    <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                        Zdjęcia
                    </h1>
                    <form enctype="multipart/form-data" method="POST" action="{{ route('dashboard.photo.upload') }}" id="my-form" class="dropzone flex flex-row flex-wrap items-center h-auto justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                        @csrf
                        <div class="dz-message flex flex-col flex-wrap items-center justify-center pt-5 pb-6" data-dz-message>
                            <svg class="w-8 h-8 mb-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Kliknij aby dodać</span> lub przeciągnij i upuść</p>
                            <p class="text-xs text-gray-500 ">SVG, PNG, JPG lub GIF</p>
                        </div>
                    </form>
                    @if($photoFiles->isEmpty())
                    <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                        Brak zdjęcić do wyświetlenia
                    </h1>
                    @else
                    <h1 class="mt-8 mb-4 text-2xl font-medium text-gray-900">
                        Wszystkie zdjęcia
                    </h1>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500  table-auto overflow-auto">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Zdjęcie
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nazwa pliku
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Rozmiar
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Data
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Podgląd
                                    </th>
                                    <!--
                                    <th scope="col" class="px-6 py-3">
                                        Edycja
                                    </th>
                                    -->
                                    <th scope="col" class="px-6 py-3">
                                        Usuwanie
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($photoFiles as $photoFile)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        <img src="{{ asset('photo/' . $photoFile->getFilename()) }}" alt="" class="img-fluid" height="48px" width="48px" onerror="this.onerror=null; this.src=`{{ asset('image/undraw_photos_re_pvh3.svg') }}`;">
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $photoFile->getFilename() }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ number_format($photoFile->getSize() / (1024 * 1024), 2) }} MB
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ date('d.m.Y', $photoFile->getMTime()) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button type="button" onclick="showModal(`{{ asset('photo/' . $photoFile->getFilename()) }}`)" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-600 focus:z-10 focus:ring-4 focus:ring-gray-200"><i class="fa-solid fa-eye"></i></button>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('dashboard.photo.delete', ['slug' => basename($photoFile)]) }}" method="POST">
                                            <button type="submit" onclick="return confirm('Czy na pewno chcesz usunąć to zdjęcie?');" class="text-red-500 hover:text-white border border-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i class="fa-solid fa-trash"></i></button>
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="px-4 py-2">
                            {{ $photoFiles->links() }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<div id="modal" class="hidden fixed top-0 left-0 z-80 w-screen h-screen bg-black/70 flex justify-center items-center">

    <!-- The close button -->
    <a class="fixed z-90 top-6 right-8 text-white text-5xl font-bold" href="javascript:void(0)" onclick="closeModal()">&times;</a>

    <!-- A big image will be displayed here -->
    <img id="modal-img" class="max-w-[800px] max-h-[600px] max-w-full object-cover" />
</div>

<script>
    // Get the modal by id
    var modal = document.getElementById("modal");

    // Get the modal image tag
    var modalImg = document.getElementById("modal-img");

    // this function is called when a small image is clicked
    function showModal(src) {
        modal.classList.remove('hidden');
        modalImg.src = src;
        console.log(src)
    }

    // this function is called when the close button is clicked
    function closeModal() {
        modal.classList.add('hidden');
    }
</script>