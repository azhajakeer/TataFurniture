<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register'); // Render the registration view
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the incoming request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->email === 'admin@gmail.com' ? 'admin' : 'user',
        ]);
        

        // Trigger the Registered event
        event(new Registered($user));
        
        // Log the user data for debugging purposes
        Log::info('User class type', ['class' => get_class($user)]);
        Log::info('User instance data', ['data' => $user->toArray()]);

        // Create the Sanctum token
        $token = $user->createToken('YourAppName')->plainTextToken;

        // Log the generated token for debugging
        Log::info('New user token:', ['token' => $token]);

        // Log the user in
        Log::info('User Role Assignment', ['role' => $request->email === 'admin@gmail.com' ? 'admin' : 'user']);
        ;

        // Log the redirect route
        if ($user->role === 'admin') {
            Log::info('Redirecting to Admin Dashboard');
            return redirect()->route('admin/dashboard');
        }
        
        Log::info('Redirecting to User Dashboard');
        return redirect()->route('dashboard');
        
        


        }

        
    
}
