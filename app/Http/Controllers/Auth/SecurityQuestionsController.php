<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SecurityQuestionsController extends Controller
{
    public function showQuestionsForm()
    {
        $email = session('reset_email');
        if (!$email) {
            return redirect()->route('password.request');
        }

        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect()->route('password.request');
        }

        // Reset attempts for new attempt
        session(['question_attempts' => 0]);

        return view('auth.passwords.questions', compact('user'));
    }

    public function verifyAnswers(Request $request)
    {
        $email = session('reset_email');
        if (!$email) {
            return redirect()->route('password.request');
        }

        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect()->route('password.request');
        }

        $attempts = session('question_attempts', 0);
        if ($attempts >= 3) {
            return back()->withErrors(['answers' => 'Too many failed attempts. Please try again later.']);
        }

        $request->validate([
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
        ]);

        $correct = true;
        if (!Hash::check(Str::lower(trim($request->answer1)), $user->security_answer1)) {
            $correct = false;
        }
        if (!Hash::check(Str::lower(trim($request->answer2)), $user->security_answer2)) {
            $correct = false;
        }
        if (!Hash::check(Str::lower(trim($request->answer3)), $user->security_answer3)) {
            $correct = false;
        }

        if (!$correct) {
            session(['question_attempts' => $attempts + 1]);
            return back()->withErrors(['answers' => 'Incorrect answers. Please try again.']);
        }

        // Answers correct, allow reset
        session(['verified_email' => $email]);
        session()->forget('question_attempts');

        return redirect()->route('password.reset.form');
    }
}
