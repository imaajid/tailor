<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'name' => 'Shalwar',
                'image' => 'men.jpg',
            ],

        ];
        DB::table('items')->insert($items);
    }
}
