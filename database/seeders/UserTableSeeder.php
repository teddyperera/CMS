<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'pereratdp@gmail.com')->first();

        if(!$user){
            User::create([
                'name' => 'Teddy Perera',
                'email' => 'pereratdp@gmail.com',
                'password' => Hash::make('password')
            ]);
        }
    }
}
