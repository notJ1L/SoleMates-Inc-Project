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
                <h5 class="mb-3">Profile Photo</h5>
                <div class="d-flex align-items-center gap-4">
                    @if($user->profilePhotoUrl())
                        <img src="{{ $user->profilePhotoUrl() }}"
                             alt="Profile Photo"
                             style="width:80px; height:80px; border-radius:50%; object-fit:cover; border:3px solid var(--accent);">
                    @else
                        <div style="width:80px; height:80px; border-radius:50%; background:#f3f0ea;
                                    display:flex; align-items:center; justify-content:center; font-size:2rem;">
                            👤
                        </div>
                    @endif
                    <div>
                        <input type="file" name="profile_photo" id="profile_photo"
                               class="form-control @error('profile_photo') is-invalid @enderror"
                               accept="image/*">
                        <small class="text-muted">JPG, PNG, GIF — max 2MB</small>
                        @error('profile_photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
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
</script>
@endsection
