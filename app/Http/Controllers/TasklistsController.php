<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tasklist;

class TasklistsController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        
        // フォームの入力項目のためにインスタンス作成
        $task = new Tasklist;
        
        return view('tasklists.create', ['tasklist' => $task]);
    }


    public function store(Request $request)
    {
        // バリデーション(空っぽでない、かつ255文字を超えない)を行う
        $this -> validate($request, [
            'status' => 'required|max:10',
            'content' => 'required|max:255',
        ]);
        
        // 対象ユーザのタスク（status と content）をtasklistsに作成（追加）
        $request->user()->tasklists()->create([
            'status' => $request->status,
            'content' => $request->content,
        ]);
        
        return redirect('/');
        
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
