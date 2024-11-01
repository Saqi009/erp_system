<?php

namespace App\Http\Controllers\admin\gallery;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DocumentController extends Controller
{
    public function files()
    {
        return view('admin.gallery.files');
    }

    public function files_upload(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:pdf,doc,docx,csv,ppt,txt,html']
        ]);

        $target_directory = 'template/files/';

        $file_name = $request->file->getClientOriginalName();

        if ($request->file->move(public_path($target_directory), $file_name)) {
            $data = [
                'user_id' => Auth::user()->id,
                'file' => $file_name,
            ];

            if (Document::create($data)) {
                return redirect()->back()->with(['success' => 'Successfully, Uploaded file!']);
            } else {
                return redirect()->back()->with(['failure' => 'Something went wrong!']);
            }
        } else {
            return redirect()->back()->with(['failure' => 'Unable to upload file!']);
        }
    }

    public function file_view()
    {
        return view('admin.gallery.file.index', [
            'files' => Auth::user()->files,
        ]);
    }

    public function destroy(Document $doc)
    {
        $doc = Document::find($doc->id);

        if ($doc) {
            $filePath = 'template/files/' . $doc->file;

            if (File::exists(public_path($filePath))) {
                File::delete(public_path($filePath));

                $doc->delete();

                return redirect()->back()->with(['success' => 'Image deleted successfully.']);
            } else {
                return redirect()->back()->with(['error' => 'File does not exist.']);
            }
        } else {
            return redirect()->back()->with(['error' => 'Video not found.']);
        }
    }
}
