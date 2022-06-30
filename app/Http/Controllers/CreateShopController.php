<?php

namespace App\Http\Controllers;

use App\Models\shop_info;
use App\Models\shop_menu;
use App\Models\shop_menu_img;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateShopController extends Controller
{
    public function index() {
        return view('AddStore')->with('info', null)->with('menu', null);
    }

    public function store(Request $request) {

        $now = now();
        $shop_info = new shop_info();

        $shop_info->user_id = session('user');
        $shop_info->shop_name = $request->shop_name;
        $shop_info->shop_addr = $request->shop_addr;
        $shop_info->shop_addr2 = $request->shop_addr2;
        $shop_info->category_num = $request->category_num;
        $shop_info->tel_num1 = $request->tel1;
        $shop_info->tel_num2 = $request->tel2;
        $shop_info->tel_num3 = $request->tel3;
        $shop_info->package_bool = $request->package;
        $shop_info->toilet_bool = $request->toilet;
        $shop_info->internet_bool = $request->internet;
        $shop_info->reserv_bool = $request->reserv;
        $shop_info->site_addr = $request->site_addr;
        $shop_info->write_day = $now;
        $shop_info->edit_day = null;

        $shop_info->save();

        if ($request->hasFile('menuImage')) {
            $image = $request->file('menuImage');
            $name = time()."_".session('user');
            $image_name = $name .".".$image->getClientOriginalExtension();
            $image->move(public_path('shop'), $image_name);

            $shop_menu = new shop_menu();

            $shop_menu->shop_idx = shop_info::where('write_day', $now)->first()->shop_idx;
            $shop_menu->menu_name = $request->menuName;
            $shop_menu->menu_price = $request->menuPrice;
            $shop_menu->img_address = 'shop/'. $image_name;
            $shop_menu->img_name = $name;
            $shop_menu->original_img_name = $image->getClientOriginalName();

            $shop_menu->save();
        }

        return redirect('/Main');
    }
}
