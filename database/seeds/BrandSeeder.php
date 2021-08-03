<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'name' => 'Nike',
                'image' => 'men.jpg',
            ],

        ];
        DB::table('brands')->insert($brands);
    }
}
