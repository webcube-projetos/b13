<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Address;
use App\Models\Company;
use App\Models\Contact;
use App\Models\CompanyContact;

class FreelanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar se o endereço já existe
        $address = Address::where([
            'cep' => '01153000',
            'street' => 'São Paulo',
            'number' => '000',
            'neighborhood' => 'São Paulo',
            'city' => 'São Paulo',
            'state' => 'SP',
            'country' => 'Brasil',
        ])->first();

        // Se não existir, criar o endereço
        if (!$address) {
            $address = Address::create([
                'cep' => '01153000',
                'street' => 'São Paulo',
                'number' => '000',
                'neighborhood' => 'São Paulo',
                'city' => 'São Paulo',
                'state' => 'SP',
                'country' => 'Brasil',
            ]);
        }

        // Verificar se a empresa já existe
        $company = Company::where([
            'id_address' => $address->id,
            'document' => '00000000000100',
            'name' => 'Freelance',
            'fantasy_name' => 'Freelance',
            'nickname' => 'Freelance',
            'phone' => '000000-0000',
            'email' => 'company@freelance.com',
        ])->first();

        // Se não existir, criar a empresa
        if (!$company) {
            $company = Company::create([
                'id_address' => $address->id,
                'id_bank' => null,
                'document' => '00000000000100',
                'name' => 'Freelance',
                'fantasy_name' => 'Freelance',
                'nickname' => 'Freelance',
                'phone' => '000000-0000',
                'email' => 'company@freelance.com',
            ]);
        }

        // Verificar se o contato já existe
        $contact = Contact::where([
            'name' => 'Freelance',
            'document' => '000000000-00',
            'whatsapp' => '0000000-0000',
            'role' => 'General',
            'phone' => '00000000000',
            'email' => 'company@freelance.com'
        ])->first();

        // Se não existir, criar o contato
        if (!$contact) {
            $contact = Contact::create([
                'name' => 'Freelance',
                'document' => '000000000-00',
                'whatsapp' => '0000000-0000',
                'role' => 'General',
                'phone' => '00000000000',
                'email' => 'company@freelance.com'
            ]);
        }

        // Verificar se o relacionamento empresa-contato já existe
        $companyContact = CompanyContact::where([
            'company_id' => $company->id,
            'contact_id' => $contact->id
        ])->first();

        // Se não existir, criar o relacionamento
        if (!$companyContact) {
            CompanyContact::create([
                'company_id' => $company->id,
                'contact_id' => $contact->id
            ]);
        }
    }
}
