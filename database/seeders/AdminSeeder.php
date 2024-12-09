<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
            'name' =>  'Administrator', 
             'email'=> 'superAdmin@gmail.com',
             'phone'=> '08079007308',
             'password' => 'admin@123',
             'email_verified_at'=> now(),
            ]
        ];

        foreach( $admins as $admin){
            Admin::firstOrCreate($admin);
        }
    }
}
