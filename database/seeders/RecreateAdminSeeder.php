<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminOld = User::where('admin', true)->first();
        if($adminOld){
            $adminOld->delete();
        }
        $admin = User::create([
            'name' => 'admin',
            'surname' => 'admin',
            'patronymic' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('qwerty123'),
            'admin' => 1
        ]);
        
    }
}
