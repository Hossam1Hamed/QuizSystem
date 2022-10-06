@if(auth()->user()->type == 2)
<input type="hidden" name="id" value="{{Auth::user()->id}}">
@foreach($categories as $category)
<div class="card mb-3">
    <div class="card-header">Category {{ $category->name }} : </div>
    <div class="card-body"></div>
    @foreach($category->questions as $question)
    <div class="card @if(!$loop->last)mb-3 @endif">
        <div class="card-header">{{$question->question_text}}</div>

        <div class="card-body">
            <input type="hidden" name="questions[{{ $question->id }}]" value="">
            @foreach($question->options as $option)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="option-{{ $option->id }}" value="{{ $option->id }}" @if(old("questions.$question->id") == $option->id) checked @endif>
                <label class="form-check-label" for="option-{{ $option->id }}">
                    {{ $option->option_text }}
                </label>
            </div>
            @endforeach

            @if($errors->has("questions.$question->id"))
            <span style="margin-top: .25rem; font-size: 80%; color: #e3342f;" role="alert">
                <strong>{{ $errors->first("questions.$question->id") }}</strong>
            </span>
            @endif

        </div>
    </div>
    @endforeach
</div>
</div>
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