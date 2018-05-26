<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factory;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Supplier::class, 20)->create();
    }
}
