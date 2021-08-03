<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductTypeSeeder::class);
        $this->call(ProductMenuSeeder::class);
        $this->call(CollectionSeeder::class);
        $this->call(BusinessSeeder::class);
    }
}
