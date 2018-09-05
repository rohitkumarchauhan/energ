<div class="btn_outer">

    <a href="<?php echo e(route('roles.edit',$role->id)); ?>"
       class="btn btn-primary btn-mini">Edit</a>

    <form class="form-delete" method="POST" action="<?php echo e(route('roles.destroy',$role->id)); ?>" style="float:left;">

        <input type="hidden" name="_method" value="delete"/>
        <?php echo e(csrf_field()); ?>

        <button type="submit"
                class="btn btn-danger btn-mini delete-model" id="delete-model_<?php echo e($role->id); ?>" data-id="<?php echo e($role->id); ?>">
            Delete
        </button>
    </form>


</div>