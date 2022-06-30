<?php

namespace App\Http\Controllers;

use App\Models\access_user;
use App\Models\category;
use App\Models\review_good;
use App\Models\review_img;
use App\Models\review_info;
use App\Models\review_report;
use App\Models\shop_good;
use App\Models\shop_info;
use App\Models\shop_menu;
use App\Models\user_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function idCheck($id, Request $request)
    {

        $access_token = $request->header('access_token');

        if (access_user::where('access_token', $access_token)->count() !== 1) return response()->json(['text' => 'wrong token.'], 404);

        $token = access_user::where('access_token', $access_token)->first();
        $token->last_access = now();
        $token->save();

        if (user_info::where('user_id', $id)->count() == 0)
            return response()
                ->json([
                    'text' => 'true'
                ], 200);
        return response()
            ->json([
                'text' => 'false'
            ], 400);
    }

    public function shopGood($id, Request $request)
    {

        $access_token = $request->header('access_token');

        if (access_user::where('access_token', $access_token)->count() !== 1) return response()->json(['text' => 'wrong token.'], 404);

        $token = access_user::where('access_token', $access_token)->first();
        $token->last_access = now();
        $token->save();

        if (
            shop_good::where('shop_idx', $id)
            ->where('user_id', $request->header('user'))
            ->count() === 0
        ) {
            $shop_good = new shop_good();
            $shop_good->shop_idx = $id;
            $shop_good->user_id = $request->header('user');
            $shop_good->save();

            return response()
                ->json([
                    'text' => 'true'
                ], 200);
        }

        return response()
            ->json([
                'text' => 'false'
            ], 400);
    }

    public function reviewGood($id, Request $request)
    {

        $access_token = $request->header('access_token');

        if (access_user::where('access_token', $access_token)->count() !== 1) return response()->json(['text' => 'wrong token.'], 404);

        $token = access_user::where('access_token', $access_token)->first();
        $token->last_access = now();
        $token->save();

        if (
            review_good::where('review_idx', $id)
            ->where('user_id', $request->header('user'))
            ->count() == 0
        ) {

            $review_good = new review_good();
            $review_good->review_idx = $id;
            $review_good->user_id = $request->header('user');

            $review_good->save();

            return response()
                ->json([
                    'text' => 'true'
                ], 200);
        }

        return response()
            ->json([
                'text' => 'false'
            ], 400);
    }

    public function reviewReport($id, Request $request)
    {

        $access_token = $request->header('access_token');

        if (access_user::where('access_token', $access_token)->count() !== 1) return response()->json(['text' => 'wrong token.'], 404);

        $token = access_user::where('access_token', $access_token)->first();
        $token->last_access = now();
        $token->save();

        if (
            review_report::where('review_idx', $id)->where('user_id', $request->header('user'))
            ->count() === 0
        ) {
            $review_report = new review_report();
            $review_report->review_idx = $id;
            $review_report->user_id = $request->header('user');
            $review_report->save();

            return response()
                ->json([
                    'text' => 'true'
                ], 200);
        }

        return response()
            ->json([
                'text' => 'false'
            ], 400);
    }

    public function search($value, Request $request)
    {

        $access_token = $request->header('access_token');

        if (access_user::where('access_token', $access_token)->count() !== 1) return response()->json(['text' => 'wrong token.'], 404);

        $token = access_user::where('access_token', $access_token)->first();
        $token->last_access = now();
        $token->save();

        $datas = [];

        $shops = shop_info::where('shop_name', 'like', '%' . $value . '%')->get();
        foreach ($shops as $shop) {
            $data = [
                'id' => $shop->shop_idx,
                'title' => $shop->shop_name,
                'good' => shop_good::where('shop_idx', $shop->shop_idx)->count(),
                'addr' => $shop->shop_addr,
                'addr2' => $shop->shop_addr2,
                'category' => category::where('category_num', $shop->category_num)->first()->category_name,
            ];
            array_push($datas, $data);
        }
        return response()->json($datas, 200);
    }

    public function searchDetail($id, Request $request)
    {

        $access_token = $request->header('access_token');

        if (access_user::where('access_token', $access_token)->count() !== 1) return response()->json(['text' => 'wrong token.'], 404);

        $token = access_user::where('access_token', $access_token)->first();
        $token->last_access = now();
        $token->save();

        if (shop_info::where('shop_idx', $id)->count() == 0) return response()->json(['text' => null], 200);

        $shop = shop_info::where('shop_idx', $id)->first();
        $data = [
            'title' => $shop->shop_name,
            'writer' => user_info::where('user_id', $shop->user_id)->first()->nickname,
            'good' => shop_good::where('shop_idx', $shop->shop_idx)->count(),
            'category' => category::where('category_num', $shop->category_num)->first()->category_name,
            'addr' => $shop->shop_addr,
            'addr2' => $shop->shop_addr2,
            'tel1' => $shop->tel_num1,
            'tel2' => $shop->tel_num2,
            'tel3' => $shop->tel_num3,
            'package' => $shop->package_bool,
            'toilet' => $shop->toilet_bool,
            'internet' => $shop->internet_bool,
            'reserv' => $shop->reserv_bool,
            'site' => $shop->site_addr,
            'write_day' => $shop->write_day,
            'edit_day' => $shop->edit_day,
            'star' => shop_good::where('shop_idx', $id)->count(),
            'img_address' => shop_menu::where('shop_idx', $id)->first()->img_address,
        ];

        return response()->json($data, 200);
    }

    public function showReviews($id, Request $request)
    {
        $access_token = $request->header('access_token');
        if (access_user::where('access_token', $access_token)->count() !== 1) return response()->json(['text' => 'wrong token.'], 404);

        $token = access_user::where('access_token', $access_token)->first();
        $token->last_access = now();
        $token->save();

        $datas = [];
        $reviews = review_info::where('shop_idx', $id)->limit(5)->get();

        foreach ($reviews as $review) {
            $data = [
                'id' => $review->review_idx,
                'content' => $review->review_content,
                'star' => $review->review_star,
                'write_day' => $review->date_created,
                'img_address' => review_img::where('review_idx', $review->review_idx)->first()->img_address,
                'checked' => review_good::where('review_idx', $review->review_idx)->where('user_id', $request->header('user'))->count(),
            ];

            array_push($datas, $data);
        }

        return response()->json($datas, 200);
    }

    public function showMenu($id, Request $request)
    {
        $access_token = $request->header('access_token');
        if (access_user::where('access_token', $access_token)->count() !== 1) return response()->json(['text' => 'wrong token.'], 404);

        $token = access_user::where('access_token', $access_token)->first();
        $token->last_access = now();
        $token->save();

        $menus = shop_menu::where('shop_idx', $id)->get();

        $datas = [];

        foreach ($menus as $menu) {
            $data = [
                'name' => $menu->menu_name,
                'price' => $menu->menu_price,
                'img_address' => $menu->img_address,
            ];
            array_push($datas, $data);
        }

        return response()->json($datas, 200);
    }

    public function AllShop($order, Request $request) {
        $access_token = $request->header('access_token');
        if (access_user::where('access_token', $access_token)->count() !== 1) return response()->json(['text' => 'wrong token.'], 404);

        $token = access_user::where('access_token', $access_token)->first();
        $token->last_access = now();
        $token->save();

        if (review_info::all()->count() !== 0) {
            $goods = DB::table('review_info')->selectRaw('shop_idx, ROUND(AVG(review_star),2) as avg')->groupBy('shop_idx')->orderBy('avg', $order)->limit(10)->get();
            $datas = [];

            foreach ($goods as $good) {
                $data = [
                    'shop_idx' => $good->shop_idx,
                    'star_avg' => $good->avg,
                    'shop_name' => shop_info::where('shop_idx', $good->shop_idx)->first()->shop_name,
                    'addr' => shop_info::where('shop_idx', $good->shop_idx)->first()->shop_addr,
                    'addr2' => shop_info::where('shop_idx', $good->shop_idx)->first()->shop_addr2,
                    'order' => $order,
                ];
                array_push($datas, $data);
            }

            return response()->json($datas, 200);
        }
        return response()->json(['text' => null], 400);
    }
}
