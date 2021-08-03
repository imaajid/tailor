<?php

use Illuminate\Database\Seeder;

class ProductMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_menus = [
            [
                'item_id' => '1',
                'price' => '600',
            ],

        ];
        DB::table('product_menus')->insert($product_menus);
    }
}
