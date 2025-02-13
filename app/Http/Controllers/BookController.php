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

    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->input('items')) {
            $limit = $request->items;

            $query->limit($limit);
        }

        $data = $query->orderByDesc('created_at')->get();

        return response()->json([
            'data' => $data,
        ]);
    }
}
