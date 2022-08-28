<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
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
                "category_id" => Str::uuid(),
                "name" => "women",
                "imageUrl" => "women.jpg"
            ],
            [
                "category_id" => Str::uuid(),
                "name" => "men",
                "imageUrl" => "men.jpg"
            ],
            [
                "category_id" => Str::uuid(),
                "name" => "kids",
                "imageUrl" => "kids.jpg"
            ],
            [
                "category_id" => Str::uuid(),
                "name" => "jewelry",
                "imageUrl" => "jewelry.jpg"
            ],
            [
                "category_id" => Str::uuid(),
                "name" => "cosmetics",
                "imageUrl" => "cosmetics.jpg"
            ],
            [
                "category_id" => Str::uuid(),
                "name" => "haircare",
                "imageUrl" => "haircare.jpg"
            ],
            [
                "category_id" => Str::uuid(),
                "name" => "furniture",
                "imageUrl" => "cosmetics.jpg"
            ],
        ]);
    }
}
