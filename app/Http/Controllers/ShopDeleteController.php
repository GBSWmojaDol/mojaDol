<?php

namespace App\Http\Controllers;

use App\Models\shop_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopDeleteController extends Controller
{
    public function store($id) {
        if (session('user') == null) return redirect('/');
        if (shop_info::where('shop_idx', $id)->where('user_id', session('user'))->count() == 0) return redirect('/shop/list/'.$id);
        shop_info::where('shop_idx', $id)->delete();

        return redirect('/shop/list');
    }
}
