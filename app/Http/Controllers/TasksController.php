<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   // getでmessages/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        //タスク一覧を取得
        $tasks = Task::all();
        
        //タスク一覧ビューでそれを表示
        return view('tasks.index', [
            'tasks' => $tasks,
            ]);
    }

    // getでmessages/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $task = new Task;
        
        //タスク作成ビュー表示
        return view('tasks.create',[
            'task' => $task,
            ]);
    }
    
    
    // postでmessages/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
         // バリデーション未入力チェック
        $request->validate([
            'content' => 'required|max:255',
        ]);
        //タスク作成
        $task = new Task;
        $task->content = $request->content;
        $task->save();
        
        //トップページへリダイレクト
        return redirect('/');
    }

    // getでmessages/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        //idの値でタスクを検索して取得
        $task = Task::findorfail($id);
        
        //メッセージ詳細ビューで検索した結果タスク表示する
        return view('tasks.show',[
            'task' => $task,
            ]);
    }

    // getでmessages/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        //idの値でタスクを検索して取得
        $task = Task::findOrFail($id);
        
        //メッセージ詳細ビューで検索した結果タスク表示する
        return view('tasks.edit',[
            'task' => $task,
            ]);
    }


    // putまたはpatchでmessages/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {

        // idの値でタスクを検索して取得
        $task = Task::findOrFail($id);
        // メッセージを更新
        $task->content = $request->content;
        $task->save();
        
        //トップページへリダイレクト
        return redirect('/');
    }

    // deleteでmessages/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
         // idの値でタスクを検索して取得
        $task = Task::findOrFail($id);

        // メッセージを削除
        $task->delete();
        
        //トップページへリダイレクト
        return redirect('/');
    }
}
