<?php
namespace App\View\Components;

use Illuminate\View\Component;

class Icon extends Component
{
    public $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function render()
    {
        return view('components.icon');
    }
}
