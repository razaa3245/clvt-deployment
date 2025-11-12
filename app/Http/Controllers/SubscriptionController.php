<?php

// namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;

// class SubscriptionController extends Controller {
//     public function start($plan) {
//         if (!Auth::check()) {
//             // User NOT logged in: redirect to login page
//             return redirect()->route('login');
//         }
//         // User IS logged in: redirect to payment gateway, passing plan
//         return redirect()->route('subscription.payment', ['plan' => $plan]);
//     }
// }


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Start subscription process
     */
    public function start(Request $request)
    {
        // ✅ Get plan from query parameter OR route parameter
        $plan = $request->query('plan') ?? $request->route('plan') ?? 'basic';
        
        // Validate plan
        $availablePlans = ['basic', 'professional', 'enterprise'];
        if (!in_array($plan, $availablePlans)) {
            abort(404, 'Invalid plan selected');
        }
        
        // Get plan details
        $planDetails = $this->getPlanDetails($plan);
        
        // Check if user is logged in
        if (!Auth::check()) {
            // Redirect to signup with plan info
            return redirect()->route('signup')->with([
                'selected_plan' => $plan,
                'message' => 'Please sign up to continue with ' . ucfirst($plan) . ' plan'
            ]);
        }
        
        // If logged in, show checkout
        return view('subscription.checkout', [
            'plan' => $plan,
            'details' => $planDetails,
            'user' => Auth::user()
        ]);
    }
    
    /**
     * Process checkout
     */
    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'plan' => 'required|in:basic,professional,enterprise',
            'payment_method' => 'required|string',
        ]);
        
        $user = Auth::user();
        
        // Create subscription record
        \App\Models\Subscription::create([
            'user_id' => $user->id,
            'plan' => $validated['plan'],
            'status' => 'active',
            'expires_at' => $this->getExpiryDate($validated['plan']),
        ]);
        
        return redirect()->route('subscription.success')->with('plan', $validated['plan']);
    }
    
    /**
     * Success page
     */
    public function success()
    {
        $plan = session('plan', 'basic');
        return view('subscription.success', compact('plan'));
    }
    
    /**
     * Get plan details
     */
    private function getPlanDetails($plan)
    {
        $plans = [
            'basic' => [
                'name' => 'Basic',
                'price' => 29.99,
                'duration' => '1 month',
                'features' => [
                    '1 month subscription',
                    'Virtual try-on for unlimited customers',
                    'Unique QR code',
                    'Basic dashboard access',
                    'Email support',
                    'Up to 50 lens SKUs'
                ]
            ],
            'professional' => [
                'name' => 'Professional',
                'price' => 79.99,
                'duration' => '6 months',
                'features' => [
                    '6 months subscription',
                    'Everything in Basic',
                    'Advanced analytics',
                    'Priority email support',
                    'Custom branding options',
                    'Up to 200 lens SKUs'
                ]
            ],
            'enterprise' => [
                'name' => 'Enterprise',
                'price' => 199.99,
                'duration' => '12 months',
                'features' => [
                    '12 months subscription',
                    'Everything in Pro',
                    'Dedicated account manager',
                    '24/7 priority support',
                    'Unlimited lens SKUs',
                    'Advanced customization',
                    'API access'
                ]
            ]
        ];
        
        return $plans[$plan];
    }
    
    /**
     * Calculate expiry date
     */
    private function getExpiryDate($plan)
    {
        $months = [
            'basic' => 1,
            'professional' => 6,
            'enterprise' => 12
        ];
        
        return now()->addMonths($months[$plan]);
    }
}

