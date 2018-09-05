<div class="btn_outer">

    <a href="{{route('liningmaterial.edit',$user->id) }}"
       class="btn btn-primary btn-mini">Edit</a>

    <form class="form-delete" method="POST" action="{{ route('liningmaterial.destroy',$user->id) }}" style="float:left;">

        <input type="hidden" name="_method" value="delete"/>

        {{ csrf_field() }}
        <button type="submit"
                class="btn btn-danger btn-mini delete-model" id="delete-model_{{$user->id}}" data-id="{{$user->id}}">
            Delete
        </button>
    </form>


</div>