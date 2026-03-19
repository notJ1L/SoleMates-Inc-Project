@extends('layouts.app')

@section('title', 'My Profile — SoulMates Inc.')

@section('content')
<div class="container py-5" style="max-width: 680px;">
    <h2 class="mb-4" style="font-family: var(--font-display); font-weight: 800;">My Profile</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Profile Photo --}}
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body p-4">
                <h5 class="mb-4">Profile Photo</h5>
                <div class="d-flex flex-column align-items-center text-center">
                    @if($user->profilePhotoUrl())
                        <img id="profilePreview"
                             src="{{ $user->profilePhotoUrl() }}"
                             alt="Profile Photo"
                             style="width:220px; height:220px; border-radius:50%; object-fit:cover; border:4px solid var(--accent); box-shadow:0 8px 18px rgba(0,0,0,0.08);">
                    @else
                        <div id="profilePlaceholder"
                             style="width:220px; height:220px; border-radius:50%; background:#f3f0ea; border:2px dashed #d3c8b7; display:flex; align-items:center; justify-content:center; color:#746754; font-weight:700; letter-spacing:0.06em;">
                            PHOTO
                        </div>
                        <img id="profilePreview"
                             src=""
                             alt="Profile Photo"
                             style="display:none; width:220px; height:220px; border-radius:50%; object-fit:cover; border:4px solid var(--accent); box-shadow:0 8px 18px rgba(0,0,0,0.08);">
                    @endif

                    <input type="file" name="profile_photo" id="profile_photo"
                           class="d-none @error('profile_photo') is-invalid @enderror"
                           accept="image/*">

                    <label for="profile_photo" class="btn btn-outline-primary mt-4 px-4 py-2">
                        Change Photo
                    </label>

                    <small id="profileFileName" class="text-muted mt-2">JPG, PNG, GIF - max 2MB</small>
                    @error('profile_photo') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        {{-- Personal Info --}}
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body p-4">
                <h5 class="mb-3">Personal Information</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Full Name</label>
                    <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                           class="form-control @error('name') is-invalid @enderror" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email Address</label>
                    <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                           class="form-control @error('email') is-invalid @enderror" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Phone Number</label>
                    <input type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}"
                           class="form-control @error('phone') is-invalid @enderror">
                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-0">
                    <label class="form-label fw-semibold">Address</label>
                    <textarea name="address" rows="2"
                              class="form-control @error('address') is-invalid @enderror">{{ old('address', auth()->user()->address) }}</textarea>
                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        {{-- Change Password --}}
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <h5 class="mb-0">Change Password</h5>
                    <button type="button" id="togglePasswordBtn" class="btn btn-sm btn-outline-secondary"
                            onclick="togglePasswordFields()">Change Password</button>
                </div>

                <div id="passwordFields" style="display: none;" class="mt-3">
                    <small class="text-muted d-block mb-3">Leave blank to keep your current password.</small>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Current Password</label>
                        <input type="password" name="current_password" id="current_password"
                               class="form-control @error('current_password') is-invalid @enderror">
                        @error('current_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">New Password</label>
                        <input type="password" name="new_password" id="new_password"
                               class="form-control @error('new_password') is-invalid @enderror">
                        @error('new_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-semibold">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control">
                    </div>
                </div>
            </div>
        </div>

                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
        <a href="{{ route('home') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
    </form>
</div>
@endsection

@section('scripts')
<script>
    @if($errors->hasAny(['current_password', 'new_password']))
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('passwordFields').style.display = 'block';
            var btn = document.getElementById('togglePasswordBtn');
            btn.textContent = 'Cancel';
            btn.classList.replace('btn-outline-secondary', 'btn-outline-danger');
        });
    @endif

    function togglePasswordFields() {
        const fields = document.getElementById('passwordFields');
        const btn = document.getElementById('togglePasswordBtn');
        if (fields.style.display === 'none') {
            fields.style.display = 'block';
            btn.textContent = 'Cancel';
            btn.classList.replace('btn-outline-secondary', 'btn-outline-danger');
        } else {
            fields.style.display = 'none';
            btn.textContent = 'Change Password';
            btn.classList.replace('btn-outline-danger', 'btn-outline-secondary');
            document.getElementById('current_password').value = '';
            document.getElementById('new_password').value = '';
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('profile_photo');
        const preview = document.getElementById('profilePreview');
        const placeholder = document.getElementById('profilePlaceholder');
        const fileName = document.getElementById('profileFileName');

        if (!input || !preview || !fileName) {
            return;
        }

        input.addEventListener('change', function () {
            const file = this.files && this.files[0] ? this.files[0] : null;
            if (!file) {
                fileName.textContent = 'JPG, PNG, GIF - max 2MB';
                return;
            }

            fileName.textContent = file.name;
            const objectUrl = URL.createObjectURL(file);
            preview.src = objectUrl;
            preview.style.display = 'block';
            if (placeholder) {
                placeholder.style.display = 'none';
            }
        });
    });
</script>
@endsection
