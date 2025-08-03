<?php

namespace App\Services;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookWithRating;
use App\Models\Rating;
use App\Models\TopAuthors;

class BookRatingServices
{
    public function getBooks($request)
    {
        $query = BookWithRating::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('author_name', 'like', "%$search%");
            });
        }
        return $query->orderByDesc('average_rating')
            ->orderByDesc('rating_count')
            ->paginate($request->input('filter') ?? 10);
    }
}
