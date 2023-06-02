<?php

namespace App\Http\Controllers;

use App\models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function index() {
        return view('video.index'); 
    }

    public function show() {
        return view('video.show');
    }

    public function renderVideo() {
        $video = DB::table('videos')
        ->select('title', 'discription', 'path' ,'category')
        ->limit(3)
        ->orderBy('updated_at')
        ->get();
        return view('video.render', ['video' => $video]);
    }

    public function uploadvideo(Request $request) {
        $this->validate($request, [
            'title' => 'required|string|max:254',
            'discription' => 'required|string',
            'category' => 'required|string|max:254',
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
            $video->discription = $request->discription;
            $video->category = $request->category;
            $video->save();

            return back()->with('success', 'Video add');
        }
        return back()->with('error', 'Video dont add');

    }
}
