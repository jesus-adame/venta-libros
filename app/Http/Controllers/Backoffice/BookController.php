<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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

        $data = $query->orderByDesc('created_at')->get();

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

        if ($request->file('image')) {
            /** @var UploadedFile */
            $image = $request->file('image');

            $storedImage = Storage::put('covers', $image);

            $book->image = $storedImage;
        }

        $book->slug = Str::slug($book->name);
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

        if ($request->file('image')) {
            if (! empty(Storage::get($book->image ?? null))) {
                Storage::delete($book->image);
            }

            /** @var UploadedFile */
            $image = $request->file('image');

            $storedImage = Storage::put('covers', $image);

            $book->image = $storedImage;
        }

        $book->slug = Str::slug($book->name);
        $book->save();

        return response()->json([
            'message' => 'Libro actualizado correctamente',
            'book' => $book,
        ]);
    }

    public function destroy(string $book)
    {
        $book = Book::find($book);

        abort_if(is_null($book), 404);

        if (! empty(Storage::get($book?->image ?? ''))) {
            Storage::delete($book->image);
        }

        $book->delete();

        return response()->json([
            'message' => 'Libro eliminado correctamente',
        ]);
    }
}
