<?php

namespace App\Http\Controllers;

use App\Models\shop_info;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if (session('user') == null) return redirect('/');
        return view('Search');
    }
}
