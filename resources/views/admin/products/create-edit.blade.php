@extends('layouts.admin')

@section('page-title', isset($product) ? 'Edit Product' : 'Create Product')

@section('topbar-actions')
    <a href="{{ route('admin.products.index') }}" class="btn-secondary-admin">
        <i class="bi bi-arrow-left"></i> Back to Products
    </a>
@endsection

@section('content')
<form method="POST"
      action="{{ isset($product) ? route('admin.products.update', $product) : route('admin.products.store') }}"
      enctype="multipart/form-data">
    @csrf
    @if(isset($product))
        @method('PUT')
    @endif

    <div class="row g-3">
        {{-- LEFT COLUMN --}}
        <div class="col-lg-8">

            {{-- Basic Info --}}
            <div class="panel mb-3">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-box-seam me-2"></i>Product Details</span>
                </div>
                <div class="p-4">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Product Name *</label>
                            <input type="text" name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $product->name ?? '') }}" required
                                   style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                            @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Stock *</label>
                            <input type="number" name="stock"
                                   class="form-control @error('stock') is-invalid @enderror"
                                   value="{{ old('stock', $product->stock ?? 0) }}" min="0" required
                                   style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                            @error('stock')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Price (₱) *</label>
                            <input type="number" name="price"
                                   class="form-control @error('price') is-invalid @enderror"
                                   value="{{ old('price', $product->price ?? '') }}" step="0.01" min="0" required
                                   style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                            @error('price')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Category *</label>
                            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required
                                    style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                                <option value="">Select Category</option>
                                @foreach ($categories ?? [] as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Brand *</label>
                            <select name="brand_id" class="form-select @error('brand_id') is-invalid @enderror" required
                                    style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                                <option value="">Select Brand</option>
                                @foreach ($brands ?? [] as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id ?? '') == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Description *</label>
                            <textarea name="description" rows="4"
                                      class="form-control @error('description') is-invalid @enderror" required
                                      style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">{{ old('description', $product->description ?? '') }}</textarea>
                            @error('description')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- COVER PHOTO --}}
            <div class="panel mb-3">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-image me-2"></i>Cover Photo <span style="font-size:0.72rem;font-weight:400;color:var(--text-muted);">— main listing image</span></span>
                </div>
                <div class="p-4">
                    @if(isset($product) && $product->image)
                    <div class="mb-3">
                        <div style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);margin-bottom:0.5rem;">Current Cover</div>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Cover"
                             id="coverPreviewExisting"
                             style="height:140px;width:auto;max-width:100%;object-fit:cover;border-radius:var(--radius);border:1px solid var(--border);">
                    </div>
                    @endif

                    <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">
                        {{ isset($product) ? 'Replace Cover Photo' : 'Cover Photo *' }}
                    </label>
                    <input type="file" name="cover_photo" id="coverInput"
                           class="form-control @error('cover_photo') is-invalid @enderror"
                           accept="image/*"
                           @if(!isset($product)) required @endif
                           style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                    @error('cover_photo')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    <div style="font-size:0.72rem;color:var(--text-muted);margin-top:0.375rem;">Single image • JPG, PNG, GIF • Max 2 MB</div>

                    <div id="coverPreviewWrap" class="mt-3" style="display:none;">
                        <div style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);margin-bottom:0.5rem;">New Cover Preview</div>
                        <img id="coverPreview" src="" alt="Cover preview"
                             style="height:140px;width:auto;max-width:100%;object-fit:cover;border-radius:var(--radius);border:1px solid var(--border);">
                    </div>
                </div>
            </div>

            {{-- GALLERY PHOTOS --}}
            <div class="panel mb-3">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-images me-2"></i>Gallery Photos <span style="font-size:0.72rem;font-weight:400;color:var(--text-muted);">— product detail carousel</span></span>
                </div>
                <div class="p-4">

                    @if(isset($product) && $product->photos->count())
                    <div style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);margin-bottom:0.75rem;">
                        Existing Gallery ({{ $product->photos->count() }} photos)
                    </div>
                    <div class="row g-2 mb-3">
                        @foreach($product->photos as $photo)
                        <div class="col-auto" id="gallery-item-{{ $photo->id }}">
                            <div style="position:relative;display:inline-block;">
                                <img src="{{ asset('storage/' . $photo->image_path) }}" alt="Gallery photo"
                                     style="width:90px;height:90px;object-fit:cover;border-radius:var(--radius-sm);border:1px solid var(--border);">
                                <button type="button"
                                        onclick="deleteGalleryPhoto({{ $photo->id }})"
                                        style="position:absolute;top:3px;right:3px;width:22px;height:22px;border-radius:50%;background:rgba(220,38,38,0.85);border:none;color:#fff;font-size:0.7rem;cursor:pointer;display:flex;align-items:center;justify-content:center;line-height:1;">
                                    <i class="bi bi-x"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

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
                    @error('photos')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    @error('photos.*')<div class="text-danger small mt-1">{{ $message }}</div>@enderror

                    <div id="galleryPreview" class="row g-2 mt-2"></div>
                </div>
            </div>

            {{-- Submit --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn-primary-admin" style="padding:0.625rem 1.5rem;">
                    <i class="bi bi-check-lg"></i>
                    {{ isset($product) ? 'Update Product' : 'Create Product' }}
                </button>
                <a href="{{ route('admin.products.index') }}" class="btn-secondary-admin" style="padding:0.625rem 1.5rem;">
                    Cancel
                </a>
            </div>

        </div>

        {{-- RIGHT COLUMN —  info sidebar --}}
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
                    @if(isset($product))
                    <hr style="border-color:var(--border);">
                    <div style="font-size:0.72rem;color:var(--text-muted);line-height:1.9;">
                        <div><strong style="color:var(--text-secondary);">ID:</strong> #{{ $product->id }}</div>
                        <div><strong style="color:var(--text-secondary);">Created:</strong> {{ $product->created_at->format('M d, Y') }}</div>
                        <div><strong style="color:var(--text-secondary);">Updated:</strong> {{ $product->updated_at->diffForHumans() }}</div>
                        <div><strong style="color:var(--text-secondary);">Gallery:</strong> {{ $product->photos->count() }} photo(s)</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
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
@endsection
