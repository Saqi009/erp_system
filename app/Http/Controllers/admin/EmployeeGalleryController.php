<?php

namespace App\Http\Controllers\admin;

use App\Models\Image;
use App\Models\Video;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeGalleryController extends Controller
{
    public function index() {
        return view('admin.employee_gallery.index', [
            'images' => Image::get(),
            'videos' => Video::get(),
            'files' => Document::get(),
        ]);
    }
}
