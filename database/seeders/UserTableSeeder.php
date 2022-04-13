<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
           'name'=>'mehmet',
           'email'=>'mehmet@mehmet.com',
           'password'=>bcrypt('12345'),
       ]);
        User::create([
            'name'=>'ahmet',
            'email'=>'ahmet@ahmet.com',
            'password'=>bcrypt('12345'),
        ]);
        User::create([
            'name'=>'hüseyin',
            'email'=>'huseyin@huseyin.com',
            'password'=>bcrypt('12345'),
        ]);
    }
}
