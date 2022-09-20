@extends('web.layouts.base')

@section('content')

<h3>welcome to Jaadara Company</h3>

@if(auth()->user()->type != 1 )
<h4>time of quiz is 20 minutes</h4>

<div>
    <a href="{{route('quiz')}}" class="btn btn-danger">Start Quiz</a>
</div>
@endif

@if(auth()->user()->type == 1 )
<div>
    <a href="{{route('quiz.create')}}" class="btn btn-danger">Make Quiz</a>
</div>
@endif

@endsection