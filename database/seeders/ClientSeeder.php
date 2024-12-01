<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    public function run()
    {
        // Create some test clients
        $clients = [
            [
                'trade_name' => 'شركة الأمل للتجارة',
                'first_name' => 'محمد',
                'last_name' => 'أحمد',
                'phone' => '0501234567',
                'mobile' => '0561234567',
                'email' => 'mohamed@example.com',
                'address' => 'شارع الملك فهد',
                'city' => 'الرياض',
                'country' => 'المملكة العربية السعودية',
                'postal_code' => '12345',
            ],
            [
                'trade_name' => 'مؤسسة النور',
                'first_name' => 'أحمد',
                'last_name' => 'علي',
                'phone' => '0502345678',
                'mobile' => '0562345678',
                'email' => 'ahmed@example.com',
                'address' => 'شارع العليا',
                'city' => 'جدة',
                'country' => 'المملكة العربية السعودية',
                'postal_code' => '23456',
            ],
            [
                'trade_name' => 'شركة السلام',
                'first_name' => 'خالد',
                'last_name' => 'محمد',
                'phone' => '0503456789',
                'mobile' => '0563456789',
                'email' => 'khaled@example.com',
                'address' => 'شارع الأمير محمد بن عبدالعزيز',
                'city' => 'الدمام',
                'country' => 'المملكة العربية السعودية',
                'postal_code' => '34567',
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
