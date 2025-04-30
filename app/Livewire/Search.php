<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Search extends Component
{
    public string $query = "";
    public $postResults = [];
    public int $selectedIndex = 0;

    public function incrementIndex()
    {
        if ($this->selectedIndex == count($this->postResults) - 1) {
            $this->selectedIndex = 0;
            return;
        }
        $this->selectedIndex++;
    }

    public function decrementIndex()
    {
        if ($this->selectedIndex ==  0) {
            $this->selectedIndex = count($this->postResults) - 1;
            return;
        }
        $this->selectedIndex--;
    }

    public function updatedQuery()
    {
        $words = '%' . $this->query . '%';

        if (strlen($this->query) > 1) {
            $this->postResults = Post::where('titre', 'like', $words)
                ->orWhere('description', 'like', $words)
                ->get();
        } else {
            $this->postResults = [];
        }
    }

    public function showPost()
    {
        if (!empty($this->postResults) && isset($this->postResults[$this->selectedIndex])) {
            $result = $this->postResults[$this->selectedIndex];
            return redirect()->route('blog.show', [$result->id]);
        }
        return redirect()->back();
    }

    public function resetIndex()
    {
        $this->reset('selectedIndex');
    }
    

    public function resetText()
    {
        $this->reset(['query']);
    }

    public function render()
    {
        return view('livewire.search');
    }
}
