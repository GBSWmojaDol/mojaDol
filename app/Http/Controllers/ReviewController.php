<?php

namespace App\Http\Controllers;

use App\Models\review_img;
use App\Models\review_info;
use App\Models\shop_info;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index($id)
    {
        if (session('user') === null) return redirect('/');
        return view('AddReview')->with('id', $id)->with('review', null);
    }

    public function store(Request $request)
    {
        $now = now();
        $review_info = new review_info();

        $review_info->user_id = session('user');
        $review_info->shop_idx = $request->id;
        $review_info->review_content = $request->content;
        $review_info->review_star = $request->rating;
        $review_info->date_created = $now;

        $review_info->save();

        if ($request->hasFile('img')) {
            $review_img = new review_img();

            $image = $request->file('img');
            $name = time()."_".session('user');
            $image_name = $name .".".$image->getClientOriginalExtension();
            $image->move(public_path('review'), $image_name);

            $review_img->review_idx = review_info::where('date_created', $now)->first()->review_idx;
            $review_img->non_chaname = $request->file('img')->getClientOriginalName();
            $review_img->img_filename = $image_name;
            $review_img->img_address = 'review/'.$image_name;

            $review_img->save();
        }

        return redirect('/shop/list/'.$request->id);
    }

    public function indexModify($id) {
        if (session('user') == null) return redirect('/');
        if (0 == review_info::where('review_idx', $id)->where('user_id', session('user'))->count()) return redirect('/');
        return view('AddReview')->with('id', $id)->with('review', review_info::where('review_idx', $id)->first());
    }

    public function modify(Request $request) {
        review_info::where('review_idx', $request->id)
            ->update([
                'review_content' => $request->content,
                'review_star' => $request->rating,
            ]);

        if ($request->hasFile('img')) {
            $now = now();
            review_img::where('review_idx', $request->id)
            ->update([
                'non_chaname' => $request->file('img')->getClientOriginalName(),
                'img_filename' => $now."_".$request->file('img')->getClientOriginalName(),
                'img_address' => 'review/'.$now."_".$request->file('img')->getClientOriginalName(),
            ]);
        }
        return redirect('/shop/list/'.review_info::where('review_idx', $request->id)->first()->shop_idx);
    }

    public function delete($id) {
        if (session('user') == null) return redirect('/');
        $link = '/shop/list/'.review_info::where('review_idx', $id)->first()->shop_idx;
        if (review_info::where('review_idx', $id)->where('user_id', session('user'))->count() == 0) return redirect($link);
        review_info::where('review_idx', $id)->delete();
        review_img::where('review_idx', $id)->delete();

        return redirect($link);
    }
}
