<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::query()->create([
            'user_id' => User::query()->first()->id,
            'first_name' => 'Client',
            'last_name' => 'as Test',
            'region_id' => Region::query()->first()->id,
            'phone' => '992928259006',
        ]);
    }
}
