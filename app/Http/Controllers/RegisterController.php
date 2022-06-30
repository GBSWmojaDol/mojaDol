<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_info;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index() {
        if (session('user') !== null) return redirect('/Main');
        return view('CreateAccount');
    }

    public function store(Request $request) {
        if (DB::table('user_info')->where('user_id', $request->create_id)->count() != 0) return redirect('/');

        $user = new user_info();

        $user->user_id = $request->create_id;
        $user->user_pw = base64_encode(hash('sha256', $request->create_pw, 'true'));
        $user->nickname = $request->nickname;
        $user->addr_num = $request->zipcode;
        $user->user_addr = $request->create_address;
        $user->user_addr2 = $request->details_address;
        $user->register_day = date('Y-m-d H:i:s', time());
        $user->loged_date = null;
        $user->edit_date = null;

        $user->save();

        return redirect('/');
    }
}
