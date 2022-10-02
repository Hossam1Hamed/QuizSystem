<div class="table-responsive">
  <table class="table align-items-center mb-0">
    <thead>
      <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">ID</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Category Name</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Question Text</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Actions</th>

      </tr>
    </thead>
    <tbody>
      @foreach($questions as $question)
      <tr>
        <td>
          <div class="d-flex px-2 py-1">
            {{$question->id}}
          </div>
        </td>
        <td>
          {{$question->category->name}}
        </td>
        <td>
          <p>{{$question->question_text}}</p>
        </td>
        <td class="align-middle text-center text-sm">
          <a href="{{route('questions.show',$question->id)}}" type="button" class="btn btn-primary"><i class="fa fa-eye"></i> show</a>
          <a href="{{route('questions.edit',$question->id)}}" type="button" class="btn btn--warning"><i class="fa fa-edit"></i> edit</a>
          <form style="display:inline" method="POST" action="{{route('questions.destroy',$question->id)}}">
            @csrf
            {{ method_field('DELETE') }}
            <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">
              <i class="fas fa-trash"></i> Delete</span>
            </button>
          </form>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>