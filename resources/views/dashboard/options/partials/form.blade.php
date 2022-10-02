<div class="form-group">
    <label for="exampleFormControlSelect1">Select Question</label>
    <select class="form-control" name="question_id" id="exampleFormControlSelect1">
        <option value="" disabled selected>...</option>
        @foreach($questions as $question)
        <option value="{{$question->id}}" {{($option[0]->question->id == $question->id) ? 'selected' : ''}}>{{$question->question_text}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Option Text</label>
    <!-- <textarea name="question_text" class="form-control" id="" cols="30" rows="10">{{($question[0]->question_text)??''}}</textarea> -->
    <input type="text" class="form-control" name="option_text" value="{{$option[0]->option_text}}">
</div>
<div class="form-group">
    <label for="">Option Points</label>
    <input type="number" class="form-control" name="points" value="{{$option[0]->points}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary mt-3">Save</button>
</div>

