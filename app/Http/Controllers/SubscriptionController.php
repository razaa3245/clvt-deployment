<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SubscriptionController extends Controller {
    public function start($plan) {
        if (!Auth::check()) {
            // User NOT logged in: redirect to login page
            return redirect()->route('login');
        }
        // User IS logged in: redirect to payment gateway, passing plan
        return redirect()->route('subscription.payment', ['plan' => $plan]);
    }
}
