<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Clothing',
                'parent_id' => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Ethnic Wear',
                'parent_id' => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Foot Wear',
                'parent_id' => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Dresses',
                'parent_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Sweaters',
                'parent_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Short & Skirt',
                'parent_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Jeans',
                'parent_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Skirts & Tops',
                'parent_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Salwars',
                'parent_id' => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Saress',
                'parent_id' => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Flats',
                'parent_id' => 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Sandals',
                'parent_id' => 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Boots',
                'parent_id' => 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Heels',
                'parent_id' => 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ]);
    }
}
