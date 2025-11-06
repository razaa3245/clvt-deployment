<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
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
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // Prevent session fixation
        return redirect('/after-login-choice'); // Or dashboard, as desired
    }

    // Failed: send back with error
    return back()->withErrors(['email' => 'Invalid credentials']);
}
public function showLoginForm() {
    return view('auth.signup'); // render your combined login/signup page
}

public function logout(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
}
}

