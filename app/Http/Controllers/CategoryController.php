<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function indexPage()
    {
        return Inertia::render('Categories/Index');
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
}
