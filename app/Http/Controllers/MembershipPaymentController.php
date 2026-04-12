<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Shopkeeper;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Stripe\StripeClient;

class MembershipPaymentController extends Controller
{
    /**
     * Show the payment form for the membership plan.
     *
     * @return \Illuminate\View\View
     */
    public function membership()
    {
        // hardcode the plan amount here so both form and controller agree
        $planAmount = 4000; // rupees
        return view('membership-payment', compact('planAmount'));
    }

    /**
     * Handle the incoming Stripe payment request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function paymentPost(Request $request)
    {
        // basic validation - require token and minimal profile fields
        $request->validate([
            'stripeToken' => 'required|string',
            'email'       => 'required|email',
            'full_name'   => 'required|string|max:255',
        ]);

        // calculate using constant plan amount (in rupees) to prevent tampering
        $planAmount = 4000; // rupees
        $amount = $planAmount * 100; // convert to paisa (smallest currency unit for PKR)

        try {
            $stripe = new StripeClient(config('services.stripe.secret'));

            $stripe->charges->create([
                'amount'        => $amount,
                'currency'      => 'pkr',
                'source'        => $request->stripeToken,
                'description'   => 'Professional plan payment',
                'receipt_email' => $request->email,
            ]);

            // Ensure we have a user + shopkeeper record stored alongside the payment
            $this->createOrUpdateShopkeeperFromPayment($request->all(), [
                'plan_name'   => 'Professional Plan',
                'plan_price'  => $planAmount,
                'plan_days'   => 180,
            ]);

        } catch (\Exception $e) {
            // log the exception if you want: \Log::error($e->getMessage());
            return back()->with('error', 'Payment failed: ' . $e->getMessage());
        }

        return back()->with('success', 'Payment successful in PKR!');
    }

    private function createOrUpdateShopkeeperFromPayment(array $data, array $planDetails)
    {
        $name  = $data['full_name'] ?? $data['name'] ?? null;
        $email = $data['email'] ?? null;

        if (!$email) {
            return;
        }

        // Ensure user exists
        $user = User::firstOrNew(['email' => $email]);
        $user->name = $name;
        $user->type = 'shopkeeper';
        $user->is_approved = true;

        if (! $user->exists) {
            $user->password = Hash::make(Str::random(12));
        }

        $user->save();

        // Build shopkeeper payload (store all possible address/shop data)
        $shopkeeperData = [
            'name'          => $name,
            'email'         => $email,
            'phone'         => $data['phone'] ?? null,
            'shop_name'     => $data['shop_name'] ?? ($name ? $name . "'s Shop" : null),
            'retailer_name' => $data['retailer_name'] ?? $name,
            'address'       => $data['address'] ?? null,
            'city'          => $data['city'] ?? null,
            'status'        => 'active',
            'plan_name'     => $planDetails['plan_name'] ?? null,
            'plan_price'    => $planDetails['plan_price'] ?? null,
            'plan_expiry'   => isset($planDetails['plan_days']) ? Carbon::now()->addDays($planDetails['plan_days'])->toDateString() : null,
            'plan_status'   => 'active',
        ];

        Shopkeeper::updateOrCreate(
            ['user_id' => $user->id],
            $shopkeeperData
        );
    }
}

