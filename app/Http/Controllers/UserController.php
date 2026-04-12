<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected UserService $userService;

    public function __dashboard(UserService $userService){
        if(auth::check() && auth::user()->type === 'admin'){
            return view('admin.adminboard');
        }
        elseif(auth::check() && auth::user()->type === 'user'){
            return view('web.content.shopkeeper');
        }
        else {
            return redirect('/login');
        }
    }

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->all();
        return response()->json(compact('users'));
    }

    public function store(UserRequest $request)
    {
        $user = $this->userService->registerUser($request->validated());

        return response()->json([
            'message' => 'Registration successful. Check your email for OTP verification.',
            'email' => $user->email,
        ], 201);
    }

    public function resendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);
        $this->userService->resendOtp($request->email);

        return response()->json(['message' => 'A new OTP has been sent to your email.']);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|numeric',
        ]);

        $verified = $this->userService->verifyOtp($request->email, $request->otp);

        if ($verified) {
            return response()->json([
                'message' => 'Email verified successfully!',
            ]);
        }

        return response()->json(['error' => 'Invalid or expired OTP.'], 400);
    }

    public function show($id)
    {
        $user = $this->userService->find($id);
        return response()->json(compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = $this->userService->update($id, $request->validated());
        return response()->json(compact('user'));
    }

    public function destroy($id)
    {
        $this->userService->delete($id);
        return response()->json(['message' => 'User deleted successfully']);
    }
}
