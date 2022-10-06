@extends('web.layouts.base')

@section('content')

<div class="card">
  <div class="card-header">
    Result Of Your Test
  </div>
  <div class="card-body">
    <h5 class="card-title">totl points is : {{$result->total_points}} points</h5>
    <a href="{{route('results.send',$result->id)}}" class="btn btn-primary">get details in PDF</a>
  </div>
</div>

@endsection