<?php

namespace App\Livewire;

use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StarRating extends Component
{
    public $rating;
    public $post;

    public function mount($post)
    {
        $this->post = $post;
        $this->rating = Rating::where('post_id', $post->id)
                              ->where('user_id', Auth::id())
                              ->first()
                              ->rating ?? 0;
    }

    public function rate($value)
    {
        Rating::updateOrCreate(
            ['user_id' => Auth::id(), 'post_id' => $this->post->id],
            ['rating' => $value]
        );

        $this->rating = $value;
    }
    
    public function render()
    {
        return view('livewire.star-rating');
    }
}
