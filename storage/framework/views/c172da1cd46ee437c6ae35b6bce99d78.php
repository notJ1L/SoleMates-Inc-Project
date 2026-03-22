<?php $__env->startSection('title', 'Edit Review — SoulMates Inc.'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5" style="max-width: 600px;">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('products.show', $review->product_id)); ?>">Product</a></li>
            <li class="breadcrumb-item active">Edit Review</li>
        </ol>
    </nav>

    <h2 class="mb-4">Edit Your Review</h2>

    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('reviews.update', $review->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label class="form-label fw-semibold">Your Rating</label>
            <div class="d-flex gap-2">
                <?php for($i = 1; $i <= 5; $i++): ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rating"
                               id="star<?php echo e($i); ?>" value="<?php echo e($i); ?>"
                               <?php echo e((old('rating', $review->rating) == $i) ? 'checked' : ''); ?> required>
                        <label class="form-check-label" for="star<?php echo e($i); ?>"><?php echo e($i); ?> ★</label>
                    </div>
                <?php endfor; ?>
            </div>
            <?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Your Review</label>
            <textarea name="body" rows="5"
                      class="form-control <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                      required><?php echo e(old('body', $review->body)); ?></textarea>
            <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update Review</button>
            <a href="<?php echo e(route('products.show', $review->product_id)); ?>" class="btn btn-outline-secondary">Cancel</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views\reviews\edit.blade.php ENDPATH**/ ?>