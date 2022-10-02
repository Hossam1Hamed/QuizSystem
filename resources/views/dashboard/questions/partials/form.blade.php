<div class="form-group">
    <label for="exampleFormControlSelect1">Select Category</label>
    <select class="form-control" name="category_id" id="exampleFormControlSelect1">
        <option value="" disabled selected>...</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}" {{($category->name == $question[0]->category->name) ? 'selected' : ''}} >{{$category->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Question Text</label>
    <textarea name="question_text" class="form-control" id="" cols="30" rows="10">{{($question[0]->question_text)??''}}</textarea>
    <!-- <input type="text" class="form-control" name="name" > -->
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary mt-3">Save</button>
</div>

