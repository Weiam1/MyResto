<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('index'); // استبدل "welcome" باسم ملف العرض الخاص بك.
    }
}
