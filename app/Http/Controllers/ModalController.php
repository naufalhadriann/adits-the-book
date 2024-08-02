<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class ModalController extends Controller
{
    public function index(){
        $categorys = Category::get();
        return view("admin.product.product", compact("categorys"));

    }
}
