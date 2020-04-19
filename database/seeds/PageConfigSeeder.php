<?php

use Illuminate\Database\Seeder;

class PageConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $about = \App\Page_config::Create([
            'title'=>'About Us',
            'short_intro'=>'We Just Build Things which is quite hard to understand',
            'image'=>'blank.jpg'
        ]);

        $contact = \App\Page_config::Create([
            'title'=>'Contact Us',
            'short_intro'=>'Feel Free To Contact US MATES.',
            'image'=>'blank.jpg'
        ]);

        $team = \App\Page_config::Create([
            'title'=>'Meet The Team',
            'short_intro'=>'This is our team , We love to do anything bitch when it comes to our head , dosnot matter what it is',
            'image'=>'blank.jpg'
        ]);

        $site_config = \App\site_details::create([
            'site_name'=>'Susleo',
            'email'=>'susleo@susleo.com',
            'phone'=>'+241 62 32446',
            'address'=>'203 Fake St. Mountain View, San Francisco, California, USA' ,
            'facebook'=>'susleo',
            'instagram'=>'susleo'

        ]);
    }
}
