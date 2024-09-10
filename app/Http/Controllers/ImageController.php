<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(ImageRequest $request): void
    {
        $image = $request->image;

        Storage::put("images/$image->name", $image);

        $image = Image::query()->create(['url' => Storage::url("images/$image->name")]);
    }
}
