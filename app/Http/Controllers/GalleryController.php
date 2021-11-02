<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
