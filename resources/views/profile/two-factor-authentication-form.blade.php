<x-action-section>
    <x-slot name="title">
        Logowanie dwuskładnikowe
    </x-slot>

    <x-slot name="description">
        Dodaj dodatkowe zabezpieczenia do swojego konta za pomocą uwierzytelniania dwuskładnikowego.
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900">
            @if ($this->enabled)
            @if ($showingConfirmation)
            Zakończ działanie uwierzytelniania dwuskładnikowego.
            @else
            Włączyłeś uwierzytelnianie dwuetapowe.
            @endif
            @else
            Nie włączyłeś uwierzytelniania dwuskładnikowego.
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600">
            <p>Gdy włączone jest uwierzytelnianie dwuskładnikowe, podczas uwierzytelniania zostanie wyświetlony monit o podanie bezpiecznego, losowego tokena. Możesz pobrać ten token z aplikacji Google Authenticator w telefonie.</p>
        </div>

        @if ($this->enabled)
        @if ($showingQrCode)
        <div class="mt-4 max-w-xl text-sm text-gray-600">
            <p class="font-semibold">
                @if ($showingConfirmation)
                Aby zakończyć włączanie uwierzytelniania dwuskładnikowego, zeskanuj następujący kod QR za pomocą aplikacji uwierzytelniającej w telefonie lub wprowadź klucz konfiguracji i podaj wygenerowany kod OTP.
                @else
                Uwierzytelnianie dwuskładnikowe jest teraz włączone. Zeskanuj następujący kod QR za pomocą aplikacji uwierzytelniającej w telefonie lub wprowadź klucz konfiguracji.
                @endif
            </p>
        </div>

        <div class="mt-4 p-2 inline-block bg-white">
            {!! $this->user->twoFactorQrCodeSvg() !!}
        </div>

        <div class="mt-4 max-w-xl text-sm text-gray-600">
            <p class="font-semibold">
                {{ __('Setup Key') }}: {{ decrypt($this->user->two_factor_secret) }}
            </p>
        </div>

        @if ($showingConfirmation)
        <div class="mt-4">
            <x-label for="code" value="{{ __('Code') }}" />

            <x-input id="code" type="text" name="code" class="block mt-1 w-1/2" inputmode="numeric" autofocus autocomplete="one-time-code" wire:model.defer="code" wire:keydown.enter="confirmTwoFactorAuthentication" />

            <x-input-error for="code" class="mt-2" />
        </div>
        @endif
        @endif

        @if ($showingRecoveryCodes)
        <div class="mt-4 max-w-xl text-sm text-gray-600">
            <p class="font-semibold">Przechowuj te kody odzyskiwania w bezpiecznym menedżerze haseł. Można ich użyć do odzyskania dostępu do konta w przypadku utraty urządzenia do uwierzytelniania dwuskładnikowego.</p>
        </div>

        <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
            @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
            <div>{{ $code }}</div>
            @endforeach
        </div>
        @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
            <x-confirms-password wire:then="enableTwoFactorAuthentication">
                <x-button type="button" wire:loading.attr="disabled">
                    Włącz
                </x-button>
            </x-confirms-password>
            @else
            @if ($showingRecoveryCodes)
            <x-confirms-password wire:then="regenerateRecoveryCodes">
                <x-secondary-button class="mr-3">
                    Odnów kod odzyskiwania
                </x-secondary-button>
            </x-confirms-password>
            @elseif ($showingConfirmation)
            <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                <x-button type="button" class="mr-3" wire:loading.attr="disabled">
                    Zatwierdź
                </x-button>
            </x-confirms-password>
            @else
            <x-confirms-password wire:then="showRecoveryCodes">
                <x-secondary-button class="mr-3">
                    Pokaż kod odzyskiwania
                </x-secondary-button>
            </x-confirms-password>
            @endif

            @if ($showingConfirmation)
            <x-confirms-password wire:then="disableTwoFactorAuthentication">
                <x-secondary-button wire:loading.attr="disabled">
                    Anuluj
                </x-secondary-button>
            </x-confirms-password>
            @else
            <x-confirms-password wire:then="disableTwoFactorAuthentication">
                <x-danger-button wire:loading.attr="disabled">
                    Wyłącz
                </x-danger-button>
            </x-confirms-password>
            @endif

            @endif
        </div>
    </x-slot>
</x-action-section>