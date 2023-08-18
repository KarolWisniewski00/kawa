<div class="flex justify-between h-16">
    <div class="flex">
        <!-- Navigation Links -->
        <div class="space-x-8 -my-px flex">
            <x-nav-link href="{{ route('dashboard.technic.rule') }}" :active="Str::startsWith(request()->path(), 'dashboard/technic/rule')">
                {{ __('Regulamin') }}
            </x-nav-link>
        </div>
        <div class="space-x-8 -my-px ml-10 flex">
            <x-nav-link  href="{{ route('dashboard.technic.priv') }}" :active="Str::startsWith(request()->path(), 'dashboard/technic/priv')">
                {{ __('Polityka prywatności') }}
            </x-nav-link>
        </div>
        <div class="space-x-8 -my-px ml-10 flex">
            <x-nav-link  href="{{ route('dashboard.technic.cookies') }}" :active="Str::startsWith(request()->path(), 'dashboard/technic/cookies')">
                {{ __('Polityka cookies') }}
            </x-nav-link>
        </div>
        <div class="space-x-8 -my-px ml-10 flex">
            <x-nav-link  href="{{ route('dashboard.technic.info') }}" :active="Str::startsWith(request()->path(), 'dashboard/technic/info')">
                {{ __('Informacje wysyłkowe') }}
            </x-nav-link>
        </div>
        <div class="space-x-8 -my-px ml-10 flex">
            <x-nav-link href="{{ route('dashboard.technic.instagram') }}" :active="Str::startsWith(request()->path(), 'dashboard/technic/instagram')">
                {{ __('Instagram') }}
            </x-nav-link>
        </div>
        <div class="space-x-8 -my-px ml-10 flex">
            <x-nav-link  href="{{ route('dashboard.technic.company') }}" :active="Str::startsWith(request()->path(), 'dashboard/technic/company')">
                {{ __('Ustawienia') }}
            </x-nav-link>
        </div>
    </div>
</div>