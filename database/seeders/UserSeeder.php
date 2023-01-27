<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            'login' => 'admin',
            'password' => 'admin'
        ]);
        $this->call([
            RegionSeeder::class,
            ClientSeeder::class,
        ]);
    }
}
