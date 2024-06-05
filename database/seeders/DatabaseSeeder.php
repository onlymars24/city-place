<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Place;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 3; $i++){
            $type = Type::create([
                'name' => 'Тип '.$i
            ]);
            for($j = 1; $j <= 3; $j++){
                Place::create([
                    'name' => 'Название места '.$i.' '.$j,
                    'descr' => 'Описание места '.$i.' '.$j,
                    'image' => "https://www.google.com/url?sa=i&url=https%3A%2F%2Ffk-ramps.ru%2Fprojects%2Fskejtpark-v-lagernom-sadu-tomsk&psig=AOvVaw0ZbMHQpUAD-oKQfUgt8Qs2&ust=1717441607456000&source=images&cd=vfe&opi=89978449&ved=2ahUKEwjd6t_Yzr2GAxXKQVUIHZfICykQjRx6BAgAEBU",
                    'location_x' => 67.324125,
                    'location_y' =>  11.2313423,
                    'location_address' => 'дома',
                    'avatar' => 'https://static.tildacdn.com/tild6233-3635-4566-b233-313433346663/46072_4.jpg',
                    'type_id' => $type->id
                ]);
            }
        }
    }
}
