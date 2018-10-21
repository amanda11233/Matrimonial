<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Illuminate\Support\Facades\Hash;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('asdasd'),
        );
        Admin::create($data);
    }
}
