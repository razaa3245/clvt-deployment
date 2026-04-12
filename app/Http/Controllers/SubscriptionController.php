<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function start(Request $request)
    {
        // Get plan from query parameter OR route parameter
        $plan = $request->query('plan') ?? $request->route('plan') ?? 'basic';
        
        // Validate plan
        $availablePlans = ['basic', 'professional', 'enterprise'];
        if (!in_array($plan, $availablePlans)) {
            abort(404, 'Invalid plan selected');
        }
        
        // Get plan details
        $planDetails = $this->getPlanDetails($plan);
        
        // Store selected plan in session so Stripe page can use it
        session(['selected_plan' => $plan]);

        // Redirect to Stripe checkout page
        return redirect()->route('stripe', ['plan' => $plan]);
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

        // Find or create shopkeeper record
        $shopkeeper = \App\Models\Shopkeeper::where('user_id', $user->id)->first();
        if (!$shopkeeper) {
            // This shouldn't happen, but just in case
            return redirect()->route('subscription.select')->with('error', 'Shopkeeper profile not found.');
        }

        // Update shopkeeper's subscription
        $planDetails = $this->getPlanDetails($validated['plan']);
        $shopkeeper->update([
            'plan_name' => $validated['plan'],
            'plan_price' => $planDetails['price'],
            'plan_expiry' => $this->getExpiryDate($validated['plan']),
            'plan_status' => 'active',
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
     * Subscription selection page for renewal
     */
    public function select()
    {
        return view('subscription.select');
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

