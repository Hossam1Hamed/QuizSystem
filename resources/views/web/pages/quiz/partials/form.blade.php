@if(auth()->user()->type == 2)
<input type="hidden" name="id" value="{{Auth::user()->id}}">
@foreach($questions as $quest)
<h3>{{$quest->text}}</h3>
@foreach($quest->choices as $choice)
<div class="form-check">
    <input class="form-check-input" type="radio" name="{{$quest->id}}" value="{{$choice->id}}" id="">
    <label class="form-check-label" for="flexRadioDefault1">
        {{$choice->text}}
    </label>
</div>
@endforeach
@endforeach
@endif

@if(auth()->user()->type == 1)

<div class="col-md-6">
    <div class="form-group">
        <label for="" class="form-label">Enter Quiz Name</label>
    </div>
    <div class="form-group">
        <input type="text" name="name" class="form-control">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="" class="form-label">Enter Number Of Questions</label>
    </div>
    <div class="form-group">
        <input type="number" name="numberOfQuestions" class="form-control" min="1">
    </div>
</div>

@endif