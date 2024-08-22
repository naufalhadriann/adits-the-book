<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;
use App\Models\User;
use App\Models\Book;

class modal extends Component
{
    public $categories;
    public $users;
    public $modalType;

    public function __construct($modalType)
    {
        $this->categories = Category::all(); // Fetch all categories
        $this->users = User::all(); // Fetch all categories
        $this->modalType = $modalType;
    }

    public function render()
    {
        return view('components.admin.modal');
    }
}
