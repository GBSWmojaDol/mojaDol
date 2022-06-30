<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_info;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function MyPage() {
        if(session('user') == null) return redirect('/');
        return view('MyPage');
    }

    public function login() {

        if(session('user') != null) return redirect('Main');
        return view('index');
    }

    public function store(Request $request) {
        $count = user_info::where('user_id', $request->username)
        ->where('user_pw', base64_encode(hash('sha256', $request->password, 'true')))
        ->count();

        if ($count === 0) return redirect('/');

        $user = DB::table('user_info')->select('nickname', 'user_secession')->where('user_id', $request->username)->first();

        if($count != 0) {
            if ($user->user_secession !== 1) return redirect('/');
            session()->put('user', $request->username);
            session()->put('nickname', $user->nickname);
            return redirect('Main');
        }

        echo "
        <script>
            alert('없는 아이디입니다');
        </script>
        ";
        return redirect('/');
    }

}
