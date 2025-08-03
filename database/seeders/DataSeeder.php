<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chunk = 200;
        // 1. Seed Authors
        echo "Seeding 1000 authors...\n";
        $authors = [];
        $authorStartId = DB::table('authors')->max('id') + 1;

        for ($i = 0; $i < 1000; $i++) {
            $authors[] = [
                'name' => fake()->name(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
            if (count($authors) == $chunk) {
                DB::table('authors')->insert($authors);
                $authors = [];
            }
        }
        if (count($authors) > 0) {
            DB::table('authors')->insert($authors);
            $authors = [];
        }
        $authorEndId = DB::table('authors')->max('id');

        // 2. Seed Categories
        echo "Seeding 3000 categories...\n";
        $categories = [];
        $categoryStartId = DB::table('categories')->max('id') + 1;

        for ($i = 0; $i < 3000; $i++) {
            $categories[] = [
                'name' => fake()->name(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
            if (count($categories) == $chunk) {
                DB::table('categories')->insert($categories);
                $categories = [];
            }
        }
        if (count($categories) > 0) {
            DB::table('categories')->insert($categories);
            $categories = [];
        }
        $categoryEndId = DB::table('categories')->max('id');

        // 3. Seed Books
        echo "Seeding 100000 books...\n";
        $books = [];
        $bookStartId = DB::table('books')->max('id') + 1;

        for ($i = 0; $i < 100000; $i++) {
            $books[] = [
                'name' => fake()->name(),
                'author_id' => fake()->numberBetween($authorStartId, $authorEndId),
                'category_id' => fake()->numberBetween($categoryStartId, $categoryEndId),
                'created_at' => now(),
                'updated_at' => now(),
            ];
            if (count($books) == $chunk) {
                DB::table('books')->insert($books);
                $books = [];
            }
        }
        if (count($books) > 0) {
            DB::table('books')->insert($books);
            $books = [];
        }
        $bookEndId = DB::table('books')->max('id');

        // 4. Seed Ratings
        echo "Seeding 500000 ratings...\n";
        $ratings = [];
        for ($i = 0; $i < 500000; $i++) {
            $ratings[] = [
                'book_id' => fake()->numberBetween($bookStartId, $bookEndId),
                'value' => fake()->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
            if (count($ratings) == $chunk) {
                DB::table('ratings')->insert($ratings);
                $ratings = [];
            }
        }
        if (count($ratings) > 0) {
            DB::table('ratings')->insert($ratings);
            $ratings = [];
        }

        echo "DONE: Seeding complete.\n";
    }
}
