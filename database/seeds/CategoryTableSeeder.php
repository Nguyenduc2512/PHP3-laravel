<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cate =[
            ['name'=>'the thao'],
            ['name'=>'van hoa'],
            ['name'=>'giao duc'],
            ['name'=>'chinh tri'],
            ['name'=>'suc khoe'],
            ['name'=>'lam dep'],

        ];
            DB::table('catrgories')->insert($cate);
        $posts = App\Posts::all();
        foreach ($posts as $item){
            $item->category_id = rand(1,7);
            $item->save();
    }
    }
}
