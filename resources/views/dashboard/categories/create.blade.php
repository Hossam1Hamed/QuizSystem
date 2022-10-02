@extends('web.layouts.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-9">
            <h3>Creating New Category</h3>

        </div>

    </div>
    <form method="POST" action="{{route('categories.store')}}">
        @csrf

        @include('dashboard.categories.partials.form')


</div>


@endsection