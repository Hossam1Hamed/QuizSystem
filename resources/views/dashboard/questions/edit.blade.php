@extends('web.layouts.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-9">
            <h3>Editing Exist Question</h3>

        </div>

    </div>
    <form method="POST" action="{{route('questions.update',$question[0]->id)}}">
        @csrf
        {{ method_field('PUT') }}
        @include('dashboard.questions.partials.form')

    </form>
</div>


@endsection