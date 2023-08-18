<?php

use App\Models\Company;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('pl');
            $table->longText('content');
            $table->timestamps();
        });

        $company = new Company();
        $company->type = 'name_company';
        $company->pl = 'Pełna nazwa firmy';
        $company->content = 'Nazwa firmy';
        $company->save();

        $company = new Company();
        $company->type = 'nip';
        $company->pl = 'NIP';
        $company->content = '123456789';
        $company->save();

        $company = new Company();
        $company->type = 'name_bank';
        $company->pl = 'Pełna nazwa banku';
        $company->content = 'Nazwa banku';
        $company->save();

        $company = new Company();
        $company->type = 'number_account_bank';
        $company->pl = 'Numer konta bankowego';
        $company->content = 'Numer konta';
        $company->save();

        $company = new Company();
        $company->type = 'number_iban';
        $company->pl = 'Numer konta IBAN';
        $company->content = 'Numer IBAN';
        $company->save();

        $company = new Company();
        $company->type = 'number_bic';
        $company->pl = 'Numer kont BIC';
        $company->content = 'Numer BIC';
        $company->save();

        $company = new Company();
        $company->type = 'info_top_website';
        $company->pl = 'Pasek informacyjny na górze strony';
        $company->content = 'DARMOWA WYSYŁKA POWYŻEJ 100 PLN';
        $company->save();

        $company = new Company();
        $company->type = 'ig_link';
        $company->pl = 'Link do instagrama';
        $company->content = '';
        $company->save();

        $company = new Company();
        $company->type = 'fb_link';
        $company->pl = 'Link do facebooka';
        $company->content = '';
        $company->save();

        $company = new Company();
        $company->type = 'adres_contact_page';
        $company->pl = 'Adres firmy na stronie kontaktowej';
        $company->content = 'AL. JEROZOLIMSKIE 1 00‑000 WARSZAWA';
        $company->save();

        $company = new Company();
        $company->type = 'phone_contact_page';
        $company->pl = 'Numer telefonu na stronie kontaktowej';
        $company->content = '123123123';
        $company->save();

        $company = new Company();
        $company->type = 'email_contact_page';
        $company->pl = 'Adres email na stronie kontaktowej';
        $company->content = 'email@kontaktowy.pl';
        $company->save();

        $company = new Company();
        $company->type = 'hero_h1';
        $company->pl = 'Napis nad filmikiem na stronie głównej';
        $company->content = 'Kawa wysokiej jakości';
        $company->save();

        $company = new Company();
        $company->type = 'hero_button';
        $company->pl = 'Napis przycisku nad filmikiem na stronie głównej';
        $company->content = 'Kupuj teraz';
        $company->save();

        $company = new Company();
        $company->type = 'hero_link';
        $company->pl = 'Link przycisku nad filmikiem na stronie głównej';
        $company->content = '';
        $company->save();

        $company = new Company();
        $company->type = 'shop_home_page';
        $company->pl = 'Pierwszy napis sekcji sklep na stronie głównej';
        $company->content = 'Sklep';
        $company->save();

        $company = new Company();
        $company->type = 'shop_home_page_long';
        $company->pl = 'Drugi napis sekcji sklep na stronie głównej';
        $company->content = 'Szerokie spektrum smaków';
        $company->save();

        $company = new Company();
        $company->type = 'about_home_page';
        $company->pl = 'Pierwszy napis sekcji o nas na stronie głównej';
        $company->content = 'O nas';
        $company->save();

        $company = new Company();
        $company->type = 'about_home_page_long';
        $company->pl = 'Drugi napis sekcji o nas na stronie głównej';
        $company->content = 'Ponieważ kochamy kawę';
        $company->save();

        $company = new Company();
        $company->type = 'about_home_page_paragraf';
        $company->pl = 'Opis sekcji o nas na stronie głównej';
        $company->content = 'Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w';
        $company->save();

        $company = new Company();
        $company->type = 'blog_home_page';
        $company->pl = 'Pierwszy napis sekcji blog na stronie głównej';
        $company->content = 'Blog';
        $company->save();

        $company = new Company();
        $company->type = 'blog_home_page_long';
        $company->pl = 'Drugi napis sekcji blog na stronie głównej';
        $company->content = 'Popularne wpisy';
        $company->save();

        $company = new Company();
        $company->type = 'ig_home_page';
        $company->pl = 'Pierwszy napis sekcji instagram na stronie głównej';
        $company->content = '@nazwa';
        $company->save();

        $company = new Company();
        $company->type = 'ig_home_page_long';
        $company->pl = 'Drugi napis sekcji instagram na stronie głównej';
        $company->content = 'Obserwuj nas na instagramie';
        $company->save();

        $company = new Company();
        $company->type = 'yellow_home_page';
        $company->pl = 'Pierwszy napis żółtego koloru na stronie głównej';
        $company->content = 'Wysyłka pod twoje drzwi';
        $company->save();

        
        $company = new Company();
        $company->type = 'yellow_home_page_long';
        $company->pl = 'Drugi napis żółtego koloru na stronie głównej';
        $company->content = 'Przy zamówieniu powyżej 100 PLN';
        $company->save();

        $company = new Company();
        $company->type = 'red_home_page';
        $company->pl = 'Pierwszy napis czerwonego koloru na stronie głównej';
        $company->content = 'Wysyłka pod twoje drzwi';
        $company->save();

        
        $company = new Company();
        $company->type = 'red_home_page_long';
        $company->pl = 'Drugi napis czerwonego koloru na stronie głównej';
        $company->content = 'Przy zamówieniu powyżej 100 PLN';
        $company->save();
        
        $company = new Company();
        $company->type = 'blue_home_page';
        $company->pl = 'Pierwszy napis niebieskiego koloru na stronie głównej';
        $company->content = 'Wysyłka pod twoje drzwi';
        $company->save();

        
        $company = new Company();
        $company->type = 'blue_home_page_long';
        $company->pl = 'Drugi napis niebieskiego koloru na stronie głównej';
        $company->content = 'Przy zamówieniu powyżej 100 PLN';
        $company->save();

        $company = new Company();
        $company->type = 'violet_home_page';
        $company->pl = 'Pierwszy napis fioletowego koloru na stronie głównej';
        $company->content = 'Wysyłka pod twoje drzwi';
        $company->save();

        
        $company = new Company();
        $company->type = 'violet_home_page_long';
        $company->pl = 'Drugi napis fioletowego koloru na stronie głównej';
        $company->content = 'Przy zamówieniu powyżej 100 PLN';
        $company->save();

        $company = new Company();
        $company->type = 'about_company_about_page';
        $company->pl = 'Pierwszy napis na stronie o nas';
        $company->content = 'Firma';
        $company->save();

        $company = new Company();
        $company->type = 'about_company_about_page_long';
        $company->pl = 'Drugi napis na stronie o nas';
        $company->content = 'Szerokie spektrum smaków';
        $company->save();

        $company = new Company();
        $company->type = 'about_company_about_page_paragraf';
        $company->pl = 'Opis na stronie o nas';
        $company->content = 'Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixin.';
        $company->save();

        $company = new Company();
        $company->type = 'photo_about_page';
        $company->pl = 'Pierwszy napis nad zdjęciami na stronie o nas';
        $company->content = 'Ponieważ kochamy kawę';
        $company->save();

        $company = new Company();
        $company->type = 'photo_about_page_paragraf';
        $company->pl = 'Opis nad zdjęciami na stronie o nas';
        $company->content = 'Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki.';
        $company->save();

        $company = new Company();
        $company->type = 'under_photo_about_page';
        $company->pl = 'Pierwszy napis pod zdjęciami na stronie o nas';
        $company->content = 'Ponieważ kochamy kawę';
        $company->save();

        $company = new Company();
        $company->type = 'under_photo_about_page_paragraf';
        $company->pl = 'Opis pod zdjęciami na stronie o nas';
        $company->content = 'Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki.';
        $company->save();

        $company = new Company();
        $company->type = 'about_company_about_page_end';
        $company->pl = 'Pierwszy napis na stronie o nas na samym końcu';
        $company->content = 'Firma';
        $company->save();

        $company = new Company();
        $company->type = 'about_company_about_page_long_end';
        $company->pl = 'Drugi napis na stronie o nas na samym końcu';
        $company->content = 'Szerokie spektrum smaków';
        $company->save();

        $company = new Company();
        $company->type = 'about_company_about_page_paragraf_end';
        $company->pl = 'Opis na stronie o nas na samym końcu';
        $company->content = 'Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixin.';
        $company->save();

        $company = new Company();
        $company->type = 'collaboration_page';
        $company->pl = 'Pierwszy napis na stronie współpraca';
        $company->content = 'Współpraca';
        $company->save();

        $company = new Company();
        $company->type = 'collaboration_page_long';
        $company->pl = 'Drugi napis na stronie współpraca';
        $company->content = 'Oferta dla firm';
        $company->save();

        $company = new Company();
        $company->type = 'collaboration_page_paragraf';
        $company->pl = 'Opis na stronie współpraca';
        $company->content = 'Najlepsza kawa w Twojej restauracji, kawiarni, cukierni, biurze, hotelu. Jesteśmy sprawdzonym i rzetelnym partnerem biznesu.';
        $company->save();

        $company = new Company();
        $company->type = 'why_collaboration_page';
        $company->pl = 'Pierwszy napis na stronie współpraca pod filmikiem';
        $company->content = 'Dlaczego my';
        $company->save();

        $company = new Company();
        $company->type = 'why_collaboration_page_long';
        $company->pl = 'Drugi napis na stronie współpraca pod filmikiem';
        $company->content = 'Najwyższa jakość kawy';
        $company->save();

        $company = new Company();
        $company->type = 'why_collaboration_page_paragraf pod filmikiem';
        $company->pl = 'Opis na stronie współpraca';
        $company->content = 'Własna palarnia kawy, najlepszy sprzęt i wyjątkowy zespół, kawa wypalana przez Vice Mistrza Polski Coffee Roasting 2018. Zauważalna różnica jakości, którą gwarantujemy wyróżni twój biznes w oczach gości i pracowników.';
        $company->save();

        $company = new Company();
        $company->type = 'over_collaboration_page';
        $company->pl = 'Pierwszy napis na stronie współpraca nad formularzem kontaktowym';
        $company->content = 'Dlaczego my';
        $company->save();

        $company = new Company();
        $company->type = 'over_collaboration_page_long';
        $company->pl = 'Drugi napis na stronie współpraca nad formularzem kontaktowym';
        $company->content = 'Najwyższa jakość kawy';
        $company->save();

        $company = new Company();
        $company->type = 'over_collaboration_page_paragraf';
        $company->pl = 'Opis na stronie współpraca nad formularzem kontaktowym';
        $company->content = 'Własna palarnia kawy, najlepszy sprzęt i wyjątkowy zespół, kawa wypalana przez Vice Mistrza Polski Coffee Roasting 2018. Zauważalna różnica jakości, którą gwarantujemy wyróżni twój biznes w oczach gości i pracowników.';
        $company->save();

        $company = new Company();
        $company->type = 'contact_collaboration_page';
        $company->pl = 'Pierwszy napis formularza kontaktowego na stronie współpraca';
        $company->content = 'Porozmawiajmy o współpracy';
        $company->save();

        $company = new Company();
        $company->type = 'contact_collaboration_page_long';
        $company->pl = 'Drugi napis formularza kontaktowego na stronie współpraca';
        $company->content = 'Masz pytania? Chcesz jak najszybciej wystartować? Prześlij nam swoje dane kontaktowe. Odpiszemy / oddzwonimy w ciągu jednego dnia.';
        $company->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
