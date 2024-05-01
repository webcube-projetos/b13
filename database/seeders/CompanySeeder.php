<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Address;
use App\Models\Company;
use App\Models\Contact;
use App\Models\CompanyContact;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar se o endereço já existe
        $address = Address::where([
            'cep' => '05734140',
            'street' => 'Rua João Simões de Souza',
            'number' => '430',
            'neighborhood' => 'Parque Reboucas',
            'city' => 'São Paulo',
            'state' => 'SP',
            'country' => 'Brasil',
        ])->first();

        // Se não existir, criar o endereço
        if (!$address) {
            $address = Address::create([
                'cep' => '05734140',
                'street' => 'Rua João Simões de Souza',
                'number' => '430',
                'neighborhood' => 'Parque Reboucas',
                'city' => 'São Paulo',
                'state' => 'SP',
                'country' => 'Brasil',
            ]);
        }

        // Verificar se a empresa já existe
        $company = Company::where([
            'id_address' => $address->id,
            'document' => '25241888000185',
            'name' => 'B13 COMPANY LTDA',
            'fantasy_name' => 'VIP BOSTON',
            'nickname' => 'B13 Company',
            'phone' => '11998322580',
            'email' => 'marcos@b13company.com',
        ])->first();

        // Se não existir, criar a empresa
        if (!$company) {
            $company = Company::create([
                'id_address' => $address->id,
                'id_bank' => null,
                'document' => '25241888000185',
                'name' => 'B13 COMPANY LTDA',
                'fantasy_name' => 'VIP BOSTON',
                'nickname' => 'B13 Company',
                'phone' => '11998322580',
                'email' => 'marcos@b13company.com',
            ]);
        }

        // Verificar se o contato já existe
        $contact = Contact::where([
            'name' => 'Marcos',
            'document' => '123456789-10',
            'whatsapp' => '11998322580',
            'role' => 'CEO',
            'phone' => '11998322580',
            'email' => 'marcos@b13company.com'
        ])->first();

        // Se não existir, criar o contato
        if (!$contact) {
            $contact = Contact::create([
                'name' => 'Marcos',
                'document' => '123456789-10',
                'whatsapp' => '11998322580',
                'role' => 'CEO',
                'phone' => '11998322580',
                'email' => 'marcos@b13company.com'
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
