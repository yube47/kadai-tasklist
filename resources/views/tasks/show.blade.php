@extends('layouts.app')

@section('content')
    
    <div class="prose ml-4">
        <h2>id = {{ $task->id }} のタスク詳細ページ</h2>
    </div>

    <table class="table w-full my-4">
        <tr>
            <th>id</th>
            <td>{{ $task->id }}</td>
        </tr>

        <tr>
            <th>メッセージ</th>
            <td>{{ $task->content }}</td>
        </tr>
    </table>
    
    {{--メッセージ編集ページへのリンク--}}
    <a class="btn btn-outline" href="{{ route('task.edit', $task->id) }}">このタスクの編集</a>
    
    {{--メッセージ削除フォーム--}}
    <form method="POST" action="{{ route('task.destroy', $task->id) }}" class="my-2">
        @csrf
        @method('DELETE')
        
        <buttton type="submit" class="btn btn-error btn-outline"
                 onclick="return confirm('id = {{ $task->id }} のタスクを削除します。よろしいですか？')">削除</buttton>
    </form>
@endsection