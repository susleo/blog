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
                'email'=>'surajfromleo@gmail.com',
                'password'=>Hash::make('suraj88@@'),
                 'role'=>'admin',
            ]);

        }
        \App\User::Create([
            'name'=>'Alex D ',
            'email'=>'alex@alex.com',
            'password'=>Hash::make('12345678')
        ]);

        \App\User::Create([
            'name'=>'Jake Paul ',
            'email'=>'jakepaul@gmail.com',
            'password'=>Hash::make('12345678')
        ]);

        \App\User::Create([
            'name'=>'Logan Paul',
            'email'=>'loganpaul@gmail.com',
            'password'=>Hash::make('12345678')
        ]);

    }
}
