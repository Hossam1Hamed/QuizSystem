@extends('web.layouts.base')

@section('content')

<h3>welcome to Jaadara Company</h3>
<h4>time of quiz is 20 minutes</h4>

<div>
    <a href="{{route('quiz')}}" class="btn btn-danger">Start Quiz</a>
</div>

@endsection