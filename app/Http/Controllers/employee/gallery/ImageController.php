<?php

namespace App\Http\Controllers\employee\gallery;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function images()
    {
        return view('employee.gallery.images');
    }

    public function images_upload(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg,webp,gif']
        ]);

        $target_directory = 'template/images/';

        $file_name = "ERPZingoImg-" . microtime(true) . "." . $request->image->extension();

        if ($request->image->move(public_path($target_directory), $file_name)) {
            $data = [
                'name' => Auth::user()->name,
                'user_id' => Auth::user()->id,
                'image' => $file_name,
            ];

            if (Image::create($data)) {
                return redirect()->back()->with(['success' => 'Successfully, Uploaded image!']);
            } else {
                return redirect()->back()->with(['failure' => 'Something went wrong!']);
            }
        } else {
            return redirect()->back()->with(['failure' => 'Unable to upload image!']);
        }
    }

    public function image_view() {
        return view('employee.gallery.image.index', [
            'images' => Auth::user()->images,
        ]);
    }

    public function destroy(Image $image)
    {
        $image = Image::find($image->id);

        if ($image) {
            $filePath = 'template/images/' . $image->image;

            if (File::exists(public_path($filePath))) {
                File::delete(public_path($filePath));

                $image->delete();

                return redirect()->back()->with(['success' => 'Image deleted successfully.']);
            } else {
                return redirect()->back()->with(['error' => 'File does not exist.']);
            }
        } else {
            return redirect()->back()->with(['error' => 'Video not found.']);
        }
    }
}
