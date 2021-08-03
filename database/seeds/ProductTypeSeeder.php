<?php

use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_types = [
            [
                'name' => 'Winter',
                'image' => 'men.jpg',
            ],

        ];
        DB::table('product_types')->insert($product_types);
    }
}
