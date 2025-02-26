<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    public function indexPage()
    {
        return Inertia::render('Books/Index');
    }

    public function showPage(string $book)
    {
        $book = Book::where('slug', $book)->first();

        abort_if(is_null($book), 404);

        return Inertia::render('Books/Show', [
            'book' => $book,
        ]);
    }

    public function show(string $book)
    {
        $book = Book::find($book);

        abort_if(is_null($book), 404);

        return response()->json([
            'book' => $book,
        ]);
    }

    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->input('items')) {
            $limit = $request->items;

            $query->limit($limit);
        }

        if ($request->input('category')) {
            $category = $request->category;
            $query->where('category_id', $category);
        }

        $data = $query->orderByDesc('created_at')->get();

        return response()->json([
            'data' => $data,
        ]);
    }
}
