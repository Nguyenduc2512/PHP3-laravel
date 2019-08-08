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
        $posts=[];
        $faker = Faker\Factory::create();

        for ($i=0 ; $i<20 ; $i++){
            $item =[
                'title'=>$faker->name,
                'image'=>'images/'.$faker->image('public/images',400,300, 'people', false),
                'content'=>$faker->realText($maxNbChars =200,$indexSize=2),
                'author_id'=>rand(1,10),
                'category_id'=>rand(25,30),
                'publish_date' => $faker->dateTime($max = 'now', $timezone = null),
        		'status' => rand(0, 1)
                ];
            $posts[]=$item;
        }
        DB::table('posts')->insert($posts);
    }
}
