<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;

class Like extends Component
{
    public Video $video;
    public int $count;
    public function mount(Video $video)
    {
        $this->video = $video;
        $this->count = $video->likes_count;
    }

    public function like(): void
    {
        if($this->video->isLiked()) {
            $this->video->removeLike();

            $this->count--;
        } elseif (auth()->user()) {
            $this->video->likes()->create([
                'user_id' => auth()->user()->id,
            ]);

            $this->count++;
        } elseif (($ip = request()->ip()) && ($userAgent = request()->userAgent())) {
            $this->video->likes()->create([
                'ip' => $ip,
                'user_agent' => $userAgent,
            ]);

            $this->count++;
        }
    } 

    public function render()
    {
        return view('components.like');
    }


}
