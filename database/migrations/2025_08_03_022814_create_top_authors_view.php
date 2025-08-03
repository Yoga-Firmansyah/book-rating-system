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
            CREATE VIEW top_authors AS
            SELECT
                authors.id AS author_id,
                authors.name AS author_name,
                COUNT(ratings.id) AS upvote_count
            FROM authors
            JOIN books ON books.author_id = authors.id
            JOIN ratings ON ratings.book_id = books.id
            WHERE ratings.value > 5
            GROUP BY authors.id, authors.name
        SQL);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS top_authors');
    }
};
