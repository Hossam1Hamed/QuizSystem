@extends('web.layouts.base')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Fill {{$lastQuiz->numberOfQuestions}} Question of your quiz</div>

                <div class="card-body">

                    <form id="" action="{{route('question.store')}}" method="post">
                        @csrf
                        @include('web.pages.question.partials.form')
                    
                    <button id="" type="submit" class="btn btn-primary">Submit And Make The Answer Model</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection