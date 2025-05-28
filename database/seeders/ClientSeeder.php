<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    public function run()
    {
        Client::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '08123456789',
        ]);

        Client::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'phone' => '08987654321',
        ]);
    }
}


