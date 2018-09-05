<div class="btn_outer">

    <a href="{{route('roles.edit',$role->id) }}"
       class="btn btn-primary btn-mini">Edit</a>

    <form class="form-delete" method="POST" action="{{ route('roles.destroy',$role->id) }}" style="float:left;">

        <input type="hidden" name="_method" value="delete"/>
        {{ csrf_field() }}
        <button type="submit"
                class="btn btn-danger btn-mini delete-model" id="delete-model_{{$role->id}}" data-id="{{$role->id}}">
            Delete
        </button>
    </form>


</div>