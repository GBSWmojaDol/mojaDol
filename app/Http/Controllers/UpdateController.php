<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\user_info;

class UpdateController extends Controller
{
    public function index() {
        if (session('user') == null) return redirect('/');

        $user = DB::table('user_info')
            ->where('user_id', session('user'))
            ->first();

        return view('AccountModify')
            ->with('nickname', $user->nickname)
            ->with('user_addr', $user->user_addr)
            ->with('user_addr2', $user->user_addr2)
            ->with('addr_num', $user->addr_num);
    }

    public function store(Request $request) {
        user_info::where('user_id', session('user'))
            ->update([
                'user_pw' => base64_encode(hash('sha256', $request->create_pw, 'true')),
                'nickname' => $request->nickname,
                'addr_num' => $request->hidden_addr,
                'user_addr' => $request->create_address,
                'user_addr2' => $request->details_address,
                'loged_date' => now()
            ]);

        session()->forget('nickname');
        session()->put('nickname', $request->nickname);
        return redirect('/MyPage');

    }

    public function delete() {
        user_info::where('user_id', session('user'))
            ->update([
                'user_secession' => 2
            ]);

        session()->flush();

        return redirect('/');
    }
}
