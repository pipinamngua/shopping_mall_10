<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factory;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 1)->create();
    }
}
