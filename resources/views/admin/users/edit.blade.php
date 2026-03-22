@extends('layouts.admin')

@section('page-title', 'Edit User')

@section('topbar-actions')
    <a href="{{ route('admin.users.index') }}" class="btn-secondary-admin">
        <i class="bi bi-arrow-left"></i> Back to Users
    </a>
@endsection

@section('content')
<form method="POST" action="{{ route('admin.users.update', $user) }}">
    @csrf
    @method('PUT')

    <div class="row g-3">
        {{-- LEFT COLUMN --}}
        <div class="col-lg-8">

            {{-- Account Details --}}
            <div class="panel mb-3">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-person-gear me-2"></i>Edit User: {{ $user->name }}</span>
                </div>
                <div class="p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Full Name *</label>
                            <input type="text" name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $user->name) }}" required
                                   style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                            @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Email Address *</label>
                            <input type="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $user->email) }}" required
                                   style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                            @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Phone Number</label>
                            <input type="tel" name="phone"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ old('phone', $user->phone) }}"
                                   style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                            @error('phone')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Role *</label>
                            <select name="role" class="form-select @error('role') is-invalid @enderror" required
                                    style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Administrator</option>
                            </select>
                            @error('role')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Address</label>
                            <textarea name="address" rows="3"
                                      class="form-control @error('address') is-invalid @enderror"
                                      style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">{{ old('address', $user->address) }}</textarea>
                            @error('address')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Account Status</label>
                            <div class="d-flex gap-3 mt-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_active" value="1" id="active"
                                           {{ old('is_active', $user->is_active) ? 'checked' : '' }}
                                           @if($user->id === auth()->id()) disabled @endif>
                                    <label class="form-check-label" for="active" style="font-size:0.875rem;">Active</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_active" value="0" id="inactive"
                                           {{ !old('is_active', $user->is_active) ? 'checked' : '' }}
                                           @if($user->id === auth()->id()) disabled @endif>
                                    <label class="form-check-label" for="inactive" style="font-size:0.875rem;">Inactive</label>
                                </div>
                            </div>
                            @error('is_active')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn-primary-admin" style="padding:0.625rem 1.5rem;">
                    <i class="bi bi-check-lg"></i> Update User
                </button>
                <a href="{{ route('admin.users.index') }}" class="btn-secondary-admin" style="padding:0.625rem 1.5rem;">
                    Cancel
                </a>
            </div>

        </div>
    
        {{-- RIGHT COLUMN — user info sidebar --}}
        <div class="col-lg-4">
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-info-circle me-2"></i>User Information</span>
                </div>
                <div class="p-4">
                    <div class="text-center mb-3">
                        <div class="admin-avatar mx-auto" style="width:80px;height:80px;font-size:1.75rem;">
                            @if($user->profile_photo)
                                <img src="{{ asset('storage/profile_photos/' . $user->profile_photo) }}" alt="">
                            @else
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            @endif
                        </div>
                    </div>

                    <div style="font-size:0.72rem;color:var(--text-muted);line-height:2;">
                        <div><strong style="color:var(--text-secondary);">User ID:</strong> #{{ $user->id }}</div>
                        <div><strong style="color:var(--text-secondary);">Registered:</strong> {{ $user->created_at->format('M d, Y') }}</div>
                        <div><strong style="color:var(--text-secondary);">Last Updated:</strong> {{ $user->updated_at->diffForHumans() }}</div>
                        @if($user->orders->count() > 0)
                        <div><strong style="color:var(--text-secondary);">Total Orders:</strong> {{ $user->orders->count() }}</div>
                        @endif
                    </div>

                    @if($user->id === auth()->id())
                    <div class="alert alert-warning mt-3 mb-0" style="font-size:0.813rem;">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <strong>Note:</strong> You cannot deactivate your own account.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
