<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function indexPage()
    {
        return Inertia::render('Backoffice/Categories/Index');
    }

    public function index(Request $request)
    {
        $query = Category::query();

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
        return Inertia::render('Backoffice/Categories/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:categories,name'],
        ]);

        $category = new Category($request->only('name'));
        $category->slug = Str::slug($request->input('name'));

        if ($request->file('image')) {
            /** @var UploadedFile */
            $image = $request->file('image');

            $storedImage = Storage::put('covers', $image);

            $category->image = $storedImage;
        }

        $category->save();

        return response()->json([
            'message' => 'Categoría registrada correctamente',
            'category' => $category,
        ]);
    }

    public function destroy(string $category)
    {
        $category = Category::find($category);

        abort_if(is_null($category), 404);

        $category->delete();

        return response()->json([
            'message' => 'Categoría eliminada correctamente'
        ]);
    }
}
