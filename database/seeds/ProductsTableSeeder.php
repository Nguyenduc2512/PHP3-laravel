<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $pro=[];
        $faker = Faker\Factory::create();

        for ($i=0 ; $i<20 ; $i++){
            $item =[
                'name'=>$faker->name,
                'image'=>'images/'.$faker->image('public/images',400,300, 'people', false),
                'details'=>$faker->realText($maxNbChars =200,$indexSize=2),
                'post_id'=>rand(109,127),
                'publish_date' => $faker->dateTime($max = 'now', $timezone = null),
        		'status' => rand(0, 1)
                ];
            $pro[]=$item;
        }
        DB::table('products')->insert($pro);
    }
}
