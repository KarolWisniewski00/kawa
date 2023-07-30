<div class="flex justify-between h-16">
    <div class="flex">
        <!-- Navigation Links -->
        <div class="space-x-8 -my-px flex">
            <x-nav-link href="{{ route('dashboard.shop.size') }}" :active="Str::startsWith(request()->path(), 'dashboard/shop/size')">
                {{ __('Rozmiary opakowań') }}
            </x-nav-link>
        </div>
        <div class="space-x-8 -my-px ml-10 flex">
            <x-nav-link href="{{ route('dashboard.shop.product') }}" :active="Str::startsWith(request()->path(), 'dashboard/shop/product')">
                {{ __('Produkty') }}
            </x-nav-link>
        </div>
    </div>
</div>