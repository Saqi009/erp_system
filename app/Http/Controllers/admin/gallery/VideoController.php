<?php

namespace App\Http\Controllers\admin\gallery;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class VideoController extends Controller
{
    public function videos()
    {
        return view('admin.gallery.videos');
    }

    public function videos_upload(Request $request)
    {
        $request->validate([
            'video' => ['required', 'mimes:mp4,avi,mov,mkv,wmv,flv', 'max:102400']
        ]);

        $target_directory = 'template/videos/';

        $file_name = "ERPZingoVideo-" . microtime(true) . "." . $request->video->extension();

        if ($request->video->move(public_path($target_directory), $file_name)) {
            $data = [
                'user_id' => Auth::user()->id,
                'video' => $file_name,
            ];

            if (Video::create($data)) {
                return redirect()->back()->with(['success' => 'Successfully, Uploaded video!']);
            } else {
                return redirect()->back()->with(['failure' => 'Something went wrong!']);
            }
        } else {
            return redirect()->back()->with(['failure' => 'Unable to upload video!']);
        }
    }

    public function video_view()
    {
        return view('admin.gallery.video.index', [
            'videos' => Auth::user()->videos,
        ]);
    }

    public function destroy(Video $video)
    {
        $video = Video::find($video->id);

        if ($video) {
            $filePath = 'template/videos/' . $video->video;

            if (File::exists(public_path($filePath))) {
                File::delete(public_path($filePath));

                $video->delete();

                return redirect()->back()->with(['success' => 'Video deleted successfully.']);
            } else {
                return redirect()->back()->with(['error' => 'File does not exist.']);
            }
        } else {
            return redirect()->back()->with(['error' => 'Video not found.']);
        }
    }
}
