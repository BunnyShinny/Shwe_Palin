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
                "image"=> '/frontend/img/menu/bread/bread.jpg',
                "name"=> 'bread',
                "description"=> 'Triangle Myanmar Snack',
                "price"=> 150,
                "category_id"=> 1,
            ],
            [
                "image"=> '/frontend/img/menu/bread/brownies.jpg',
                "name"=> 'brownies',
                "description"=> 'Green Tea Leaf Drink',
                "price"=> 1000,
                "category_id"=> 1,
            ],
            [
                "image"=> '/frontend/img/menu/bread/coconut.jpg',
                "name"=> 'coconut',
                "description"=> 'a',
                "price"=> 100,
                "category_id"=> 1,
            ],
            [
                "image"=> '/frontend/img/menu/bread/putin.jpg',
                "name"=> 'putin',
                "description"=> 'Traditional Myanmar Fried Rice',
                "price"=> 1500,
                "category_id"=> 1,
            ],
            [
                "image"=> '/frontend/img/menu/bread/shwepalincake.jpg',
                "name"=> 'shwepalincake',
                "description"=> 'Choclate Cake',
                "price"=> 1500,
                "category_id"=> 1,
            ],

            [
                "image"=> '/frontend/img/menu/drinks/drink1.jpg',
                "name"=> 'drink1',
                "description"=> 'Triangle Myanmar Snack',
                "price"=> 150,
                "category_id"=> 2,
            ],
            [
                "image"=> '/frontend/img/menu/drinks/drink2.jpg',
                "name"=> 'drink2',
                "description"=> 'Green Tea Leaf Drink',
                "price"=> 1000,
                "category_id"=> 2,
            ],
            [
                "image"=> '/frontend/img/menu/drinks/drink3.jpg',
                "name"=> 'drink3',
                "description"=> 'a',
                "price"=> 100,
                "category_id"=> 2,
            ],
            [
                "image"=> '/frontend/img/menu/drinks/drink4.jpg',
                "name"=> 'drink4',
                "description"=> 'Traditional Myanmar Fried Rice',
                "price"=> 1500,
                "category_id"=> 2,
            ],
            [
                "image"=> '/frontend/img/menu/drinks/drink5.jpg',
                "name"=> 'drink5',
                "description"=> 'Choclate Cake',
                "price"=> 1500,
                "category_id"=> 2,
            ],


            [
                "image"=> '/frontend/img/menu/noodle/01.jpg',
                "name"=> 'Coconut Milk Noodle',
                "description"=> 'Triangle Myanmar Snack',
                "price"=> 150,
                "category_id"=> 3,
            ],

            [
                "image"=> '/frontend/img/menu/puff/chickencurry.jpg',
                "name"=> 'chickencurry',
                "description"=> 'Triangle Myanmar Snack',
                "price"=> 150,
                "category_id"=> 4,
            ],
            [
                "image"=> '/frontend/img/menu/puff/coconut.jpg',
                "name"=> 'coconut',
                "description"=> 'Green Tea Leaf Drink',
                "price"=> 1000,
                "category_id"=> 4,
            ],
            [
                "image"=> '/frontend/img/menu/puff/duck.jpg',
                "name"=> 'duck',
                "description"=> 'a',
                "price"=> 100,
                "category_id"=> 4,
            ],
            [
                "image"=> '/frontend/img/menu/puff/putin.jpg',
                "name"=> 'putin',
                "description"=> 'Traditional Myanmar Fried Rice',
                "price"=> 1500,
                "category_id"=> 4,
            ],
            [
                "image"=> '/frontend/img/menu/trad/chickenonionkyw.jpg',
                "name"=> 'chickenonionkyw',
                "description"=> 'Choclate Cake',
                "price"=> 1500,
                "category_id"=> 5,
            ],
            [
                "image"=> '/frontend/img/menu/trad/fishwavekyw.jpg',
                "name"=> 'fishwavekyw',
                "description"=> 'Choclate Cake',
                "price"=> 1500,
                "category_id"=> 5,
            ],
            [
                "image"=> '/frontend/img/menu/trad/friedrice.jpg',
                "name"=> 'friedrice',
                "description"=> 'Choclate Cake',
                "price"=> 1500,
                "category_id"=> 5,
            ],
            [
                "image"=> '/frontend/img/menu/trad/friedrice2.jpg',
                "name"=> 'friedrice2',
                "description"=> 'Choclate Cake',
                "price"=> 1500,
                "category_id"=> 5,
            ],
            [
                "image"=> '/frontend/img/menu/trad/htamintoke.jpg',
                "name"=> 'htamintoke',
                "description"=> 'Choclate Cake',
                "price"=> 1500,
                "category_id"=> 5,
            ],
            [
                "image"=> '/frontend/img/menu/trad/tearice.jpg',
                "name"=> 'tearice',
                "description"=> 'Choclate Cake',
                "price"=> 1500,
                "category_id"=> 5,
            ],

        ]);
    }
}
