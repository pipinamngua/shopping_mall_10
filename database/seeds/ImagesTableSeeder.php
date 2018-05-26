<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factory;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Image::class, 30)->create();
    }
}
