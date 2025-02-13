<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    public function index()
    {
        return Inertia::render('Backoffice/Dashboard');
    }

    public function create()
    {
        return Inertia::render('Backoffice/Books/Create');
    }
}
