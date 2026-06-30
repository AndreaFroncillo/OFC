<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Http\Requests\Management\StoreUserRequest;
use App\Models\User;
use App\Support\Generators\PasswordGenerator;
use Hash;
use Illuminate\Http\Request;

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

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        // 
    }
}
