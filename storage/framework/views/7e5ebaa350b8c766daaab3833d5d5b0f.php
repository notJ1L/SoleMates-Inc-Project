<?php $__env->startSection('page-title', isset($product) ? 'Edit Product' : 'Create Product'); ?>

<?php $__env->startSection('topbar-actions'); ?>
    <a href="<?php echo e(route('admin.products.index')); ?>" class="btn-secondary-admin">
        <i class="bi bi-arrow-left"></i> Back to Products
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<form method="POST"
      action="<?php echo e(isset($product) ? route('admin.products.update', $product) : route('admin.products.store')); ?>"
      enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php if(isset($product)): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>

    <div class="row g-3">
        
        <div class="col-lg-8">

            
            <div class="panel mb-3">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-box-seam me-2"></i>Product Details</span>
                </div>
                <div class="p-4">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Product Name *</label>
                            <input type="text" name="name"
                                   class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   value="<?php echo e(old('name', $product->name ?? '')); ?>" required
                                   style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger small mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Stock *</label>
                            <input type="number" name="stock"
                                   class="form-control <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   value="<?php echo e(old('stock', $product->stock ?? 0)); ?>" min="0" required
                                   style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                            <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger small mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Price (₱) *</label>
                            <input type="number" name="price"
                                   class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   value="<?php echo e(old('price', $product->price ?? '')); ?>" step="0.01" min="0" required
                                   style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger small mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Category *</label>
                            <select name="category_id" class="form-select <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required
                                    style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                                <option value="">Select Category</option>
                                <?php $__currentLoopData = $categories ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : ''); ?>>
                                        <?php echo e($category->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger small mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Brand *</label>
                            <select name="brand_id" class="form-select <?php $__errorArgs = ['brand_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required
                                    style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                                <option value="">Select Brand</option>
                                <?php $__currentLoopData = $brands ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($brand->id); ?>" <?php echo e(old('brand_id', $product->brand_id ?? '') == $brand->id ? 'selected' : ''); ?>>
                                        <?php echo e($brand->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['brand_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger small mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-12">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Description *</label>
                            <textarea name="description" rows="4"
                                      class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required
                                      style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;"><?php echo e(old('description', $product->description ?? '')); ?></textarea>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger small mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="panel mb-3">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-image me-2"></i>Cover Photo <span style="font-size:0.72rem;font-weight:400;color:var(--text-muted);">— main listing image</span></span>
                </div>
                <div class="p-4">
                    <?php if(isset($product) && $product->image): ?>
                    <div class="mb-3">
                        <div style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);margin-bottom:0.5rem;">Current Cover</div>
                        <img src="<?php echo e(Storage::disk('public')->url($product->image)); ?>" alt="Cover"
                             id="coverPreviewExisting"
                             style="height:140px;width:auto;max-width:100%;object-fit:cover;border-radius:var(--radius);border:1px solid var(--border);">
                    </div>
                    <?php endif; ?>

                    <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">
                        <?php echo e(isset($product) ? 'Replace Cover Photo' : 'Cover Photo *'); ?>

                    </label>
                    <input type="file" name="cover_photo" id="coverInput"
                           class="form-control <?php $__errorArgs = ['cover_photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           accept="image/*"
                           <?php if(!isset($product)): ?> required <?php endif; ?>
                           style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                    <?php $__errorArgs = ['cover_photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger small mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div style="font-size:0.72rem;color:var(--text-muted);margin-top:0.375rem;">Single image • JPG, PNG, GIF • Max 2 MB</div>

                    <div id="coverPreviewWrap" class="mt-3" style="display:none;">
                        <div style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);margin-bottom:0.5rem;">New Cover Preview</div>
                        <img id="coverPreview" src="" alt="Cover preview"
                             style="height:140px;width:auto;max-width:100%;object-fit:cover;border-radius:var(--radius);border:1px solid var(--border);">
                    </div>
                </div>
            </div>

            
            <div class="panel mb-3">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-images me-2"></i>Gallery Photos <span style="font-size:0.72rem;font-weight:400;color:var(--text-muted);">— product detail carousel</span></span>
                </div>
                <div class="p-4">

                    <?php if(isset($product) && $product->photos->count()): ?>
                    <div style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);margin-bottom:0.75rem;">
                        Existing Gallery (<?php echo e($product->photos->count()); ?> photos)
                    </div>
                    <div class="row g-2 mb-3">
                        <?php $__currentLoopData = $product->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-auto" id="gallery-item-<?php echo e($photo->id); ?>">
                            <div style="position:relative;display:inline-block;">
                                <img src="<?php echo e($photo->url()); ?>" alt="Gallery photo"
                                     style="width:90px;height:90px;object-fit:cover;border-radius:var(--radius-sm);border:1px solid var(--border);">
                                <button type="button"
                                        onclick="deleteGalleryPhoto(<?php echo e($photo->id); ?>, event)"
                                        style="position:absolute;top:3px;right:3px;width:22px;height:22px;border-radius:50%;background:rgba(220,38,38,0.85);border:none;color:#fff;font-size:0.7rem;cursor:pointer;display:flex;align-items:center;justify-content:center;line-height:1;">
                                    <i class="bi bi-x"></i>
                                </button>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>

                    <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Add Gallery Photos</label>

                    <div id="galleryDropZone"
                         style="border:2px dashed var(--border);border-radius:var(--radius);padding:2rem;text-align:center;background:var(--surface-2);cursor:pointer;transition:border-color 0.14s;"
                         onclick="document.getElementById('galleryInput').click()"
                         ondragover="event.preventDefault();this.style.borderColor='var(--accent)'"
                         ondragleave="this.style.borderColor='var(--border)'"
                         ondrop="handleGalleryDrop(event)">
                        <i class="bi bi-cloud-upload" style="font-size:1.5rem;color:var(--text-muted);display:block;margin-bottom:0.5rem;"></i>
                        <div style="font-size:0.838rem;color:var(--text-secondary);">Drag & drop or click to add gallery photos</div>
                        <div style="font-size:0.72rem;color:var(--text-muted);margin-top:0.25rem;">JPG, PNG, GIF • Max 2 MB each • Multiple allowed</div>
                        <input type="file" name="photos[]" id="galleryInput" class="d-none" multiple accept="image/*">
                    </div>
                    <?php $__errorArgs = ['photos'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger small mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <?php $__errorArgs = ['photos.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text-danger small mt-1"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <div id="galleryPreview" class="row g-2 mt-2"></div>
                </div>
            </div>

            
            <div class="d-flex gap-2">
                <button type="submit" class="btn-primary-admin" style="padding:0.625rem 1.5rem;">
                    <i class="bi bi-check-lg"></i>
                    <?php echo e(isset($product) ? 'Update Product' : 'Create Product'); ?>

                </button>
                <a href="<?php echo e(route('admin.products.index')); ?>" class="btn-secondary-admin" style="padding:0.625rem 1.5rem;">
                    Cancel
                </a>
            </div>

        </div>

        
        <div class="col-lg-4">
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-info-circle me-2"></i>Guidelines</span>
                </div>
                <div class="p-4" style="font-size:0.813rem;color:var(--text-secondary);">
                    <div class="mb-3">
                        <div style="font-weight:600;color:var(--text-primary);margin-bottom:0.375rem;">Cover Photo</div>
                        <ul style="padding-left:1.1rem;margin:0;line-height:1.8;">
                            <li>1 photo required</li>
                            <li>Shown on product listings &amp; DataTable</li>
                            <li>Recommended: 800×800 px, square crop</li>
                            <li>Max 2 MB</li>
                        </ul>
                    </div>
                    <div class="mb-3">
                        <div style="font-weight:600;color:var(--text-primary);margin-bottom:0.375rem;">Gallery Photos</div>
                        <ul style="padding-left:1.1rem;margin:0;line-height:1.8;">
                            <li>Optional, shown on product detail page</li>
                            <li>Upload multiple at once</li>
                            <li>Different angles, lifestyle shots</li>
                            <li>Max 2 MB each</li>
                        </ul>
                    </div>
                    <?php if(isset($product)): ?>
                    <hr style="border-color:var(--border);">
                    <div style="font-size:0.72rem;color:var(--text-muted);line-height:1.9;">
                        <div><strong style="color:var(--text-secondary);">ID:</strong> #<?php echo e($product->id); ?></div>
                        <div><strong style="color:var(--text-secondary);">Created:</strong> <?php echo e($product->created_at->format('M d, Y')); ?></div>
                        <div><strong style="color:var(--text-secondary);">Updated:</strong> <?php echo e($product->updated_at->diffForHumans()); ?></div>
                        <div><strong style="color:var(--text-secondary);">Gallery:</strong> <?php echo e($product->photos->count()); ?> photo(s)</div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
// ── Cover Photo Preview ──────────────────────────────────────────
document.getElementById('coverInput').addEventListener('change', function() {
    const file = this.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
        document.getElementById('coverPreview').src = e.target.result;
        document.getElementById('coverPreviewWrap').style.display = 'block';
        const existingCover = document.getElementById('coverPreviewExisting');
        if (existingCover) {
            existingCover.style.opacity = '0.4';
        }
    };
    reader.readAsDataURL(file);
});

// ── Gallery Photos Preview ───────────────────────────────────────
document.getElementById('galleryInput').addEventListener('change', function() {
    handleGalleryFiles(this.files);
});

function handleGalleryDrop(e) {
    e.preventDefault();
    document.getElementById('galleryDropZone').style.borderColor = 'var(--border)';
    handleGalleryFiles(e.dataTransfer.files);
}

function handleGalleryFiles(files) {
    const preview = document.getElementById('galleryPreview');
    [...files].forEach(file => {
        if (!file.type.startsWith('image/')) return;
        const reader = new FileReader();
        reader.onload = e => {
            const col = document.createElement('div');
            col.className = 'col-auto';
            col.innerHTML = `
                <div style="position:relative;display:inline-block;">
                    <img src="${e.target.result}" style="width:90px;height:90px;object-fit:cover;border-radius:var(--radius-sm);border:1px solid var(--border);">
                    <button type="button" onclick="this.closest('.col-auto').remove()"
                            style="position:absolute;top:3px;right:3px;width:22px;height:22px;border-radius:50%;background:rgba(220,38,38,0.85);border:none;color:#fff;font-size:0.7rem;cursor:pointer;display:flex;align-items:center;justify-content:center;">
                        <i class="bi bi-x"></i>
                    </button>
                </div>`;
            preview.appendChild(col);
        };
        reader.readAsDataURL(file);
    });
}

// ── Delete existing gallery photo via Ajax ───────────────────────
function deleteGalleryPhoto(photoId) {
    if (!confirm('Remove this photo from the gallery?')) return;
    fetch(`/admin/products/photos/${photoId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
        }
    })
    .then(r => r.ok ? document.getElementById('gallery-item-' + photoId).remove() : alert('Could not delete photo.'))
    .catch(() => alert('Could not delete photo.'));
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp_ITCP226\htdocs\SoulMates-Inc-Project\resources\views/admin/products/create-edit.blade.php ENDPATH**/ ?>