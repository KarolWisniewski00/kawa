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
            $table->string('content');
            $table->timestamps();
        });

        $company = new Company();
        $company->type = 'name_company';
        $company->content = 'Pełna nazwa firmy';
        $company->save();

        $company = new Company();
        $company->type = 'nip';
        $company->content = '123456789';
        $company->save();

        $company = new Company();
        $company->type = 'name_bank';
        $company->content = 'NAZWA BANKU';
        $company->save();

        $company = new Company();
        $company->type = 'number_account_bank';
        $company->content = 'numer konta';
        $company->save();

        $company = new Company();
        $company->type = 'number_iban';
        $company->content = 'numer IBAN';
        $company->save();

        $company = new Company();
        $company->type = 'number_bic';
        $company->content = 'numer BIC';
        $company->save();

        $company = new Company();
        $company->type = 'info_top_website';
        $company->content = 'DARMOWA WYSYŁKA POWYŻEJ 100 PLN';
        $company->save();

        $company = new Company();
        $company->type = 'adres_contact_page';
        $company->content = 'AL. JEROZOLIMSKIE 1 00‑000 WARSZAWA';
        $company->save();

        $company = new Company();
        $company->type = 'phone_contact_page';
        $company->content = '123123123';
        $company->save();

        $company = new Company();
        $company->type = 'email_contact_page';
        $company->content = 'email@kontaktowy.pl';
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
