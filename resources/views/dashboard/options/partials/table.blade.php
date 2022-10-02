<div class="table-responsive">
  <table class="table align-items-center mb-0">
    <thead>
      <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">ID</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Question Text</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">option Text</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">option points</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Actions</th>

      </tr>
    </thead>
    <tbody>
      @foreach($options as $option)
      <tr>
        <td>
          <div class="d-flex px-2 py-1">
            {{$option->id}}
          </div>
        </td>
        <td>
          {{$option->question->question_text}}
        </td>
        <td>
          {{$option->option_text}}
        </td>
        <td>
          {{$option->points}}
        </td>
        <td class="align-middle text-center text-sm">
          <a href="{{route('options.show',$option->id)}}" type="button" class="badge badge-primary"><i class="fa fa-eye"></i> show</a>
          <a href="{{route('options.edit',$option->id)}}" type="button" class="badge badge-warning"><i class="fa fa-edit"></i> edit</a>
          <form style="display:inline" method="POST" action="{{route('options.destroy',$option->id)}}">
            @csrf
            {{ method_field('DELETE') }}
            <button class="badge badge-danger" onclick="return confirm('Are you sure?')" type="submit">
              <i class="fas fa-trash"></i> Delete</span>
            </button>
          </form>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>