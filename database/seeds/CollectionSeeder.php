<?php

use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collections = [
            [
                'title' => 'Kurta',
                'description' => 'J. Kurta',
                'image' => 'kurta.png',
                'category_id' => '1',
                'business_id' => '1',
                'item_id' => '1',
                'brand_id' => '1',
                'product_type_id' => '1',
            ],

        ];
        DB::table('collections')->insert($collections);
    }
}
