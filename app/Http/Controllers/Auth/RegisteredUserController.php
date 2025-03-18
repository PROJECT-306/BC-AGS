<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Department;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $departments = Department::all(); // Fetch all departments for selection
        return view('auth.register', compact('departments'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Log the incoming request data
        Log::info('Registration attempt', $request->all());

        // Validate the incoming request
        try {
            $request->validate([
                'firstname' => ['required', 'string', 'max:255'],
                'middlename' => ['nullable', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'role' => ['required', 'string', 'in:instructor,chairperson,admin,superadmin'], // Validate that role is one of the new roles
            ]);

            // Conditionally require department_id for instructors only
            if ($request->role == 'instructor') { // Assuming 'instructor' is the role for Instructor
                $request->validate([
                    'department_id' => ['required', 'exists:departments,department_id'], // Ensure department exists
                ]);
            }

            Log::info('Validation passed');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Registration validation failed', $e->errors());
            throw $e; // Re-throw the exception to return the error response
        }

        // Create the new user
        try {
            $user = User::create([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'surname' => $request->surname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'department_id' => $request->role == 'instructor' ? $request->department_id : null, // Set department_id only for instructors
            ]);
            Log::info('User created successfully', ['user_id' => $user->id]);
        } catch (\Exception $e) {
            Log::error('User creation failed', ['error' => $e->getMessage()]);
            throw $e; // Re-throw the exception to return the error response
        }

        // Fire the Registered event
        event(new Registered($user));

        // Log the user in
        Auth::login($user);

        // Redirect to the dashboard or appropriate page
        return redirect(route('dashboard', absolute: false));
    }
}
