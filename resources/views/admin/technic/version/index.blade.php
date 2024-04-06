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
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">6 kwiecień 2024 V 1.1.3</time>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">1. Naprawa fakturowni - tworzenie faktur przestało działać z uwagi na zmiany w samym systemie fakturownia. Zostały ustawione domyślne dane do generowania faktury - dane sprzedawcy. Błąd usunięty za pomocą usunięcia 4 linijek w requesie do API nazwa, adres, strona www, kontakt telefoniczny</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">2. Usunięcie kolumny "w koszyku" w liście produktów w panelu admina</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">3. Poprawiony przycisk dodawania w artykule</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">3. Dodany nowy artykuł</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">28 Luty 2024 V 1.1.2</time>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">1. Dodanie artukułu - Ile kawy mozna zrobić z 1kg</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">2. Przebudowa zamawiania na system krokowy z uwzględnieniem innych dnych faktury i innej osoby odbierającej</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">3. Poprawa wyglądu tak aby wszystkie produkty miały system krokowy</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">18 Luty 2024 V 1.1.1</time>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">1. Dodanie artukułu - Dlaczego kawa jest zdrowa?</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">2. Dodanie drugiego szablonu wpisu na bloga</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">3. Kilka dni temu zgłoszenie stron produktów ręcznie do Google</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">14 Luty 2024 V 1.1.0</time>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Zmiana pokazywania produktu na krokowy</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">1. Dodany komunikat w momencie skompletowania wyboru kawy</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">2. Dodane automatyczne przesunięcie ekranu do miejsca w którym jeszcze brakuje uzupełnienia, jeśli wszystko ok to prowadzi do przycisku "Dodaj do koszyka"</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">3. Dodanie słów kluczoywch "Kawa kraftowa " przed nazwą produktu</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">4. zmiana kolejności wyświetlania stopni wypalenia, wysokości upraw itp.. na komputerze wyświetla sie w dziurze która powstała przez zmianę na system krokowy</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">5. Po wyborze użytkownika zmiana koloru kropki krokowej (statusu) na udany</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">6. Po wyborze użytkownika rozmiaru opakowania czyli ceny - zakres cen na górze dynamicznie się zmienia według odpowiednie kwoty</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">7. usunięcie tymczasowego ustawienia wybranego rodzaju mielenia  - ziarnista</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">8. Dodanie animacji przycisków</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">11 Luty 2024 V 1.0.5</time>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">1. Zmiana kolejności historii aktualizacji, najnowsze u góry</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">2. Naprawa naliczania przesyłki - nie naliczało za przesyłkę tylko na stronie, poprawiono że i w bramce płatniczej i w fakturowni</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">3. W formularzu zamówienia należy podać pod pocztowy i zaznaczyć opcję "Jestem z Piły[...]" - inaczej koszt przesyłki będzie naliczony</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">4. Dodanie wykresu zamówień - inicjatywa administratora - bezpłatne</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Luty 2024 V 1.0.4</time>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">1. Naprawa fakturowania - Naprawa liczenia fakturownia nie przeliczała liości produktów z ceną, należało najpierw wymnożyć a poźniej wysłać dane</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">2. Naprawa pokazywania zdjęć produktów - w podsumowaniu produktu w panelu administratora</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">3. Naprawa notatek klienta w zamówieniach - brakowało kolumny w bazie danych naprawa wymagała resetu wszystkich poprzednich typów zamówienia kurier, paczkomat, dostawa osobista</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">4. Dodanie do faktur napisu "OPŁACONO" w momencie pomyślnej płatności - termin płatności na tydź do przodu musi być</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">5. Dodanie przycisku "Jestem z Piły i chcę dostawę osobistą przez Coffee Summit - Bezpłatna przesyłka, rabat zostanie naliczony w następnym kroku" w momencie tworzenia zamówienia</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Styczeń 2024 V 1.0.3</time>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">1. Naprawa fakturowania</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">2. Naprawa pokazywania zdjęć produktów</p>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">3. Dodanie kodu pocztowego w szczegółach zamówienia</p>
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
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Listopad 2023 V 1.0.1</time>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Dodanie bramki płatniczej, historii zmian zamówienia, fakturowania, poprawy wyglądu maili, widok kontroli wersji, dodanie satatusu przelewy24, dodanie kolorystyki w podsumowaniu zamówień, dodanie wyświetlania daty utworzenia i edycji zamówienia, dodanie możliwości anulowania zamówienia ze strony klienta dodanie kwasowości stopnia wypalenia wysokości upraw i intensywnosci smaku do produktów, logowanie przez google, pokazywanie produktów na scrolla</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Wrzesień 2023 V 1.0.0</time>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Stworzenie Projektu</h3>
                            <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Początek witryny</p>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>