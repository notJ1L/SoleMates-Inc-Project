@extends('layouts.admin')

@section('page-title', 'Users')

@section('topbar-actions')
    <a href="{{ route('admin.users.create') }}" class="btn-primary-admin">
        <i class="bi bi-person-plus"></i> New User
    </a>
@endsection

@section('content')
<div class="panel">
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Joined</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:0.75rem;">
                            <div class="user-avatar">
                                @if($user->profile_photo)
                                    <img src="{{ asset('storage/profile_photos/' . $user->profile_photo) }}" alt="">
                                @else
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                @endif
                            </div>
                            <div>
                                <div style="font-weight:600;">{{ $user->name }}</div>
                                @if($user->phone)
                                    <div class="subtext">{{ $user->phone }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td style="font-size:0.838rem;color:var(--text-secondary);">{{ $user->email }}</td>
                    <td><span class="badge-pill badge-{{ $user->role }}">{{ ucfirst($user->role) }}</span></td>
                    <td><span class="badge-pill badge-{{ $user->is_active ? 'active' : 'inactive' }}">{{ $user->is_active ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <div style="font-size:0.813rem;">{{ $user->created_at->format('M d, Y') }}</div>
                        <div class="subtext">{{ $user->created_at->diffForHumans() }}</div>
                    </td>
                    <td>
                        <div style="display:flex;align-items:center;justify-content:flex-end;gap:0.375rem;">
                            <a href="{{ route('admin.users.edit', $user) }}" class="action-btn" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            @if($user->is_active)
                                <form action="{{ route('admin.users.deactivate', $user) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Deactivate this user?')">
                                    @csrf
                                    <button type="submit" class="action-btn warning" title="Deactivate"
                                            {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                                        <i class="bi bi-person-dash"></i>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('admin.users.activate', $user) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Activate this user?')">
                                    @csrf
                                    <button type="submit" class="action-btn success" title="Activate">
                                        <i class="bi bi-person-check"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">
                        <div class="empty-state">
                            <i class="bi bi-people"></i>
                            <p>No users found.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($users->hasPages())
<div style="display:flex;justify-content:center;margin-top:1.25rem;">
    {{ $users->links() }}
</div>
@endif
@endsection
