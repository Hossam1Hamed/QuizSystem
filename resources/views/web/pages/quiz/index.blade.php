@extends('web.layouts.webBase')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            

                <div class="">

                    <form id="" method="post" action="{{ route('send.result')}}">
                        @csrf
                        @include('web.pages.quiz.partials.form')
                    
                    <button id="" class="btn btn-primary">Submit</button>
                </form>

            
        </div>
    </div>
</div>

@endsection