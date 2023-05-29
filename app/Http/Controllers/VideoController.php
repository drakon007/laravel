<?php

namespace App\Http\Controllers;

use App\models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function getVideoUploadForm() {
        return view('video.upload'); 
    }

    public function uploadvideo(Request $request) {
        $this->validate($request, [
            'title' => 'required|string|max:254',
            'video' => 'required|file|mimetypes:video/mp4',
        ]);

        $fileName = $request->video->getClientOriginalName();
        $filePath = 'videos/'. $fileName; // папка видео?
        $isFileUpload = Storage::disk('public')->put($filePath, file_get_contents($request->video));

        $url = Storage::disk('public')->url($filePath);

        if ($isFileUpload) {
            $video = new Video();
            $video->title = $request->title;
            $video->path = $filePath;
            $video->save();

            return back()->with('success', 'Video add');
        }
        return back()->with('error', 'Video dont add');

    }
}
