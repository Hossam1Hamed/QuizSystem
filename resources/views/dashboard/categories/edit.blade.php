@extends('web.layouts.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-9">
            <h3>Editing Exist Category</h3>

        </div>

    </div>
    <form method="POST" action="{{route('categories.update',$category->id)}}">
        @csrf
        {{ method_field('PUT') }}
        @include('dashboard.categories.partials.form')

    </form>
</div>


@endsection