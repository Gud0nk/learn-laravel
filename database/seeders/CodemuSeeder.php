<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CodemuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'title' => Str::random(10),         // тут рандомы
                'slug' => Str::random(10),
                'text' => Str::random(50),
                'likes' => rand(1, 100),
            ],
            [
                'title' => 'title 2',
                'slug' => (string) Str::uuid(),             // а тут ууиды ( ну хоть не иуды )
                'text' => 'text text text 2',
                'likes' => 20
            ],
        ]);
        $photosi = ['.jpg', '.jpeg', '.png', '.bmp'];
        $photos = [array_rand($photosi)];       // случайные элементы массива
        for ($i = 0; $i < 10; $i++) {
            DB::table('posts')->insert([
                'title' => Str::random(10),
                'slug' => Str::slug('post-1' . 'titile1').$photos, // генерация slug и кункатенация
                'text' => Str::random(50),
                'likes' => rand(1, 100),
            ]);
        }
        for ($i = 0; $i < 10; $i++) {
            $names = ['Тувайс', 'Зиеор', 'Гудок', 'чефкеф', 'лохун', 'бентогрид', 'абломон', 'мстебень', 'ванечкин', 'сэнд', 'за варудо'];
            $name = $names[array_rand($names)];

            $email = ['ru', 'com', 'dev'];
            $email = $email[array_rand($email)];
            DB::table('users')->insert([
                'name' => $name,
                'email' => Str::random(5) . '@mail.' . $email,
                'password' => Hash::make('1234567890'),     // тут хеширование палворлдов
            ]);
        }

        $domenisi = ['com', 'net', 'org', 'ru', 'io', 'su', 'ai', 'mu'];
        $domen = [array_rand($domenisi)];
        for ($i = 0; $i < $count; $i++) {
            $name = Str::slug(Str::random(8));

            DB::table('posts')->insert([
                'title' => $name.$domen,
                'slug' => Str::slug($name.$domen),
                'text' => Str::random(50),
                'likes' => rand(1, 100),
            ]);
        }


    }
}
