<?php

namespace App\Http\Controllers;

use App\models\Video;
use App\models\Raiting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function index() {
        return view('video.index');
    }

    public function show($id) {

        $video = DB::table('videos')
        ->select('title', 'discription', 'path' ,'category', 'id', 'created_at')
        ->where('id','=', $id)
        ->get();

        return view('video.show', ['video' => $video]);
    }

    public function getVideo($id) {
        $path = Video::find($id)->path;
        $file = Storage::disk('public')->get($path);
        return response($file,200)->header('Content-Type', 'video/mp4');
    }

    public function renderVideo() {
        $video = DB::table('videos')
        ->select('title',  'path', 'id', 'created_at')
        ->limit(10)
        ->orderBy('updated_at')
        ->get();

        foreach ($video as $key => $video_item) {
            $video[$key] = (array) $video_item;
        }

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
        $filePath = 'videos\\'. $fileName;
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

    // public function like($id_user, $id_video ,$status) {
    //    if ($status == true) {
    //     $rating = new Raiting();
    //     $rating->video_id = $id_video;
    //     $rating->user_id = $id_user;
    //     $rating->rating_action = true;
    //     $rating->save();

    //     return back()->with('success', 'like');
    //    } else {
    //     $rating = new Raiting();
    //     $rating->video_id = $id_video;
    //     $rating->user_id = $id_user;
    //     $rating->rating_action = false;
    //     $rating->save();

    //     return back()->with('success', 'dislike');
    //    }
    // }

    public function like($id) {
        $video = Video::find($id);
        $video->like();
        $video->save();

        return redirect()->route('render')->with('message', 'Like video');
    }

    public function dislike($id) {
        $video = Video::find($id);
        $video->unlike();
        $video->save();

        return redirect()->route('render')->with('message', 'Dislike video');
    }
}
