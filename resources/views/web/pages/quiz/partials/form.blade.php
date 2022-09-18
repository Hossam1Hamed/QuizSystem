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