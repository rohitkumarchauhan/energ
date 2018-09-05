<div>

<a href="{{route('subcategories.edit',$user->id) }}"
   class="btn btn-primary btn-mini">Edit</a>

<form class ="form-delete" method="POST" action="{{ route('subcategories.destroy',$user->id) }}" style= "float:left;">

    <input type="hidden" name="_method" value="delete" />

    {{ csrf_field() }}
    <button type="submit"
            class="btn btn-danger btn-mini">Delete</button>
</form>



</div>