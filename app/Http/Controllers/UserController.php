<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        return redirect()->route('users.create');
    }

    public function create()
    {
        $user = request()->user();
        $isAdmin = $user && $user->role === 'Admin';
        $isLimited = !$isAdmin;
        $divisions = $isAdmin ? $this->divisionOptions() : [$user->division];
        $roles = $isAdmin ? ['User', 'Admin'] : ['User'];

        return view('users.create', compact('divisions', 'roles', 'isLimited'));
    }

    public function store(Request $request)
    {
        $creator = $request->user();
        $isAdmin = $creator && $creator->role === 'Admin';
        $allowedRoles = $isAdmin ? ['User', 'Admin'] : ['User'];

        $data = $request->validate([
            'username' => ['required', 'string', 'max:50', 'unique:users,username'],
            'division' => [
                Rule::requiredIf(fn () => $request->input('role') !== 'Admin'),
                'nullable',
                'string',
                'max:80',
                Rule::exists('divisions', 'name'),
            ],
            'role' => ['required', Rule::in($allowedRoles)],
            'email' => ['required', 'email', 'max:120', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        if (!$isAdmin) {
            $data['division'] = $creator->division;
        }

        if (empty($data['division'])) {
            $data['division'] = null;
        }

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('users.create')->with('status', 'Akun berhasil dibuat.');
    }

    public function edit(User $user)
    {
        $divisions = $this->divisionOptions();
        $roles = ['User', 'Admin'];

        return view('users.edit', compact('user', 'divisions', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'username' => ['required', 'string', 'max:50', 'unique:users,username,' . $user->id],
            'division' => [
                Rule::requiredIf(fn () => $request->input('role') !== 'Admin'),
                'nullable',
                'string',
                'max:80',
                Rule::exists('divisions', 'name'),
            ],
            'role' => ['required', 'in:User,Admin'],
            'email' => ['required', 'email', 'max:120', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:6'],
        ]);

        if (empty($data['division'])) {
            $data['division'] = null;
        }

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.create')->with('status', 'Akun berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if ($user->role === 'Admin' && User::where('role', 'Admin')->count() <= 1) {
            return redirect()->route('users.create')->with('status', 'Minimal harus ada satu admin.');
        }

        $user->delete();

        return redirect()->route('users.create')->with('status', 'Akun berhasil dihapus.');
    }

    public function profile(Request $request)
    {
        $user = $request->user();

        return view('users.profile', compact('user'));
    }

    private function divisionOptions(): array
    {
        return Division::orderBy('name')
            ->pluck('name')
            ->toArray();
    }
}
