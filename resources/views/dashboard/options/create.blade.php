@extends('web.layouts.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-9">
            <h3>Creating New Option</h3>

        </div>

    </div>
    <form method="POST" action="{{route('options.store')}}">
        @csrf

        @include('dashboard.options.partials.form')

    </form>
</div>


@endsection