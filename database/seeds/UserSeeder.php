<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin Testing',
                'email' => 'admin@app.com',
                'phone_no' => '03352968699',
                'device_token' => 'device_token',
                'address' => 'lahore',
                'latitude' => 'latitude',
                'longitude' => 'longitude',
                'role' => 'admin',
                 'gender' => 'men'
            ],
            [
                'name' => 'User Testing',
                'email' => 'user@app.com',
                'phone_no' => '03352968699',
                'device_token' => 'device_token',
                'address' => 'lahore',
                'latitude' => 'latitude',
                'longitude' => 'longitude',
                'role' => 'user',
                'gender' => 'women'
            ],
            [
                'name' => 'Business Testing',
                'email' => 'business@app.com',
                'phone_no' => '03352968699',
                'device_token' => 'device_token',
                'address' => 'lahore',
                'latitude' => 'latitude',
                'longitude' => 'longitude',
                'role' => 'business',
                'gender' => 'women'
            ],
        ];

        foreach ($users as $user) {
            $u = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'phone_no' => $user['phone_no'],
                'device_token' => $user['device_token'],
                'address' => $user['address'],
                'longitude' => $user['longitude'],
                'latitude' => $user['latitude'],
                'password' => bcrypt('Pa$$w0rd!'),
                'gender' => $user['gender'],
            ]);
            if (isset($user['role'])) {
                $role = Role::findByName($user['role']);
                $u->assignRole($role);
            }
        }
    }
}
