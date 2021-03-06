@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <?php $user = Auth::user();     //現在認証されているユーザーの取得　?>
            {{ $user->name }}'s
            
            @if (count($tasklists) > 0)
                @include('tasklists.tasklists', ['tasklists' => $tasklists])
            @endif
            
            
            {!! link_to_route('tasklists.create', '新規タスク登録', null, ['class' => 'btn btn-primary']) !!}
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Task Lists</h1>
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    
    @endif

@endsection