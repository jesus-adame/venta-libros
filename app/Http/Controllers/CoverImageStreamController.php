<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class CoverImageStreamController extends Controller
{
    public function __invoke(string $fileName)
    {
        abort_if(Storage::get('covers/' . $fileName) === null, 404);

        $image = Storage::get('covers/' . $fileName);
        $mimeType = Storage::mimeType('covers/' . $fileName);

        return response($image, 200, [
            'Content-Type' => $mimeType
        ]);
    }
}
