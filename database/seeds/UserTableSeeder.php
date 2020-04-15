<?php

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
        //
        $user = \App\User::where('email','surajfromleo@gmail.com')->first();
        if(!$user){
            \App\User::Create([
                'name'=>'Suraj SB',
                'email'=>'suraffromleo@gmail.com',
                'password'=>Hash::make('suraj88@')
            ]);
        }
    }
}
