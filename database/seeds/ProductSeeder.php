<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'title' => 'Kurta',
                'description' => 'J. Kurta',
                'image' => 'kurta.png',
                'category_id' => '1',
                'product_type_id' => '1',
                'business_id' => '1',
                'item_id' => '1',
                'brand_Id' => '1',
                'discount' => '50',
                'price' => '5000'
            ],

        ];
        DB::table('products')->insert($products);
    }
}
