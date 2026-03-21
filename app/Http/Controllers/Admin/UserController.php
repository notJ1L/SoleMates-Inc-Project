<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.users.index');  
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function data(Request $request)
    {
        $query = User::query()
            ->when($request->filled('role_filter'),   fn($q) => $q->where('role', $request->role_filter))
            ->when($request->filled('status_filter'), function ($q) use ($request) {
                if ($request->status_filter === 'active')   $q->where('is_active', true);
                elseif ($request->status_filter === 'inactive') $q->where('is_active', false);
            });

        return DataTables::of($query)
            ->addColumn('avatar_col', function (User $user) {
                if ($user->profile_photo) {
                    $url = Storage::disk('public')->url($user->profile_photo);
                    $img = '<img src="' . e($url) . '" style="width:36px;height:36px;border-radius:50%;object-fit:cover;border:1px solid #E6E0D8;">';
                } else {
                    $letter = strtoupper(mb_substr($user->name, 0, 1));
                    $img = '<div style="width:36px;height:36px;border-radius:50%;background:var(--accent-light,#F3EDE3);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:0.875rem;color:var(--accent,#8B6F47);">' . e($letter) . '</div>';
                }
                return '<div style="display:flex;align-items:center;gap:0.65rem;">'
                    . $img
                    . '<div><div style="font-weight:600;">' . e($user->name) . '</div>'
                    . ($user->phone ? '<div style="font-size:0.75rem;color:#A09A94;">' . e($user->phone) . '</div>' : '')
                    . '</div></div>';
            })
            ->addColumn('role_col', function (User $user) {
                return '<span class="badge-pill badge-' . e($user->role) . '">' . ucfirst(e($user->role)) . '</span>';
            })
            ->addColumn('status_col', function (User $user) {
                return $user->is_active
                    ? '<span class="badge-pill badge-active">Active</span>'
                    : '<span class="badge-pill badge-inactive">Inactive</span>';
            })
            ->addColumn('joined_col', function (User $user) {
                return '<div style="font-size:0.813rem;">' . $user->created_at->format('M d, Y') . '</div>'
                    . '<div style="font-size:0.72rem;color:#A09A94;">' . $user->created_at->diffForHumans() . '</div>';
            })
            ->addColumn('actions', function (User $user) {
                $editBtn = '<a href="' . route('admin.users.edit', $user) . '" class="action-btn" title="Edit"><i class="bi bi-pencil"></i></a>';

                if ($user->is_active) {
                    $toggleBtn = '<form action="' . route('admin.users.deactivate', $user) . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Deactivate this user?\')">'
                        . csrf_field()
                        . '<button type="submit" class="action-btn warning" title="Deactivate"' . ($user->id === auth()->id() ? ' disabled' : '') . '><i class="bi bi-person-dash"></i></button>'
                        . '</form>';
                } else {
                    $toggleBtn = '<form action="' . route('admin.users.activate', $user) . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Activate this user?\')">'
                        . csrf_field()
                        . '<button type="submit" class="action-btn success" title="Activate"><i class="bi bi-person-check"></i></button>'
                        . '</form>';
                }

                return '<div style="display:flex;align-items:center;justify-content:flex-end;gap:0.375rem;">'
                    . $editBtn . $toggleBtn
                    . '</div>';
            })
            ->rawColumns(['avatar_col', 'role_col', 'status_col', 'joined_col', 'actions'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,user',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'phone' => $request->phone,
            'address' => $request->address,
            'is_active' => true,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'is_active' => 'required|boolean'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'phone' => $request->phone,
            'address' => $request->address,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function deactivate(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'You cannot deactivate your own account.');
        }

        $user->update(['is_active' => false]);
        return redirect()->back()->with('success', 'User deactivated successfully.');
    }

    public function activate(User $user)
    {
        $user->update(['is_active' => true]);
        return redirect()->back()->with('success', 'User activated successfully.');
    }
}
