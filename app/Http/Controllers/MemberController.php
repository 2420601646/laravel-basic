<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function info($id){

         return Member::getMember();
//        return route('memberinfo');
//        return "member-info" . $id;
//          return view('member/info',[
//              'name' => '天秤VS永恒',
//              'age'  => 18
//          ]);
    }

}
