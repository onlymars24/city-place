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
                    'image' => '["qwe", "qaz", "ghc"]',
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
