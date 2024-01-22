<x-app-layout>
    <x-slot name="header">
        @include('admin.module.nav-technic')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-8">
            {{ __('Wersje') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    @include('admin.module.alerts')

                    <ol class="relative border-s border-gray-200 dark:border-gray-700">
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Wrzesień 2023 V 1.0.0</time>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Stworzenie Projektu</h3>
                            <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Początek witryny w google</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Listopad 2023 V 1.0.1</time>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Dodanie bramki płatniczej, historii zmian zamówienia, fakturowania, poprawy wyglądu maili, widok kontroli wersji, dodanie satatusu przelewy24, dodanie kolorystyki w podsumowaniu zamówień, dodanie wyświetlania daty utworzenia i edycji zamówienia, dodanie możliwości anulowania zamówienia ze strony klienta dodanie kwasowości stopnia wypalenia wysokości upraw i intensywnosci smaku do produktów, logowanie przez google, pokazywanie produktów na scrolla</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Styczeń 2024 V 1.0.2</time>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">1. Zmiana daty w stopce z 2023 na automatyczne pobieranie względem czasu rzeczywistego</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">2. Zmiana maksymalnej ilości dodawania produktu do koszyka z 10 do 35</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">3. Dodanie przycisku kontynuuj zakupy oraz przycisku "x" w prawym górnym rogu koszyka</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">4. Dodanie przycisku pod napisami sekcji (sklep, o nas, blog, instagram) na stronie głównej - maksymalnie jak to możliwe</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">5. Dodanie wyboru typu adresu kurier lub paczkomat w momencie składania zamówienia</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">6. Dodanie zapisu w zamówieniu rezultatu utworzenia faktury</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">7. Dodanie przycisku ponawiającego utworzenie faktury w systemie</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">8. Poprawa wysyłania zdublikowanych maili potwierdzających zamówienie</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">9. Dodano podgląd trybu jasno-ciemno <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="{{route('dark')}}">zobacz</a>. Zastosowano tryb automatyczny który pobiera tryb systemowy użytkownika. Nie wszystkie kolory działają względem oczekiwań.</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Styczeń 2024 V 1.0.3</time>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">1. Naprawa fakturowania</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">2. Naprawa pokazywania zdjęć produktów</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">3. Dodanie kodu pocztowego w szczegółach zamówienia</p>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>