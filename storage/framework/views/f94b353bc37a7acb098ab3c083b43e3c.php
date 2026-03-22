<?php $__env->startSection('title', isset($product) ? 'Edit Product' : 'Add Product'); ?>
<?php $__env->startSection('page-title', isset($product) ? 'Edit Product' : 'Add New Product'); ?>

<?php $__env->startSection('topbar-actions'); ?>
    <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-sm btn-outline-secondary" style="font-size:0.78rem;border-radius:3px;">
        <i class="bi bi-arrow-left me-1"></i> Back to Products
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row g-4">

    
    <div class="col-lg-8">
        <div class="admin-form-card">
            <div class="card-head">
                <h5><?php echo e(isset($product) ? 'Edit: ' . $product->name : 'Product Information'); ?></h5>
            </div>
            <div class="card-body">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger mb-3">
                        <ul class="mb-0 ps-3">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <li style="font-size:0.83rem;"><?php echo e($e); ?></li> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store')); ?>"
                      method="POST" enctype="multipart/form-data" id="productForm">
                    <?php echo csrf_field(); ?>
                    <?php if(isset($product)): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

                    <div class="mb-3">
                        <label class="form-label">Product Name <span style="color:var(--red);">*</span></label>
                        <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               value="<?php echo e(old('name', $product->name ?? '')); ?>" required placeholder="e.g. Air Max 270">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Brand <span style="color:var(--red);">*</span></label>
                            <input type="text" name="brand" class="form-control <?php $__errorArgs = ['brand'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   value="<?php echo e(old('brand', $product->brand ?? '')); ?>" required placeholder="e.g. Nike">
                            <?php $__errorArgs = ['brand'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <input type="text" name="category" class="form-control"
                                   value="<?php echo e(old('category', $product->category ?? '')); ?>" placeholder="e.g. Running, Casual">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4"
                                  placeholder="Describe the product…"><?php echo e(old('description', $product->description ?? '')); ?></textarea>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Price (₱) <span style="color:var(--red);">*</span></label>
                            <input type="number" name="price" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   value="<?php echo e(old('price', $product->price ?? '')); ?>"
                                   min="0" step="0.01" required placeholder="0.00">
                            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Stock / Quantity <span style="color:var(--red);">*</span></label>
                            <input type="number" name="stock" class="form-control <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   value="<?php echo e(old('stock', $product->stock ?? 0)); ?>" min="0" required>
                            <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Size</label>
                            <input type="text" name="size" class="form-control"
                                   value="<?php echo e(old('size', $product->size ?? '')); ?>" placeholder="e.g. 7, 8, 9, 10">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Color</label>
                        <input type="text" name="color" class="form-control"
                               value="<?php echo e(old('color', $product->color ?? '')); ?>" placeholder="e.g. Black/White">
                    </div>

                    
                    <div style="border-top:1px solid rgba(0,0,0,0.08);padding-top:1.5rem;margin-top:0.5rem;">
                        <label class="form-label d-block mb-2">
                            Product Photos
                            <span style="font-family:var(--font-mono);font-size:0.65rem;color:var(--warm-gray);letter-spacing:0.08em;font-weight:400;"> (Upload multiple — side view, top, sole, etc.)</span>
                        </label>

                        
                        <?php if(isset($product) && $product->photos && $product->photos->count() > 0): ?>
                            <div style="margin-bottom:1rem;">
                                <p style="font-size:0.75rem;color:var(--warm-gray);margin-bottom:0.6rem;">Existing photos (click X to remove):</p>
                                <div class="d-flex flex-wrap gap-2" id="existingPhotos">
                                    <?php $__currentLoopData = $product->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="existing-photo" id="photo-<?php echo e($photo->id); ?>"
                                             style="position:relative;width:80px;height:80px;border-radius:4px;overflow:hidden;border:1.5px solid rgba(0,0,0,0.1);">
                                            <img src="<?php echo e($photo->url()); ?>"
                                                 style="width:100%;height:100%;object-fit:cover;">
                                            <button type="button"
                                                    onclick="removeExistingPhoto(<?php echo e($photo->id); ?>, this)"
                                                    style="position:absolute;top:2px;right:2px;background:rgba(192,57,43,0.9);border:none;border-radius:50%;width:20px;height:20px;color:white;font-size:0.6rem;cursor:pointer;display:flex;align-items:center;justify-content:center;line-height:1;">
                                                <i class="bi bi-x"></i>
                                            </button>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        
                        <div id="dropzone"
                             style="border:2px dashed rgba(200,169,110,0.4);border-radius:4px;padding:2rem;text-align:center;cursor:pointer;transition:all 0.2s;background:rgba(200,169,110,0.03);"
                             onclick="document.getElementById('photoInput').click()"
                             ondragover="this.style.borderColor='var(--accent)';this.style.background='rgba(200,169,110,0.08)';event.preventDefault();"
                             ondragleave="this.style.borderColor='rgba(200,169,110,0.4)';this.style.background='rgba(200,169,110,0.03)';"
                             ondrop="handleDrop(event)">
                            <input type="file" id="photoInput" name="photos[]" multiple accept="image/*"
                                   style="display:none;" onchange="previewPhotos(this)">
                            <div id="dropPlaceholder">
                                <i class="bi bi-cloud-upload" style="font-size:2rem;color:var(--accent);opacity:0.6;"></i>
                                <p style="font-size:0.85rem;color:var(--warm-gray);margin-top:0.5rem;">
                                    Drag & drop photos here, or <strong style="color:var(--accent);">click to browse</strong>
                                </p>
                                <p style="font-size:0.72rem;color:var(--warm-gray);">JPEG, PNG, JPG, GIF — max 2MB each</p>
                            </div>
                        </div>

                        
                        <div id="newPhotoPreviews" class="d-flex flex-wrap gap-2 mt-2"></div>
                    </div>

                    <div class="d-flex gap-2 mt-4 pt-3" style="border-top:1px solid rgba(0,0,0,0.08);">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i>
                            <?php echo e(isset($product) ? 'Update Product' : 'Create Product'); ?>

                        </button>
                        <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-outline-secondary">Cancel</a>
                        <?php if(isset($product)): ?>
                            <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST" class="ms-auto">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Delete this product permanently?')">
                                    <i class="bi bi-trash me-1"></i>Delete
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>

                </form>
            </div>
        </div>
    </div>

    
    <div class="col-lg-4">
        <div style="background:var(--white);border-radius:6px;border:1px solid rgba(0,0,0,0.07);padding:1.5rem;">
            <h6 style="font-family:var(--font-mono);font-size:0.7rem;letter-spacing:0.15em;text-transform:uppercase;color:var(--warm-gray);margin-bottom:1rem;">Photo Tips</h6>
            <ul style="list-style:none;padding:0;margin:0;font-size:0.83rem;color:#555;">
                <li style="padding:0.4rem 0;border-bottom:1px solid rgba(0,0,0,0.05);display:flex;gap:0.5rem;"><i class="bi bi-camera" style="color:var(--accent);"></i> Upload a front/side view first</li>
                <li style="padding:0.4rem 0;border-bottom:1px solid rgba(0,0,0,0.05);display:flex;gap:0.5rem;"><i class="bi bi-arrows-angle-expand" style="color:var(--accent);"></i> Include top, sole, and heel views</li>
                <li style="padding:0.4rem 0;border-bottom:1px solid rgba(0,0,0,0.05);display:flex;gap:0.5rem;"><i class="bi bi-aspect-ratio" style="color:var(--accent);"></i> Square photos look best</li>
                <li style="padding:0.4rem 0;display:flex;gap:0.5rem;"><i class="bi bi-file-image" style="color:var(--accent);"></i> Max 2MB per photo</li>
            </ul>

            <?php if(isset($product)): ?>
            <hr style="border-color:rgba(0,0,0,0.08);margin:1rem 0;">
            <h6 style="font-family:var(--font-mono);font-size:0.7rem;letter-spacing:0.15em;text-transform:uppercase;color:var(--warm-gray);margin-bottom:0.75rem;">Quick Info</h6>
            <div style="font-size:0.8rem;color:var(--warm-gray);">
                <div>Created: <?php echo e($product->created_at->format('M d, Y')); ?></div>
                <div>Updated: <?php echo e($product->updated_at->format('M d, Y')); ?></div>
                <div>Reviews: <?php echo e($product->reviews_count ?? 0); ?></div>
            </div>
            <a href="<?php echo e(route('products.show', $product->id)); ?>" target="_blank"
               style="display:block;margin-top:0.75rem;font-size:0.78rem;color:var(--accent);text-decoration:none;">
                <i class="bi bi-box-arrow-up-right me-1"></i>View on storefront
            </a>
            <?php endif; ?>
        </div>
    </div>

</div>


<div id="photosToDelete"></div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    function previewPhotos(input) {
        const container = document.getElementById('newPhotoPreviews');
        const files = Array.from(input.files);
        container.innerHTML = '';

        files.forEach((file, idx) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.style.cssText = 'position:relative;width:80px;height:80px;border-radius:4px;overflow:hidden;border:1.5px solid rgba(200,169,110,0.4);';
                div.innerHTML = `
                    <img src="${e.target.result}" style="width:100%;height:100%;object-fit:cover;">
                    <div style="position:absolute;bottom:0;left:0;right:0;background:rgba(0,0,0,0.5);color:white;font-size:0.55rem;text-align:center;padding:2px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">${file.name}</div>
                `;
                container.appendChild(div);
            };
            reader.readAsDataURL(file);
        });

        if (files.length > 0) {
            document.getElementById('dropPlaceholder').innerHTML = `
                <i class="bi bi-check-circle" style="font-size:1.5rem;color:green;"></i>
                <p style="font-size:0.83rem;color:#555;margin-top:0.5rem;">${files.length} photo${files.length > 1 ? 's' : ''} selected</p>
            `;
        }
    }

    function handleDrop(e) {
        e.preventDefault();
        const input = document.getElementById('photoInput');
        const dt = new DataTransfer();
        Array.from(e.dataTransfer.files).forEach(f => dt.items.add(f));
        input.files = dt.files;
        previewPhotos(input);
        document.getElementById('dropzone').style.borderColor = 'rgba(200,169,110,0.4)';
        document.getElementById('dropzone').style.background = 'rgba(200,169,110,0.03)';
    }

    function removeExistingPhoto(photoId, btn) {
        if (!confirm('Remove this photo?')) return;
        // Add hidden input to mark for deletion
        const container = document.getElementById('photosToDelete');
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'delete_photos[]';
        input.value = photoId;
        container.appendChild(input);
        // Remove the photo preview
        document.getElementById('photo-' + photoId).remove();
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\SoulMates-Inc-Project\resources\views\admin\create-edit.blade.php ENDPATH**/ ?>