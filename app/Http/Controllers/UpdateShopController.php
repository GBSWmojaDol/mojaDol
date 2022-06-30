<?php

namespace App\Http\Controllers;

use App\Models\shop_good;
use App\Models\shop_info;
use App\Models\shop_menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateShopController extends Controller
{
    public function index($id) {
        if (session('user') == null) return redirect('/');
        if (shop_info::where('shop_idx', $id)->where('user_id', session('user'))->count() === 0) return redirect('/shop/list/'+$id);
        return view('AddStore')
            ->with('info', shop_info::where('shop_idx', $id)->first())
            ->with('menu', shop_menu::where('shop_idx', $id)->first());
    }

    public function idIndex($id) {
        if (session('user') == null) return redirect('/');
        return view('DetailsPage')->with('data', shop_info::where('shop_idx', $id)->first())->with('shop_good', shop_good::where('shop_idx', $id)->count());
    }

    public function store(Request $request, $id) {
        $cnt = DB::table('shop_info')->where('shop_idx', $id)->where('user_id', session('user'))->count();

        if ($cnt == 0) return redirect('/shop/list/' + $id);

        shop_info::where('shop_idx', $id)
            ->update([
                'shop_name' => $request->shop_name,
                'shop_addr' => $request->shop_addr,
                'shop_addr2' => $request->shop_addr2,
                'category_num' => $request->category_num,
                'tel_num1' => $request->tel1,
                'tel_num2' => $request->tel2,
                'tel_num3' => $request->tel3,
                'package_bool' => $request->package_bool,
                'toilet_bool' => $request->toilet_bool,
                'internet_bool' => $request->internet_bool,
                'reserv_bool' => $request->reserv_bool,
                'site_addr' => $request->site_addr,
                'edit_day' => now()
            ]);

        if ($request->hasFile('menuImage')) {
            $image = $request->file('menuImage');
            $name = time()."_".session('user');
            $image_name = $name .".".$image->getClientOriginalExtension();
            $image->move(public_path('shop'), $image_name);

            shop_menu::where('shop_idx', $id)
            ->update([
                'menu_name' => $request->menuName,
                'menu_price' => $request->menuPrice,
                'img_address' => 'shop/'. $image_name,
                'img_name' => $image_name,
                'original_img_name' => $request->file('menuImage')->getClientOriginalName(),
            ]);
        } else {
            shop_menu::where('shop_idx', $id)
            ->update([
                'menu_name' => $request->menuName,
                'menu_price' => $request->menuPrice,
            ]);
        }

        return redirect('/shop/list/'.$id);
    }
}
