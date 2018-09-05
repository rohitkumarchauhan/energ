@if(empty($systemfiles))

    @php


        if(!empty(count($model))){
      $systemfiles=\App\SystemFile::where('model_id','=',$model->id)->where('model_type','=',get_class($model))->get();
       }
    @endphp

@endif


@if(!empty($systemfiles))
    <div class="control-group">

        <label class="control-label"></label>
        <div class="controls">

            @foreach($systemfiles as $file)

                <div>
                    <img src="{{   $file->getImageAbsolutePath($file)   }}"
                         width="200px" height="200px   ">

                    <a href="javascript:" id="remove_image-{{ $file->id }}"
                       class="btn-danger btn delete-image"
                       data-id="{{ $file->id }}">x</a>

                </div>
            @endforeach

        </div>


    </div>
@endif
