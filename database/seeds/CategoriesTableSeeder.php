<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                "name"=> 'sa mu sar',
            ],
            [
                "name"=> 'Tea',
            ],
            [
                "name"=> 'Bayar Kyaw',
            ],
            [
                "name"=> 'Fried Rice',
            ],
            [
                "name"=> 'Brawnies',
            ],
            [
                "name"=> 'Tearice Salad',
            ],
            [
                "name"=> 'Putin Cake',
            ],
            [
                "name"=> 'Lemon Jucie',
            ],
            [
                "name"=> 'Coconut Milk Noodle',
            ],
            [
                "name"=> 'Strawberry Juice',
            ],
        ]);
    }
}
