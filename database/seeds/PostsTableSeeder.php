<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $category1 = \App\Category::Create(['name'=>'Travel',]);
        $category2 = \App\Category::Create(['name'=>'Politics',]);
        $category3 = \App\Category::Create(['name'=>'Tech',]);
        $category4 = \App\Category::Create(['name'=>'Entertainment',]);
        $category4 = \App\Category::Create(['name'=>'Sports',]);



        $post1 = \App\Post::Create([
            'title'=>'The AI magically removes moving objects from videos',
            'description'=>'default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'contents'=>' Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id'=>$category1->id,
            'image'=>'posts/6.jpg',
            'user_id'=>1,
            'published_at'=>today(),

        ]);
        $post2 = \App\Post::Create([
            'title'=>'The AI magically removes moving objects from videos',
            'description'=>'default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'contents'=>' Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id'=>$category2->id,
            'image'=>'posts/5.jpg',
            'user_id'=>2,
            'published_at'=>today(),

        ]);

        $post3 = \App\Post::Create([
            'title'=>'The AI magically removes moving objects from videos',
            'description'=>'default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'contents'=>' Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id'=>$category3->id,
            'image'=>'posts/4.jpg',
            'user_id'=>1,
            'published_at'=>today(),

        ]);


        $post4 = \App\Post::Create([
            'title'=>'The AI magically removes moving objects from videos',
            'description'=>'default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'contents'=>' Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id'=>$category4->id,
            'image'=>'posts/3.jpg',
            'user_id'=>1,
            'published_at'=>today(),

        ]);


        $post5 = \App\Post::Create([
            'title'=>'The AI magically removes moving objects from videos',
            'description'=>'default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'contents'=>' Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id'=>$category3->id,
            'image'=>'posts/2.jpg',
            'user_id'=>3,
            'published_at'=>today(),

        ]);


        $post6 = \App\Post::Create([
            'title'=>'The AI magically removes moving objects from videos',
            'description'=>'default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'contents'=>' Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id'=>$category1->id,
            'image'=>'posts/3.jpg',
            'user_id'=>2,
            'published_at'=>today(),

        ]);

        $tag1=\App\Tag::Create(['name'=>'primMinister']);
        $tag2=\App\Tag::Create(['name'=>'badmintion']);
        $tag3=\App\Tag::Create(['name'=>'coronaVirus']);
        $tag4=\App\Tag::Create(['name'=>'tesla']);

        $post1->tags()->attach([$tag1->id,$tag2->id,$tag4->id]);
        $post2->tags()->attach([$tag3->id,$tag4->id]);
        $post3->tags()->attach([$tag4->id,$tag2->id]);
        $post4->tags()->attach([$tag1->id,$tag3->id,$tag1->id]);
        $post5->tags()->attach([$tag2->id,$tag4->id]);
        $post6->tags()->attach([$tag1->id,$tag4->id]);


    }
}
