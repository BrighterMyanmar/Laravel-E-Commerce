<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            'name'=>'bmcoder',
            'email'=>'bmcoder@gmail.com',
            'phone'=>'09400400400',
            'password'=>bcrypt('123123123')
        ]);
    }
}
