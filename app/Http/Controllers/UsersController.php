<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);    // usersテーブルのユーザーデータを取得
        
        return view('users.index', ['users' => $users,]);   // users.index へ特定したユーザを伝える
    }


    public function show($id)
    {
       $user = User::find($id);     // usersテーブルの($id)を使ってユーザーを特定する
        
        return view('users.show', ['user' => $user,]);    // users.show へ特定したユーザを伝える
    }
}
