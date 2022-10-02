@extends('web.layouts.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-9">
            <h3>Options List</h3>

        </div>
        <div class="col-3">
            <a href="{{ route('options.create') }}" class="btn btn-primary form-control" type="button"><i class="fa fa-plus"></i> Add New</a>

        </div>
    </div>
    @include('dashboard.options.partials.table')

    
</div>
@endsection