<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Http\Requests\Management\StoreUserRequest;
use App\Http\Requests\Management\UpdateUserRequest;
use App\Models\User;
use App\Support\Generators\PasswordGenerator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where(function ($query) {
            $query->whereHas('role', function ($query) {
                $query->where('slug', 'customer');
            })
            ->orWhereNull('role_id');
        })
        ->with([
            'role'
        ])
        ->latest()
        ->paginate(15);

        return view('management.users.index', compact('users'));
    }

    public function create()
    {
        return view('management.users.create');
    }

    public function store(StoreUserRequest $request, PasswordGenerator $passwordGenerator)
    {
        $validated = $request->validated();
        $password = $passwordGenerator->generate();
        $hashedPassword = $passwordGenerator->hash($password);

        $validated['password'] = $hashedPassword;
        $validated['status'] = User::STATUS_REGISTERED;
        $validated['role_id'] = null;

        $user = User::create($validated);
        
        return redirect()->route('users.show', $user)->with('success', __('auth.created'));
    }

    public function show(User $user)
    {
        $user->load([
            'role',
            'activeInsurancePolicy',
            'activeSubscription.subscriptionPlan',
            'activeEntryPackage',
            'insurancePolicies',
            'subscriptions.subscriptionPlan',
            'entryPackages',
            'bookings.lesson',
            'serviceBookings.service',
            'registrationPayments'
        ]);

        return view('management.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('management.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->update($validated);

        return redirect()->route('users.show', $user)->with('success', __('auth.updated'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', __('auth.deleted'));
    }
}
