<div class="table-responsive">
  <table class="table align-items-center mb-0">
    <thead>
      <tr>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">ID</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Name</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Actions</th>

      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
      <tr>
        <td>
          <div class="d-flex px-2 py-1">
            {{$category->id}}
          </div>
        </td>
        <td>
          {{$category->name}}
        </td>
        <td class="align-middle text-center text-sm">
          <a href="{{route('categories.show',$category->id)}}" type="button" class="btn btn-outline-primary"><i class="fa fa-eye"></i> show</a>
          <a href="{{route('categories.edit',$category->id)}}" type="button" class="btn btn-outline-warning"><i class="fa fa-edit"></i> edit</a>
          <form style="display:inline" method="POST" action="{{route('categories.destroy',$category->id)}}">
            @csrf
            {{ method_field('DELETE') }}
            <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" type="submit">
              <i class="fas fa-trash"></i> Delete</span>
            </button>
          </form>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>