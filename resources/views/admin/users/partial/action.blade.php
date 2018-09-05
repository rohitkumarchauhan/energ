<a href="{{route('users.edit',$user->id) }}"
   class="btn btn-primary btn-mini">Edit</a>

<form class ="form-delete" method="POST" action="{{ route('users.destroy',$user->id) }}" style= "float:left;">

    <input type="hidden" name="_method" value="delete" />

    {{ csrf_field() }}
    <button type="submit"
            class="btn btn-danger btn-mini delete-model">Delete</button>
</form>