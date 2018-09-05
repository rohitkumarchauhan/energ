<div class="btn_outer">

    <a href="<?php echo e(route('pages.edit',$user->id)); ?>"
       class="btn btn-primary btn-mini">Edit</a>

    <form class="form-delete" method="POST" action="<?php echo e(route('pages.destroy',$user->id)); ?>" style="float:left;">

        <input type="hidden" name="_method" value="delete"/>

        <?php echo e(csrf_field()); ?>

        <button type="submit"
                class="btn btn-danger btn-mini delete-model" id="delete-model_<?php echo e($user->id); ?>" data-id="<?php echo e($user->id); ?>">
            Delete
        </button>
    </form>


</div>