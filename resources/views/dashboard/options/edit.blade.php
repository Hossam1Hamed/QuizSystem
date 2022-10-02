@extends('web.layouts.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-9">
            <h3>Editing Exist Option</h3>

        </div>

    </div>
    <form method="POST" action="{{route('options.update',$option[0]->id)}}">
        @csrf
        {{ method_field('PUT') }}
        @include('dashboard.options.partials.form')

    </form>
</div>


@endsection