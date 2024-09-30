<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;
use App\Models\User;
use App\Models\Book;

class greetings extends Component
{
    public $categories;
    public $users;
  

    public function __construct()
    {
        $this->categories = Category::all(); // Fetch all categories
        $this->users = User::all(); // Fetch all categories
    }

    public function render()
    {
        return view('components.modal');
    }
}
