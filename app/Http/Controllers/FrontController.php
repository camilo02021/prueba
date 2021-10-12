<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Book;
use App\Category;
use App\CategoryBook;


class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 9;
        $categories = Category::all();
        $latestBooks = Book::where('featured', true)->paginate(3);
        $featuredBooks = Book::where('featured', true)->paginate(3);
        
        //Sort books by category
        if (request()->categoria) {
            $category_slug = request()->categoria;             
            //inner join.
            

            $books = Book::join('category_book', 'books.id', '=', 'category_book.book_id')
            ->select('category_book.*', 'books.name', 'books.price')->where('category_slug', $category_slug)
            ->get(); 

        } else {
            $books = Book::all();
        }
        //
        
        //Sort books by low-high
        if (request()->sort == 'low_high') {
            $books = $books->orderBy('price');
        } elseif (request()->sort == 'high_low') {
            $books = $books->orderBy('price', 'desc');
        } else {
            $books = $books;
        }
        //

        return view('front.shop')->with([
            'books' => $books,
            'categories' => $categories,
            'latestBooks' => $latestBooks,
            'featuredBooks' => $featuredBooks,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();
        $mightAlsoLike = Book::where('slug', '!=', $slug)->mightAlsoLike()->get();

        $stockLevel = getStockLevel($book->quantity);

        return view('book')->with([
            'book' => $book,
            'stockLevel' => $stockLevel,
            'mightAlsoLike' => $mightAlsoLike,
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');

        // $book = book::where('name', 'like', "%$query%")
        //                    ->orWhere('details', 'like', "%$query%")
        //                    ->orWhere('description', 'like', "%$query%")
        //                    ->paginate(10);

        $books = Book::search($query)->paginate(10);

        return view('search-results')->with('books', $books);
    }

}
