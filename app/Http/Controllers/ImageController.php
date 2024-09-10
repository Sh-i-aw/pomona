<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(Request $request): void
    {
        $request->validate([
            'image' => 'image',
        ]);

        $image = $request->image;

        Storage::put("images/$image->name", $image);
    }
}
