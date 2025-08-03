<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRatingRequest;
use App\Models\Author;
use App\Services\BookRatingServices;
use Illuminate\Http\Request;

class BookRatingController extends Controller
{
    protected $bookRatingServices;
    public function __construct(BookRatingServices $bookRatingServices)
    {
        $this->bookRatingServices = $bookRatingServices;
    }
    public function index(Request $request)
    {
        $books = $this->bookRatingServices->getBooks($request);

        return view('home', compact('books'));
    }
    public function topAuthors()
    {
        $topAuthors = $this->bookRatingServices->getTopAuthors();
        return view('top-authors', compact('topAuthors'));
    }
    public function createRating()
    {
        $authors = Author::orderBy('name')->get();
        return view('rating', compact('authors'));
    }
    public function getBooks(Author $author)
    {
        $books = $this->bookRatingServices->getBooksByAuthor($author);
        return response()->json($books);
    }
    public function storeRating(StoreRatingRequest $request)
    {
        $validated = $request->validated();
        $this->bookRatingServices->storeRating($validated);
        return redirect()->route('home')->with('success', 'Rating submitted successfully!');
    }
}
