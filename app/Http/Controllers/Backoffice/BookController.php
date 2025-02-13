<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    public function indexPage()
    {
        return Inertia::render('Backoffice/Books/Index');
    }

    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->input('items')) {
            $limit = $request->items;

            $query->limit($limit);
        }

        $data = $query->get();

        return response()->json([
            'data' => $data,
        ]);
    }

    public function create()
    {
        return Inertia::render('Backoffice/Books/Create');
    }

    public function store(CreateBookRequest $request)
    {
        $book = new Book($request->validated());
        $book->save();

        return response()->json([
            'message' => 'Libro registrado correctamente',
            'book' => $book,
        ]);
    }

    public function edit(string $book)
    {
        $book = Book::find($book);

        abort_if(is_null($book), 404);

        return Inertia::render('Backoffice/Books/Edit', [
            'book' => $book,
        ]);
    }

    public function update(UpdateBookRequest $request, string $book)
    {
        $book = Book::find($book);

        abort_if(is_null($book), 404);

        $book->update($request->validated());

        return response()->json([
            'message' => 'Libro actualizado correctamente',
            'book' => $book,
        ]);
    }

    public function destroy(string $book)
    {
        $book = Book::find($book);

        abort_if(is_null($book), 404);

        $book->delete();

        return response()->json([
            'message' => 'Libro eliminado correctamente',
        ]);
    }
}
