<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $names = ['Тувайс', 'Зиеор', 'Гудок', 'чефкеф', 'лохун', 'бентогрид', 'абломон', 'мстебень', 'ванечкин', 'сэнд'];
            $name = $names[array_rand($names)];

            $email = ['ru', 'com', 'dev'];
            $email = $email[array_rand($email)];
            DB::table('users')->insert([
                'name' => $name,
                'email' => Str::random(5) . '@mail.' . $email,
                'password' => Hash::make('1234567890'),
            ]);
        }
    }
}
