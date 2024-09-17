<?php

namespace App\View\Components;

use App\Models\cart;
use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $cart ;
    public $categorys ;
    public $totalBooks;
    public function __construct()
    {
        $this->categorys = Category::all();
        $userId = Auth::id(); 
        $this->cart = cart::where('user_id', $userId)->with('book')->get();

        
        $this->totalBooks = $this->cart->pluck('book_id')->unique()->count();
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string   
    {
        return view('components.user.navbar');
    }
}
