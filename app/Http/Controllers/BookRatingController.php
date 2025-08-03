<?php

namespace App\Http\Controllers;

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
}
