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
                    <!--
                    kawa 1 kg
kawa brazylia
kawy świata
kawa na kawe
kawa picie
kawa 1kg
kawa napoj
kawa z całego świata
najlepsza kawa speciality
kawa napój
kup kawę
kawa prawdziwa
kawa ma
picie kawy
najlepsza kawa świata
kawa świata
coffee czy coffee
parzyć kawe
najlepsza kawa swiata
kawa czy jest zdrowa
kawa czy zdrowa
kawa jest zdrowa
kawa za kawą
kawa speciality co to
1 kg kawy-->
                    <ol class="relative border-s border-gray-200 ">
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">4 Luty 2025 V 2.0.2</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 ">1. zmiana linkowania</p>
                            <p class="text-base font-normal text-gray-500 ">2. zmiana gtm</p>
                            <p class="text-base font-normal text-gray-500 ">3. usunięcie informacji wysyłkowych</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">4 Luty 2025 V 2.0.1</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Naprawa blędnie uzupełnionego formularza od strony klienta tak aby system nie pokazywał błędu</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">26 styczeń 2025 V 2.0.0</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Naprawa usuwania kodu probocyjnego</p>
                            <p class="text-base font-normal text-gray-500 ">2. Naprawa wyświetlania tekstu w pasku nawigacyjnym</p>
                            <p class="text-base font-normal text-gray-500 ">3. Dodanie kategorii</p>
                            <p class="text-base font-normal text-gray-500 ">4. Dodano filtry kategorii w sklepie</p>
                            <p class="text-base font-normal text-gray-500 ">5. Naprawiono sortowanie</p>
                            <p class="text-base font-normal text-gray-500 ">6. Dodano/Zmieniono wyświetlanie 4 różnych typów produktów</p>
                            <p class="text-base font-normal text-gray-500 ">7. Zmieniono ssuwak na counter z inputem</p>
                            <p class="text-base font-normal text-gray-500 ">8. Poprawiono rozmieszczenie elementów responsywność</p>
                            <p class="text-base font-normal text-gray-500 ">9. Dodano dodawanie i usuwanie produktów w koszyku dla 4 różnych rodzaji</p>
                            <p class="text-base font-normal text-gray-500 ">10. Usunięto animacje pokazywania ze względu na filtry i sortowanie</p>
                            <p class="text-base font-normal text-gray-500 ">11. Usunięto wymagane przy tworzeniu i edycji produktu: opis, seo tytuł, seo opis</p>
                            <p class="text-base font-normal text-gray-500 ">12. Dodano domyślne 0 w pozycji produktu przy tworzeniu i edycji</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">5 październik 2024 V 1.4.0</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Poprawa naliczania kodów rabatowych w fakturowni</p>
                            <p class="text-base font-normal text-gray-500 ">2. Naprawa wysłania maili potwierdzenia zamówienia</p>
                            <p class="text-base font-normal text-gray-500 ">3. Zablokowanie wystawiania faktur dla użytkownika</p>
                            <p class="text-base font-normal text-gray-500 ">4. Dodanie zliczania kilogramów sprzedanych kaw</p>
                            <p class="text-base font-normal text-gray-500 ">5. Dodanie zlapisu kuriera i przesyłki w celu przyszłej optymalizacji wyglądu</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">17 wrzesień 2024 V 1.3.0</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Dodanie kodów rabatowych w zakładce sklep->kody rabatowe</p>
                            <p class="text-base font-normal text-gray-500 ">2. Mogą być procentowe lub kwotowe</p>
                            <p class="text-base font-normal text-gray-500 ">3. Cena aktualizaowana za pomocą ajax</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">22 sierpień 2024 V 1.2.6</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja - Usługa integracja z InPost API</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Ożywienie formularza do zamawiania kurier -> kurier</p>
                            <p class="text-base font-normal text-gray-500 ">2. Przygotowanie przycisku do zamawiania kuriera w zakladce inpost</p>
                            <p class="text-base font-normal text-gray-500 ">3. Dodanie zabezpiecznia przed stworzeniem przesyłki jeśli status to anulowano, weryfikacja płatnosci, oczekiwanie na wpłate</p>
                            <p class="text-base font-normal text-gray-500 ">4. W podglądze zamówienia dodano podświetlanie pierwszego głównego kwadraciku pod status zamówienia + nowy kolor</p>
                            <p class="text-base font-normal text-gray-500 ">5. W podglądze zamówieniń dodano ciemny zielony, jeśli zamówienie ma id przesyłki w InPost</p>
                            <p class="text-base font-normal text-gray-500 ">6. Usunięto resztki dark w alertach</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">21 sierpień 2024 V 1.2.5</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja - Usługa integracja z InPost API</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Uzyskanie dostępu do usługi kurier -> kurier</p>
                            <p class="text-base font-normal text-gray-500 ">2. Redesing tworzenia przesyłki kurier -> kurier</p>
                            <p class="text-base font-normal text-gray-500 ">3. Obsługa kurier -> kurier w zakładce inpost</p>
                            <p class="text-base font-normal text-gray-500 ">4. Przygotowanie pod tworzenie przesyłki + utworzenie zamówienia testowego</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">17 sierpień 2024 V 1.2.4</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja - Usługa integracja z InPost API</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Zamiana geowigetu InPosta API z v4 na v5</p>
                            <p class="text-base font-normal text-gray-500 ">2. Dodanie w panelu admina zakładki klienci która ukazuje liste wszystkich osób które złożyły zamówienie z statusem platności success gdzie imie nazwisko email i numer telefonu są takie same</p>
                            <p class="text-base font-normal text-gray-500 ">3. Dodanie NIEPEŁNE usługi kurier->kurier - BRAK NUMERU TRUCKER</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">29 lipiec 2024 V 1.2.3</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Usunięcie Auto scrolla w podglądzie produktu</p>
                            <p class="text-base font-normal text-gray-500 ">2. Usunięcie gramatury w przypadku jednej ceny w podglądzie zamówienia</p>
                            <p class="text-base font-normal text-gray-500 ">3. Dodanie znikania mapki inpost po wybraniu paczkomatu w składaniu zamówienia</p>
                            <p class="text-base font-normal text-gray-500 ">4. Dodanie tła pod wideo na stronie głównej innego niż biały - czasami na telefonach się nie ładuje wtedy widać tylko białe zostało to naprawione dodaniem domyślnego tła ciemnego koloru tak aby napis i przycisk nad wideo w momenie niezaładowania był widoczny</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">14 lipiec 2024 V 1.2.2</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja - Usługa integracja z InPost API</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Aktywacja przycisków utwórz przesyłkę ABC Paczkomat Paczkomat</p>
                            <p class="text-base font-normal text-gray-500 ">- Przygotowanie przycisków ABCD Kurier Kurier</p>
                            <p class="text-base font-normal text-gray-500 ">2. Aktywacja przycisku sprawdź status</p>
                            <p class="text-base font-normal text-gray-500 ">3. Aktywacja przycisku pobierz etykietę A6P</p>
                            <p class="text-base font-normal text-gray-500 ">- Pobieranie pliku pod nazwą numeru paczkomatu lub paczkopunktu</p>
                            <p class="text-base font-normal text-gray-500 ">4. Redesing zakładki InPost</p>
                            <p class="text-base font-normal text-gray-500 ">- Lista przesyłek (możliwe że tylko te które zostały stworzone za pomocą coffeesummit.pl)</p>
                            <p class="text-base font-normal text-gray-500 ">- Zielone oznacza paczkomat paczkomat</p>
                            <p class="text-base font-normal text-gray-500 ">5. Zmiana w podglądzie zamówień z numer zamówienia na numer paczkomatu</p>
                            <p class="text-base font-normal text-gray-500 ">6. Dodanie przycisku powrót do sklepu - wszystkie produkty w podglądzie produktu dla klienta</p>
                            <p class="text-base font-normal text-gray-500 ">7. Dodanie wyświetlania drugiego zdjecia niżej jeśli jest ustawione w podglądzie produktu dla klienta</p>
                            <p class="text-base font-normal text-gray-500 ">8. Dodanie automatyczne zaznaczenie kawy ziarnistej w podglądzie produktu dla klienta</p>
                            <p class="text-base font-normal text-gray-500 ">9. Dodanie podglądu liczby zamówień złożonych przez uzytkownika</p>
                            <p class="text-base font-normal text-gray-500 ">10. Ustawiony webhook</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">3 lipiec 2024 V 1.2.1</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja - Usługa integracja z InPost API</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Redesing podglądu zamówienia w panelu administratora</p>
                            <p class="text-base font-normal text-gray-500 ">2. Dodanie zakładki InPost - podgląd</p>
                            <p class="text-base font-normal text-gray-500 ">3. Dodanie menagera tagów google</p>
                            <p class="text-base font-normal text-gray-500 ">4. Przygotowanie podglądu zamówienia do integracji z inpost</p>
                            <p class="text-base font-normal text-gray-500 ">5. Dodanie podglądu cen sprzedaży w panelu admina</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">16 czerwiec 2024 V 1.2.0</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja - Usługa integracja z InPost API</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Zmiana systemu krokowego adres dostawy - Wybranie paczkomatu przez : Paczkomat API Wersja v4 Old oraz Wybranie kuriara i dostawy osobistej przez : Formularz</p>
                            <p class="text-base font-normal text-gray-500 ">2. Poprawa wyglądu podglądu zamówienia w panelu admina - prawidłowe wyśrodkowanie</p>
                            <p class="text-base font-normal text-gray-500 ">3. Przywrócenie wykresów ilości zamówień w panelu admina w widoku wszystkich zamówień</p>
                            <p class="text-base font-normal text-gray-500 ">4. Usunięcie "rabat zostanie naliczony w następnym kroku" w kroku 5</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">11 czerwiec 2024 V 1.1.4</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Naprawa systemu krokowego: zmiana z opcjonalnie na wymagany dla numeru telefonu</p>
                            <p class="text-base font-normal text-gray-500 ">2. Naprawa naliczania przesyłki w tworzeniu faktury: z potrójnego warunku działającego na zmiennych sesyjnych zmiana na podwójny warunke sprawdzający czy kwota po odjęciu kosztów przesyłki jest taka sama jak suma przedmiotów i czy kwota jest niższa od stu</p>
                            <p class="text-base font-normal text-gray-500 ">3. Naprawa wyświetlania naliczania przesyłki w podsumowaniu zamówienia po stronie klienta: podobnie jak wyżej ale tym razem dodanie instrukcji warunkówych z powodu braku</p>
                            <p class="text-base font-normal text-gray-500 ">4. Naprawa wyświetlania widoku tworzenia zamówienia</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">6 kwiecień 2024 V 1.1.3</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Naprawa fakturowni - tworzenie faktur przestało działać z uwagi na zmiany w samym systemie fakturownia. Zostały ustawione domyślne dane do generowania faktury - dane sprzedawcy. Błąd usunięty za pomocą usunięcia 4 linijek w requesie do API nazwa, adres, strona www, kontakt telefoniczny</p>
                            <p class="text-base font-normal text-gray-500 ">2. Usunięcie kolumny "w koszyku" w liście produktów w panelu admina</p>
                            <p class="text-base font-normal text-gray-500 ">3. Poprawiony przycisk dodawania w artykule</p>
                            <p class="text-base font-normal text-gray-500 ">4. Dodany nowy artykuł</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">28 Luty 2024 V 1.1.2</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Dodanie artukułu - Ile kawy mozna zrobić z 1kg</p>
                            <p class="text-base font-normal text-gray-500 ">2. Przebudowa zamawiania na system krokowy z uwzględnieniem innych dnych faktury i innej osoby odbierającej</p>
                            <p class="text-base font-normal text-gray-500 ">3. Poprawa wyglądu tak aby wszystkie produkty miały system krokowy</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">18 Luty 2024 V 1.1.1</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Dodanie artukułu - Dlaczego kawa jest zdrowa?</p>
                            <p class="text-base font-normal text-gray-500 ">2. Dodanie drugiego szablonu wpisu na bloga</p>
                            <p class="text-base font-normal text-gray-500 ">3. Kilka dni temu zgłoszenie stron produktów ręcznie do Google</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">14 Luty 2024 V 1.1.0</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 ">Zmiana pokazywania produktu na krokowy</p>
                            <p class="text-base font-normal text-gray-500 ">1. Dodany komunikat w momencie skompletowania wyboru kawy</p>
                            <p class="text-base font-normal text-gray-500 ">2. Dodane automatyczne przesunięcie ekranu do miejsca w którym jeszcze brakuje uzupełnienia, jeśli wszystko ok to prowadzi do przycisku "Dodaj do koszyka"</p>
                            <p class="text-base font-normal text-gray-500 ">3. Dodanie słów kluczoywch "Kawa kraftowa " przed nazwą produktu</p>
                            <p class="text-base font-normal text-gray-500 ">4. zmiana kolejności wyświetlania stopni wypalenia, wysokości upraw itp.. na komputerze wyświetla sie w dziurze która powstała przez zmianę na system krokowy</p>
                            <p class="text-base font-normal text-gray-500 ">5. Po wyborze użytkownika zmiana koloru kropki krokowej (statusu) na udany</p>
                            <p class="text-base font-normal text-gray-500 ">6. Po wyborze użytkownika rozmiaru opakowania czyli ceny - zakres cen na górze dynamicznie się zmienia według odpowiednie kwoty</p>
                            <p class="text-base font-normal text-gray-500 ">7. usunięcie tymczasowego ustawienia wybranego rodzaju mielenia - ziarnista</p>
                            <p class="text-base font-normal text-gray-500 ">8. Dodanie animacji przycisków</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">11 Luty 2024 V 1.0.5</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Zmiana kolejności historii aktualizacji, najnowsze u góry</p>
                            <p class="text-base font-normal text-gray-500 ">2. Naprawa naliczania przesyłki - nie naliczało za przesyłkę tylko na stronie, poprawiono że i w bramce płatniczej i w fakturowni</p>
                            <p class="text-base font-normal text-gray-500 ">3. W formularzu zamówienia należy podać pod pocztowy i zaznaczyć opcję "Jestem z Piły[...]" - inaczej koszt przesyłki będzie naliczony</p>
                            <p class="text-base font-normal text-gray-500 ">4. Dodanie wykresu zamówień - inicjatywa administratora - bezpłatne</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">Luty 2024 V 1.0.4</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Naprawa fakturowania - Naprawa liczenia fakturownia nie przeliczała liości produktów z ceną, należało najpierw wymnożyć a poźniej wysłać dane</p>
                            <p class="text-base font-normal text-gray-500 ">2. Naprawa pokazywania zdjęć produktów - w podsumowaniu produktu w panelu administratora</p>
                            <p class="text-base font-normal text-gray-500 ">3. Naprawa notatek klienta w zamówieniach - brakowało kolumny w bazie danych naprawa wymagała resetu wszystkich poprzednich typów zamówienia kurier, paczkomat, dostawa osobista</p>
                            <p class="text-base font-normal text-gray-500 ">4. Dodanie do faktur napisu "OPŁACONO" w momencie pomyślnej płatności - termin płatności na tydź do przodu musi być</p>
                            <p class="text-base font-normal text-gray-500 ">5. Dodanie przycisku "Jestem z Piły i chcę dostawę osobistą przez Coffee Summit - Bezpłatna przesyłka, rabat zostanie naliczony w następnym kroku" w momencie tworzenia zamówienia</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">Styczeń 2024 V 1.0.3</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Naprawa fakturowania</p>
                            <p class="text-base font-normal text-gray-500 ">2. Naprawa pokazywania zdjęć produktów</p>
                            <p class="text-base font-normal text-gray-500 ">3. Dodanie kodu pocztowego w szczegółach zamówienia</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">Styczeń 2024 V 1.0.2</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 ">1. Zmiana daty w stopce z 2023 na automatyczne pobieranie względem czasu rzeczywistego</p>
                            <p class="text-base font-normal text-gray-500 ">2. Zmiana maksymalnej ilości dodawania produktu do koszyka z 10 do 35</p>
                            <p class="text-base font-normal text-gray-500 ">3. Dodanie przycisku kontynuuj zakupy oraz przycisku "x" w prawym górnym rogu koszyka</p>
                            <p class="text-base font-normal text-gray-500 ">4. Dodanie przycisku pod napisami sekcji (sklep, o nas, blog, instagram) na stronie głównej - maksymalnie jak to możliwe</p>
                            <p class="text-base font-normal text-gray-500 ">5. Dodanie wyboru typu adresu kurier lub paczkomat w momencie składania zamówienia</p>
                            <p class="text-base font-normal text-gray-500 ">6. Dodanie zapisu w zamówieniu rezultatu utworzenia faktury</p>
                            <p class="text-base font-normal text-gray-500 ">7. Dodanie przycisku ponawiającego utworzenie faktury w systemie</p>
                            <p class="text-base font-normal text-gray-500 ">8. Poprawa wysyłania zdublikowanych maili potwierdzających zamówienie</p>
                            <p class="text-base font-normal text-gray-500 ">9. Dodano podgląd trybu jasno-ciemno <a class="font-medium text-blue-600 hover:underline" href="{{route('dark')}}">zobacz</a>. Zastosowano tryb automatyczny który pobiera tryb systemowy użytkownika. Nie wszystkie kolory działają względem oczekiwań.</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">Listopad 2023 V 1.0.1</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Aktualizacja</h3>
                            <p class="text-base font-normal text-gray-500 ">Dodanie bramki płatniczej, historii zmian zamówienia, fakturowania, poprawy wyglądu maili, widok kontroli wersji, dodanie satatusu przelewy24, dodanie kolorystyki w podsumowaniu zamówień, dodanie wyświetlania daty utworzenia i edycji zamówienia, dodanie możliwości anulowania zamówienia ze strony klienta dodanie kwasowości stopnia wypalenia wysokości upraw i intensywnosci smaku do produktów, logowanie przez google, pokazywanie produktów na scrolla</p>
                        </li>
                        <li class="mb-10 ms-4">
                            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white "></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 ">Wrzesień 2023 V 1.0.0</time>
                            <h3 class="text-lg font-semibold text-gray-900 ">Stworzenie Projektu</h3>
                            <p class="mb-4 text-base font-normal text-gray-500 ">Początek witryny</p>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>