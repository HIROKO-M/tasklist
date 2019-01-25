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
        $task = Tasklist::find($id);

        return view('tasklists.show', [ 'tasklist' => $task, ]);
    }


    public function edit($id)
    {
        $task = Tasklist::find($id);
        
        return view('tasklists.edit', ['tasklist' => $task,]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'status' => 'required|max:10',
                'content' => 'required|max:255',
        ]);
        

        $request->user()->tasklists()->find($id)->update([
            'status' => $request->status,
            'content' => $request->content,
        ]);
        
        return redirect('/');
        
    }


    public function destroy($id)
    {
        $task = \App\Tasklist::find($id);
        
        if(\Auth::user()->id === $task->user_id){
            $task -> delete();
        }
        
        return redirect()->back();
    }
}
