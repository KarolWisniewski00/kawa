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
                            Tworzenie wpisu
                        </h1>
                        <a href="{{route('dashboard.blog')}}" type="button" class="h-10  mt-8  whitespace-nowrap inline-flex items-center px-4 py-2 bg-blue-300 dark:bg-blue-300 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-300 focus:bg-blue-700 dark:focus:bg-blue-300 active:bg-blue-900 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150"><i class="fa-solid fa-chevron-left me-2"></i>Powrót</span></a>
                    </div>
                    <form action="{{route('dashboard.blog.store.second')}}" method="POST">
                        @csrf
                        <!-- Add the "Show More" button below the existing code -->
                        <div class="mb-6">
                            <h3 class="mb-5 text-lg font-medium text-gray-900">Zdjęcie główne</h3>
                            <ul class="grid w-full gap-6 md:grid-cols-3" id="photoGrid">
                                <!-- The first 9 photos will be loaded initially, the rest will be hidden -->
                                @foreach($photos as $index => $photo)
                                <li class="{{ $index >= 9 ? 'hidden' : '' }}">
                                    <input required {{ old('photo') == $photo->getFilename() ? 'checked' : '' }} name="photo" type="radio" id="photo-{{ $photo->getFilename() }}" value="{{ $photo->getFilename() }}" class="hidden peer">
                                    <label for="photo-{{ $photo->getFilename() }}" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer  peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold"><img src="{{ asset('photo/' . $photo->getFilename()) }}" alt=""></div>
                                        </div>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                            <!-- "Show More" button -->
                            <button id="showMoreBtn" type="button" class="h-10  mt-8  whitespace-nowrap inline-flex items-center px-4 py-2 bg-blue-300 dark:bg-blue-300 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-300 focus:bg-blue-700 dark:focus:bg-blue-300 active:bg-blue-900 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150"><i class="fa-solid fa-caret-down mr-2"></i>Pokaż więcej</button>
                            @error('photo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <script>
                            $(document).ready(function() {
                                // Set the initial count of visible photos
                                let visiblePhotoCount = 9;

                                // Show additional photos when the "Show More" button is clicked
                                $("#showMoreBtn").on("click", function() {
                                    // Get all the hidden photos
                                    const hiddenPhotos = $("#photoGrid li:hidden");

                                    // Calculate the end index for displaying the next 9 photos
                                    const endIndex = visiblePhotoCount + 9;

                                    // Show the next 9 photos
                                    hiddenPhotos.slice(visiblePhotoCount, endIndex).removeClass("hidden");

                                    // Update the visiblePhotoCount for the next click
                                    visiblePhotoCount = endIndex;
                                    console.log(hiddenPhotos.length)
                                    // Hide the "Show More" button if all photos are displayed
                                    if (hiddenPhotos.length - 9 - 9 <= 9) {
                                        $(this).hide();
                                    }
                                });
                            });
                        </script>
                        <div class="mb-6">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Tytuł</label>
                            <input value="{{ old('title') ? old('title') : ''}}" name="title" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Brazil Santos" required>
                            @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="start" class="block mb-2 text-sm font-medium text-gray-900 ">Wstęp</label>
                            <textarea required id="start" name="start" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Wpisz treść tutaj">{{ old('start') ? old('start') : ''}}</textarea>
                            @error('start')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Add the "Show More" button below the existing code -->
                        <div class="mb-6">
                            <h3 class="mb-5 text-lg font-medium text-gray-900">Zdjęcie pierwsze</h3>
                            <ul class="grid w-full gap-6 md:grid-cols-3" id="photoGrid1">
                                <!-- The first 9 photos will be loaded initially, the rest will be hidden -->
                                @foreach($photos as $index => $photo)
                                <li class="{{ $index >= 9 ? 'hidden' : '' }}">
                                    <input {{ old('photo1') == $photo->getFilename() ? 'checked' : '' }} name="photo1" type="radio" id="photo1-{{ $photo->getFilename() }}" value="{{ $photo->getFilename() }}" class="hidden peer">
                                    <label for="photo1-{{ $photo->getFilename() }}" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer  peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold"><img src="{{ asset('photo/' . $photo->getFilename()) }}" alt=""></div>
                                        </div>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                            <!-- "Show More" button -->
                            <button id="showMoreBtn1" type="button" class="h-10  mt-8  whitespace-nowrap inline-flex items-center px-4 py-2 bg-blue-300 dark:bg-blue-300 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-300 focus:bg-blue-700 dark:focus:bg-blue-300 active:bg-blue-900 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150"><i class="fa-solid fa-caret-down mr-2"></i>Pokaż więcej</button>
                            @error('photo1')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <script>
                            $(document).ready(function() {
                                // Set the initial count of visible photos
                                let visiblePhotoCount = 9;

                                // Show additional photos when the "Show More" button is clicked
                                $("#showMoreBtn1").on("click", function() {
                                    // Get all the hidden photos
                                    const hiddenPhotos = $("#photoGrid1 li:hidden");

                                    // Calculate the end index for displaying the next 9 photos
                                    const endIndex = visiblePhotoCount + 9;

                                    // Show the next 9 photos
                                    hiddenPhotos.slice(visiblePhotoCount, endIndex).removeClass("hidden");

                                    // Update the visiblePhotoCount for the next click
                                    visiblePhotoCount = endIndex;
                                    console.log(hiddenPhotos.length)
                                    // Hide the "Show More" button if all photos are displayed
                                    if (hiddenPhotos.length - 9 - 9 <= 9) {
                                        $(this).hide();
                                    }
                                });
                            });
                        </script>
                        <div class="mb-6">
                            <label for="content_text_1" class="block mb-2 text-sm font-medium text-gray-900 ">H3 - Podtytuł - górne pomiędzy zdjęciami</label>
                            <textarea id="content_text_1" name="content_text_1" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Wpisz treść tutaj">{{ old('content_text_1') ? old('content_text_1') : ''}}</textarea>
                            @error('content_text_1')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="content_text_2" class="block mb-2 text-sm font-medium text-gray-900 ">p - Opis - górne pomiędzy zdjęciami</label>
                            <textarea id="content_text_2" name="content_text_2" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Wpisz treść tutaj">{{ old('content_text_2') ? old('content_text_2') : ''}}</textarea>
                            @error('content_text_2')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="content_text_3" class="block mb-2 text-sm font-medium text-gray-900 ">H3 - Podtytuł - dolne pomiędzy zdjęciami</label>
                            <textarea id="content_text_3" name="content_text_3" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Wpisz treść tutaj">{{ old('content_text_3') ? old('content_text_3') : ''}}</textarea>
                            @error('content_text_3')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="content_text_4" class="block mb-2 text-sm font-medium text-gray-900 ">p - Opis - dolne pomiędzy zdjęciami</label>
                            <textarea id="content_text_4" name="content_text_4" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Wpisz treść tutaj">{{ old('content_text_4') ? old('content_text_4') : ''}}</textarea>
                            @error('content_text_4')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Add the "Show More" button below the existing code -->
                        <div class="mb-6">
                            <h3 class="mb-5 text-lg font-medium text-gray-900">Zdjęcie drugie</h3>
                            <ul class="grid w-full gap-6 md:grid-cols-3" id="photoGrid2">
                                <!-- The first 9 photos will be loaded initially, the rest will be hidden -->
                                @foreach($photos as $index => $photo)
                                <li class="{{ $index >= 9 ? 'hidden' : '' }}">
                                    <input {{ old('photo2') == $photo->getFilename() ? 'checked' : '' }} name="photo2" type="radio" id="photo2-{{ $photo->getFilename() }}" value="{{ $photo->getFilename() }}" class="hidden peer">
                                    <label for="photo2-{{ $photo->getFilename() }}" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer  peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold"><img src="{{ asset('photo/' . $photo->getFilename()) }}" alt=""></div>
                                        </div>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                            <!-- "Show More" button -->
                            <button id="showMoreBtn2" type="button" class="h-10  mt-8  whitespace-nowrap inline-flex items-center px-4 py-2 bg-blue-300 dark:bg-blue-300 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-300 focus:bg-blue-700 dark:focus:bg-blue-300 active:bg-blue-900 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150"><i class="fa-solid fa-caret-down mr-2"></i>Pokaż więcej</button>
                            @error('photo2')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <script>
                            $(document).ready(function() {
                                // Set the initial count of visible photos
                                let visiblePhotoCount = 9;

                                // Show additional photos when the "Show More" button is clicked
                                $("#showMoreBtn2").on("click", function() {
                                    // Get all the hidden photos
                                    const hiddenPhotos = $("#photoGrid2 li:hidden");

                                    // Calculate the end index for displaying the next 9 photos
                                    const endIndex = visiblePhotoCount + 9;

                                    // Show the next 9 photos
                                    hiddenPhotos.slice(visiblePhotoCount, endIndex).removeClass("hidden");

                                    // Update the visiblePhotoCount for the next click
                                    visiblePhotoCount = endIndex;
                                    console.log(hiddenPhotos.length)
                                    // Hide the "Show More" button if all photos are displayed
                                    if (hiddenPhotos.length - 9 - 9 <= 9) {
                                        $(this).hide();
                                    }
                                });
                            });
                        </script>
                        <div class="mb-6">
                            <label for="content_text_5" class="block mb-2 text-sm font-medium text-gray-900 ">H3 - Podtytuł - górne pod zdjęciami</label>
                            <textarea id="content_text_5" name="content_text_5" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Wpisz treść tutaj">{{ old('content_text_5') ? old('content_text_5') : ''}}</textarea>
                            @error('content_text_5')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="content_text_6" class="block mb-2 text-sm font-medium text-gray-900 ">p - Opis - górne pod zdjęciami</label>
                            <textarea id="content_text_6" name="content_text_6" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Wpisz treść tutaj">{{ old('content_text_6') ? old('content_text_6') : ''}}</textarea>
                            @error('content_text_6')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="content_text_7" class="block mb-2 text-sm font-medium text-gray-900 ">H3 - Podtytuł - dolne pod zdjęciami</label>
                            <textarea id="content_text_7" name="content_text_7" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Wpisz treść tutaj">{{ old('content_text_7') ? old('content_text_7') : ''}}</textarea>
                            @error('content_text_7')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="content_text_8" class="block mb-2 text-sm font-medium text-gray-900 ">p - Opis - dolne pod zdjęciami</label>
                            <textarea id="content_text_8" name="content_text_8" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Wpisz treść tutaj">{{ old('content_text_8') ? old('content_text_8') : ''}}</textarea>
                            @error('content_text_8')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="end" class="block mb-2 text-sm font-medium text-gray-900 ">Zakończenie</label>
                            <textarea id="end" required name="end" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Wpisz treść tutaj">{{ old('end') ? old('end') : ''}}</textarea>
                            @error('end')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="number" class="block mb-2 text-sm font-medium text-gray-900 ">Kolejność</label>
                            <input value="{{ old('order') ? old('order') : 0}}" name="order" type="number" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="0" required>
                            @error('order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="visibility_on_website" value="1" class="sr-only peer" {{ old('visibility_on_website') ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                <span class="ml-3 text-sm font-medium text-gray-900">Widoczność na stronie</span>
                            </label>
                        </div>
                        @error('visibility_on_website')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <div class="mb-6">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">SEO Keywards</label>
                            <input value="{{ old('seo_keywards') ? old('seo_keywards') : ''}}" type="text" name="seo_keywards" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Wysokiej jakości kawa z Brazylii" required>
                            @error('seo_keywards')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        @error('visibility_in_google')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        Jeśli po kliknięciu zapisz nic sie nie dzieje, upewnij się że wybrałeś zdjęcie główne bo jest wymagane<br>

                        <button type="submit" class="h-10 whitespace-nowrap inline-flex items-center px-4 py-2 bg-green-300 dark:bg-green-300 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-300 focus:bg-green-700 dark:focus:bg-green-300 active:bg-green-900 dark:active:bg-green-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                            <i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz
                        </button>
                        <a href="{{route('dashboard.blog')}}" class="h-10 whitespace-nowrap inline-flex items-center px-4 py-2 bg-red-300 dark:bg-red-300 border border-transparent rounded-lg font-semibold text-sm text-white dark:text-gray-900 uppercase tracking-widest hover:bg-green-700 dark:hover:bg-red-300 focus:bg-red-700 dark:focus:bg-red-300 active:bg-red-900 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150">
                            <i class="fa-solid fa-x mr-2"></i>Anuluj
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>