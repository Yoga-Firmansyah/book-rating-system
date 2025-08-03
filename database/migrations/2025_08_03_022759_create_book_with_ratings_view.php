<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         DB::statement(<<<SQL
            CREATE VIEW book_with_ratings AS
            SELECT
                books.id,
                books.name,
                books.author_id,
                books.category_id,
                authors.name AS author_name,
                categories.name AS category_name,
                AVG(ratings.value) AS average_rating,
                COUNT(ratings.id) AS rating_count
            FROM books
            LEFT JOIN ratings ON ratings.book_id = books.id
            LEFT JOIN authors ON authors.id = books.author_id
            LEFT JOIN categories ON categories.id = books.category_id
            GROUP BY books.id, books.name, books.author_id, books.category_id, authors.name, categories.name
        SQL);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS book_with_ratings');
    }
};
