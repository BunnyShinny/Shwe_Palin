<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                "image"=> '/assets/img/samusar_1587054020.jpg',
                "name"=> 'sa mu sar',
                "description"=> 'Triangle Myanmar Snack',
                "price"=> 150,
                "category_id"=> 1,
            ],
            [
                "image"=> '/assets/img/green-tea_1587030304.jpg',
                "name"=> 'Tea',
                "description"=> 'Green Tea Leaf Drink',
                "price"=> 1000,
                "category_id"=> 2,
            ],
            [
                "image"=> '/assets/img/ba ya kyaw_1587033883.jpg',
                "name"=> 'Bayar Kyaw',
                "description"=> 'a',
                "price"=> 100,
                "category_id"=> 1,
                "description"=> 'a',
                "price"=> 100,
                "category_id"=> 1,
            ],
            [
                "image"=> '/assets/img/friedrice_1587053964.jpg',
                "name"=> 'Fried Rice',
                "description"=> 'Traditional Myanmar Fried Rice',
                "price"=> 1500,
                "category_id"=> 5,
            ],
            [
                "image"=> '/assets/img/brownies_1587054105.jpg',
                "name"=> 'Brawnies',
                "description"=> 'Choclate Cake',
                "price"=> 1500,
                "category_id"=> 6,
            ],
            [
                "image"=> '/assets/img/tearice_1587054174.jpg',
                "name"=> 'Tearice Salad',
                "description"=> 'Traditional Tea leaves with rice salad',
                "price"=> 1000,
                "category_id"=> 5,
            ],
            [
                "image"=> '/assets/img/putin_1587054221.jpg',
                "name"=> 'Putin Cake',
                "description"=> 'Bread with putin inside',
                "price"=> 800,
                "category_id"=> 6,
            ],
            [
                "image"=> '/assets/img/drink9_1587054282.jpg',
                "name"=> 'Lemon Jucie',
                "description"=> 'Fresh lemon juice',
                "price"=> 1000,
                "category_id"=> 2,
            ],
            [
                "image"=> '/assets/img/01_1587054688.jpg',
                "name"=> 'Coconut Milk Noodle',
                "description"=> 'Fresh lemon juice',
                "price"=> 1000,
                "category_id"=> 3,
            ],
            [
                "image"=> '/assets/img/drink3_1587054748.jpg',
                "name"=> 'Lemon Jucie',
                "description"=> 'Fresh lemon juice',
                "price"=> 1000,
                "category_id"=> 2,
            ],
        ]);
    }
}
