@extends('layouts.admin')

@section('page-title', 'Add User')

@section('topbar-actions')
    <a href="{{ route('admin.users.index') }}" class="btn-secondary-admin">
        <i class="bi bi-arrow-left"></i> Back to Users
    </a>
@endsection

@section('content')
<form method="POST" action="{{ route('admin.users.store') }}">
    @csrf

    <div class="row g-3">
        {{-- LEFT COLUMN --}}
        <div class="col-lg-8">

            {{-- Account Details --}}
            <div class="panel mb-3">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-person-plus me-2"></i>Add New User</span>
                </div>
                <div class="p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Full Name *</label>
                            <input type="text" name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" required
                                   style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                            @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Email Address *</label>
                            <input type="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" required
                                   style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                            @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Password *</label>
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   required
                                   style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                            @error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Confirm Password *</label>
                            <input type="password" name="password_confirmation"
                                   class="form-control"
                                   required
                                   style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Phone Number</label>
                            <input type="tel" name="phone"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ old('phone') }}"
                                   style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                            @error('phone')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Role *</label>
                            <select name="role" class="form-select @error('role') is-invalid @enderror" required
                                    style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">
                                <option value="user" {{ old('role', 'user') == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrator</option>
                            </select>
                            @error('role')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label" style="font-size:0.72rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:var(--text-secondary);">Address</label>
                            <textarea name="address" rows="3"
                                      class="form-control @error('address') is-invalid @enderror"
                                      style="border:1px solid var(--border);border-radius:var(--radius-sm);font-size:0.875rem;padding:0.5rem 0.75rem;">{{ old('address') }}</textarea>
                            @error('address')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn-primary-admin" style="padding:0.625rem 1.5rem;">
                    <i class="bi bi-check-lg"></i> Create User
                </button>
                <a href="{{ route('admin.users.index') }}" class="btn-secondary-admin" style="padding:0.625rem 1.5rem;">
                    Cancel
                </a>
            </div>

        </div>

        {{-- RIGHT COLUMN — guidelines --}}
        <div class="col-lg-4">
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-info-circle me-2"></i>Guidelines</span>
                </div>
                <div class="p-4" style="font-size:0.813rem;color:var(--text-secondary);">
                    <div class="mb-3">
                        <div style="font-weight:600;color:var(--text-primary);margin-bottom:0.375rem;">Password</div>
                        <ul style="padding-left:1.1rem;margin:0;line-height:1.8;">
                            <li>Minimum 8 characters</li>
                            <li>Both password fields must match</li>
                        </ul>
                    </div>
                    <div class="mb-3">
                        <div style="font-weight:600;color:var(--text-primary);margin-bottom:0.375rem;">Role</div>
                        <ul style="padding-left:1.1rem;margin:0;line-height:1.8;">
                            <li><strong style="color:var(--text-primary);">User</strong> — shop access only</li>
                            <li><strong style="color:var(--text-primary);">Administrator</strong> — full admin panel access</li>
                        </ul>
                    </div>
                    <div>
                        <div style="font-weight:600;color:var(--text-primary);margin-bottom:0.375rem;">Contact</div>
                        <ul style="padding-left:1.1rem;margin:0;line-height:1.8;">
                            <li>Phone and address are optional</li>
                            <li>Email must be unique</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
