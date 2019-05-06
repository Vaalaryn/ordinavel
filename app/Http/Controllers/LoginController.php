<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm() {
        return view('login');
    }

    public function login(Request $request) {
        $post = $request->post();
        $res = DB::select("SELECT * FROM T_USERS WHERE NIGEND = '" . $post['nigend']. "'");
//        Session::put('nigend', $post['nigend']);
//        Session::put('is_admin', $res[0]['US_ADMI']);
        return $res[0]->NIGEND;//Session::get('nigend');
    }
}
