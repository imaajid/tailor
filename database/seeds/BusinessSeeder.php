<?php

use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $businesses = [
            [
                'user_id' => '3',
                'business_email' => 'business_email@app.com',
                'opening_time' => '7 AM',
                'closing_time' => '10 PM',
                'profile_image' => 'profile.png',
                'shop_image' => 'shop.png',
            ],
            ];
        DB::table('businesses')->insert($businesses);
    }
}
