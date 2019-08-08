<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[];
        $faker = Faker\Factory::create();

        for ($i=0 ; $i<10 ; $i++){
            $item =[
                'name'=>$faker->name,
                'email'=>$faker->email,
                'password'=>$faker->password,
            ];
            $users[]=$item;
        }
        DB::table('users')->insert($users);
    }
}
