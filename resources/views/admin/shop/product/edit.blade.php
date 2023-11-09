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
                            Edycja Produktu
                        </h1>
                        <a href="{{route('dashboard.shop.product')}}" type="button" class="mt-8 mb-4 text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none"><i class="fa-solid fa-chevron-left me-2"></i>Powrót</span></a>
                    </div>
                    <form action="{{route('dashboard.shop.product.update', $product->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-6">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Nazwa</label>
                            <input value="{{ old('name', $product->name) }}" name="name" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Brazil Santos" required>
                            @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Opis</label>
                            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Wpisz treść tutaj">{{ old('description') ? old('description') : $product->description}}</textarea>
                            @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="number" class="block mb-2 text-sm font-medium text-gray-900 ">Kolejność</label>
                            <input value="{{ old('order', $product->order) }}" name="order" type="number" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="0" required>
                            @error('order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="visibility_on_website" value="1" class="sr-only peer" {{ old('visibility_on_website', $product->visibility_on_website) ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900">Widoczność na stronie</span>
                        </label>
                        @error('visibility_on_website')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <div class="mb-6">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">SEO Tytuł</label>
                            <input value="{{ old('order', $product->seo_title) }}" type="text" name="seo_title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Brazil Santos" required>
                            @error('seo_title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">SEO Opis</label>
                            <input value="{{ old('seo_description', $product->seo_description) }}" type="text" name="seo_description" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Wysokiej jakości kawa z Brazylii" required>
                            @error('seo_description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input name="visibility_in_google" type="checkbox" value="1" class="sr-only peer" {{ old('visibility_in_google', $product->visibility_in_google) ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            <span class="ml-3 text-sm font-medium text-gray-900">Widoczność w google</span>
                        </label>
                        @error('visibility_in_google')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <div class="mb-6">

                            <h3 class="mb-5 text-lg font-medium text-gray-900 ">Rozmiar opakowania</h3>
                            <ul class="grid w-full gap-6 md:grid-cols-3">
                                @foreach($sizes as $size)
                                <li>
                                    <label for="size-{{$size->id}}" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">{{$size->name}}</div>
                                            <div class="mb-6">
                                                <label for="number" class="block mb-2 text-sm font-medium text-gray-900 ">Cena</label>
                                                @php
                                                $input=false
                                                @endphp
                                                @foreach($productSizes as $productSize)
                                                @if($productSize->product_id == $product->id)
                                                @if($productSize->size_id == $size->id)
                                                <input value="{{ in_array($productSize->price, old('price', $productSizes->pluck('price')->toArray())) ? $productSize->price : '' }}" name="price[]" type="number" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                                @php
                                                $input=true
                                                @endphp
                                                @endif
                                                @endif
                                                @endforeach
                                                @if($input == false)
                                                <input name="price[]" type="number" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                                @endif
                                                @error('price')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                            @error('size')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">

                            <h3 class="mb-5 text-lg font-medium text-gray-900 ">Rozmiar mielenia</h3>
                            <ul class="grid w-full gap-6 md:grid-cols-3">
                                @foreach($grindTypes as $grindType)
                                <li>
                                    <input {{ in_array($grindType->id, old('grind', $productGrinds->pluck('grinding_id')->toArray())) ? 'checked' : '' }} name="grind[]" type="checkbox" id="grind-{{$grindType->id}}" value="{{$grindType->id}}" class="hidden peer">
                                    <label for="grind-{{$grindType->id}}" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold">{{$grindType->name}}</div>
                                        </div>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                            @error('grind')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col items-center mb-6">
                            <h3 class="mb-5 text-lg font-medium text-gray-900 ">Dodatkowe informacje</h3>
                            <div class="mb-6">
                                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Wysokość m n.p.m.</label>
                                <input value="{{ old('height', $product->height) }}" type="number" name="height" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Wysokość upraw" required>
                                @error('height')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <h5 class="mb-5 text-lg font-medium text-gray-900 ">Stopień wypalenia</h5>
                            <ul class="grid w-full gap-6 grid-cols-4 my-2">
                                <li>
                                    <input @if(old('coffee')==1) checked @elseif($product->coffee == 1) checked @endif name="coffee" type="radio" id="coffee-1" value="1" class="hidden peer">
                                    <label for="coffee-1" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                        <div class="block mx-auto">

                                            <img alt="" class="h-auto" style="width: 70px;" src="{{asset('image/coffee_bean_empty.svg')}}">

                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input @if(old('coffee')==2) checked @elseif($product->coffee == 2) checked @endif name="coffee" type="radio" id="coffee-2" value="2" class="hidden peer">
                                    <label for="coffee-2" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                        <div class="block mx-auto">
                                            <img alt="" class="h-auto" style="width: 70px;" src="{{asset('image/coffee_bean_empty.svg')}}">
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input @if(old('coffee')==3) checked @elseif($product->coffee == 3) checked @endif name="coffee" type="radio" id="coffee-3" value="3" class="hidden peer">
                                    <label for="coffee-3" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                        <div class="block mx-auto">
                                            <img alt="" class="h-auto" style="width: 70px;" src="{{asset('image/coffee_bean_empty.svg')}}">
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input @if(old('coffee')==4) checked @elseif($product->coffee == 4) checked @endif name="coffee" type="radio" id="coffee-4" value="4" class="hidden peer">
                                    <label for="coffee-4" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                        <div class="block mx-auto">
                                            <img alt="" class="h-auto" style="width: 70px;" src="{{asset('image/coffee_bean_empty.svg')}}">
                                        </div>
                                    </label>
                                </li>
                            </ul>
                            @error('coffee')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <h5 class="mb-5 text-lg font-medium text-gray-900 ">Intensywność smaku</h5>
                            <ul class="grid w-full gap-6 grid-cols-4 my-2">
                                <li>
                                    <input @if(old('tool')==1) checked @elseif($product->tool == 1) checked @endif name="tool" type="radio" id="tool-1" value="1" class="hidden peer">
                                    <label for="tool-1" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                        <div class="block mx-auto">

                                            <img alt="" class="h-auto" style="width: 70px;" src="{{asset('image/tool_bean_empty.svg')}}">

                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input @if(old('tool')==2) checked @elseif($product->tool == 2) checked @endif name="tool" type="radio" id="tool-2" value="2" class="hidden peer">
                                    <label for="tool-2" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                        <div class="block mx-auto">
                                            <img alt="" class="h-auto" style="width: 70px;" src="{{asset('image/tool_bean_empty.svg')}}">
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input @if(old('tool')==3) checked @elseif($product->tool == 3) checked @endif name="tool" type="radio" id="tool-3" value="3" class="hidden peer">
                                    <label for="tool-3" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                        <div class="block mx-auto">
                                            <img alt="" class="h-auto" style="width: 70px;" src="{{asset('image/tool_bean_empty.svg')}}">
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input @if(old('tool')==4) checked @elseif($product->tool == 4) checked @endif name="tool" type="radio" id="tool-4" value="4" class="hidden peer">
                                    <label for="tool-4" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                        <div class="block mx-auto">
                                            <img alt="" class="h-auto" style="width: 70px;" src="{{asset('image/tool_bean_empty.svg')}}">
                                        </div>
                                    </label>
                                </li>
                            </ul>
                            @error('tool')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <h5 class="mb-5 text-lg font-medium text-gray-900 ">Kwasowość</h5>
                            <ul class="grid w-full gap-6 grid-cols-4 my-2">
                                <li>
                                    <input @if(old('lemon')==1) checked @elseif($product->lemon == 1) checked @endif name="lemon" type="radio" id="lemon-1" value="1" class="hidden peer">
                                    <label for="lemon-1" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                        <div class="block mx-auto">

                                            <img alt="" class="h-auto" style="width: 70px;" src="{{asset('image/lemon_bean_empty.svg')}}">

                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input @if(old('lemon')==2) checked @elseif($product->lemon == 2) checked @endif name="lemon" type="radio" id="lemon-2" value="2" class="hidden peer">
                                    <label for="lemon-2" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                        <div class="block mx-auto">
                                            <img alt="" class="h-auto" style="width: 70px;" src="{{asset('image/lemon_bean_empty.svg')}}">
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input @if(old('lemon')==3) checked @elseif($product->lemon == 3) checked @endif name="lemon" type="radio" id="lemon-3" value="3" class="hidden peer">
                                    <label for="lemon-3" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                        <div class="block mx-auto">
                                            <img alt="" class="h-auto" style="width: 70px;" src="{{asset('image/lemon_bean_empty.svg')}}">
                                        </div>
                                    </label>
                                </li>
                                <li>
                                    <input @if(old('lemon')==4) checked @elseif($product->lemon == 4) checked @endif name="lemon" type="radio" id="lemon-4" value="4" class="hidden peer">
                                    <label for="lemon-4" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                        <div class="block mx-auto">
                                            <img alt="" class="h-auto" style="width: 70px;" src="{{asset('image/lemon_bean_empty.svg')}}">
                                        </div>
                                    </label>
                                </li>
                            </ul>
                            @error('tool')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Add the "Show More" button below the existing code -->
                        <div class="mb-6">
                            <h3 class="mb-5 text-lg font-medium text-gray-900">Zdjęcie</h3>
                            <ul class="grid w-full gap-6 md:grid-cols-3" id="photoGrid">
                                <!-- The first 9 photos will be loaded initially, the rest will be hidden -->
                                @foreach($photos as $index => $photo)
                                <li class="{{ $index >= 9 ? 'hidden' : '' }}">
                                    <input @if(old('photo')==$photo->getFilename())
                                    checked
                                    @else
                                    {{ $productPhotos->image_path == $photo->getFilename() ? 'checked' : '' }}
                                    @endif name="photo" type="radio" id="photo-{{ $photo->getFilename() }}" value="{{ $photo->getFilename() }}" class="hidden peer">
                                    <label for="photo-{{ $photo->getFilename() }}" class="h-full inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600 peer-checked:text-gray-600 hover:bg-gray-50">
                                        <div class="block">
                                            <div class="w-full text-lg font-semibold"><img src="{{ asset('photo/' . $photo->getFilename()) }}" alt=""></div>
                                        </div>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                            <!-- "Show More" button -->
                            <button id="showMoreBtn" type="button" class="mt-8 text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none"><i class="fa-solid fa-caret-down mr-2"></i>Pokaż więcej</button>
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

                        <button type="submit" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2"><i class="fa-solid fa-floppy-disk mr-2"></i>Zapisz</button>
                        <a href="{{route('dashboard.shop.product')}}" class="text-red-500 hover:text-white border border-red-600 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i class="fa-solid fa-x mr-2"></i>Anuluj</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>