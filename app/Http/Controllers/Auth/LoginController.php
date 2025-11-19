<?php

// namespace App\Http\Controllers\Auth;
// use Illuminate\Support\Facades\Auth;
// use App\Models\User;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Hash;

// class LoginController extends Controller
// {
//    public function login(Request $request)
//     {
//         $request->validate([
//             'email'    => 'required|email',
//             'password' => 'required'
//         ]);

//         $user = User::where('email', $request->email)->first();

//         if (!$user || !Hash::check($request->password, $user->password)) {
//             return response()->json(['message' => 'Invalid credentials'], 401);
//         }

//         // Simple token (you can replace with Sanctum/JWT)
//         $token = base64_encode(str()->random(40));

//         return response()->json([
//             'user' => $user,
//             'token' => $token
//         ]);
//     }
// public function login(Request $request)
// {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);

//     $credentials = $request->only('email', 'password');

//     if (Auth::attempt($credentials)) {
//         $request->session()->regenerate(); // Prevent session fixation
//         return redirect('/after-login-choice'); // Or dashboard, as desired
//     }

//     // Failed: send back with error
//     return back()->withErrors(['email' => 'Invalid credentials']);
// }
// public function showLoginForm() {
//     return view('auth.signup'); // render your combined login/signup page
// }

// public function logout(Request $request) {
//     Auth::logout();
//     $request->session()->invalidate();
//     $request->session()->regenerateToken();
//     return redirect('/login');
// }

// namespace App\Http\Controllers\Auth;

// use Illuminate\Support\Facades\Auth;
// use App\Models\User;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Hash;

// class LoginController extends Controller
// {
//     // Show login/signup view
//     public function showLoginForm()
//     {
//         return view('auth.signup'); // or your custom login blade view
//     }

//     // Handle login and role/approval checks
//     public function login(Request $request)
//     {
//         $request->validate([
//             'email' => 'required|email',
//             'password' => 'required',
//         ]);

//         $credentials = $request->only('email', 'password');

//         if (Auth::attempt($credentials)) {
//             $request->session()->regenerate();
//             $user = Auth::user();

//             // Check approval (assuming is_approved boolean column exists)
//             //todo in frontend when login api is calling do that when the response of the api come then check that &response->role=='shopkeeper' then redirect it to shopkeeper dashboard and if the response->role == 'admin' then redirect it to admin dashboard we can also do that using auth, but this is easy use it
//             if ($user->type === 'shopkeeper' && isset($user->is_approved) && !$user->is_approved) {
//                 Auth::logout();
//                 return back()->withErrors(['email' => 'Your account is pending admin approval.']);
//             }

//             // Route by role
//             if ($user->type === 'admin') {
//                 return redirect()->route('admin.dashboard');
//             } elseif ($user->type === 'shopkeeper') {
//                 return redirect()->route('shopkeeper.dashboard');
//             } else {
//                 return redirect('/after-login-choice');
//             }
//         }

//         return back()->withErrors(['email' => 'Invalid credentials']);
//     }

//     public function logout(Request $request)
//     {
//         Auth::logout();
//         $request->session()->invalidate();
//         $request->session()->regenerateToken();
//         return redirect('/login');
//     }
// }


namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.signup');
    }

    // Web-only login: session-based authentication
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput($request->only('email'));
        }

        $user = Auth::user();

        // Optional approval check for shopkeepers
        if ($user->type === 'shopkeeper' && isset($user->is_approved) && !$user->is_approved) {
            Auth::logout();
            return back()->withErrors(['email' => 'Your account is pending admin approval.']);
        }

        $request->session()->regenerate();

        // Redirect by role or intended URL
        if ($user->type === 'admin') {
            return redirect()->intended(route('admin.dashboard'));
        }

        if ($user->type === 'shopkeeper') {
            return redirect()->intended(route('shopkeeper.dashboard'));
        }

        return redirect()->intended('/');
    }

    // Web logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}



