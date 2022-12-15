@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>タスク一覧</h2>
    </div>
    
    @if (isset($tasks))
    <table class="table table-zebra w-full my-4">
        <thead>
            <tr>
                <th>id</th>
                <th>ステータス</th>
                <th>タスク</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $tasks)
            <tr>
                <td><a class="link link-hober text-info" href="{{ route('task.show', $tasks->id) }}">{{ $tasks->id }}</a></td>
                <td>{{ $tasks->status }}</td>
                <td>{{ $tasks->content }}</td>
            </tr>
            @endforeach
        </tbody>
            
    </table>
    @endif
    
    {{--タスク作成へのリンク--}}
    <a class="btn btn-primary" href="{{ route('task.create')}}">新規タスク作成</a>
    
@endsection