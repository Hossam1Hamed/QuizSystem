@extends('web.layouts.base')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Make Quiz') }}</div>

                <div class="card-body">

                    <form id="" action="{{route('quiz.store')}}" method="post">
                        @csrf
                        @include('web.pages.quiz.partials.form')
                    
                    <button id="" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection