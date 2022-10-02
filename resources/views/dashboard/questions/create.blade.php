@extends('web.layouts.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-9">
            <h3>Creating New Question</h3>

        </div>

    </div>
    <form method="POST" action="{{route('questions.store')}}">
        @csrf

        @include('dashboard.questions.partials.form')

    </form>
</div>


@endsection