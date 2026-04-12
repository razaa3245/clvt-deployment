<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Stripe\StripeClient;
use App\Models\User;
use App\Models\Shopkeeper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class StripeController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function stripe(Request $request)
    {
        $signupData = session('signup_data');
        $isRenewal = false;
        $renewUserId = session('renew_user_id');

        /**
         * Renewal for expired user
         */
        if ($renewUserId) {

            $isRenewal = true;

            $user = User::find($renewUserId);
            $shopkeeper = Shopkeeper::where('user_id', $user->id)->first();

            if (!$shopkeeper) {
                return redirect()->route('subscription.select')
                    ->with('error', 'Shopkeeper profile not found.');
            }

            $signupData = [
                'name' => $shopkeeper->name,
                'email' => $shopkeeper->email,
                'phone' => $shopkeeper->phone,
                'shop_name' => $shopkeeper->shop_name,
                'address' => $shopkeeper->address,
                'retailer_name' => $shopkeeper->retailer_name,
            ];
        }

        /**
         * Renewal for logged in user
         */
        elseif (!$signupData && auth()->check() && auth()->user()->type === 'shopkeeper') {

            $isRenewal = true;

            $user = auth()->user();

            $shopkeeper = Shopkeeper::where('user_id', $user->id)->first();

            if (!$shopkeeper) {
                return redirect()->route('subscription.select')
                    ->with('error', 'Shopkeeper profile not found.');
            }

            $signupData = [
                'name' => $shopkeeper->name,
                'email' => $shopkeeper->email,
                'phone' => $shopkeeper->phone,
                'shop_name' => $shopkeeper->shop_name,
                'address' => $shopkeeper->address,
                'retailer_name' => $shopkeeper->retailer_name,
            ];
        }

        $plan = session('selected_plan', $request->query('plan', 'basic'));

        $plans = [
            'basic' => [
                'name' => 'Basic Plan',
                'price' => 1000,
                'days' => 30
            ],
            'professional' => [
                'name' => 'Professional Plan',
                'price' => 4000,
                'days' => 180
            ],
            'enterprise' => [
                'name' => 'Enterprise Plan',
                'price' => 7000,
                'days' => 360
            ],
        ];

        if (!isset($plans[$plan])) {
            $plan = 'basic';
        }

        return view('stripe', [
            'signupData' => $signupData,
            'plan' => $plan,
            'planDetails' => $plans[$plan],
            'isRenewal' => $isRenewal
        ]);
    }

    public function stripePost(Request $request)
    {

        $stripe = new StripeClient(config('services.stripe.secret'));

        $plan = session('selected_plan', $request->plan ?? 'basic');

        $plans = [
            'basic' => ['name' => 'Basic Plan', 'price' => 1000, 'days' => 30],
            'professional' => ['name' => 'Professional Plan', 'price' => 4000, 'days' => 180],
            'enterprise' => ['name' => 'Enterprise Plan', 'price' => 7000, 'days' => 360],
        ];

        if (!isset($plans[$plan])) {
            $plan = 'basic';
        }

        $planDetails = $plans[$plan];

        try {

            /**
             * Stripe Payment
             */
            $stripe->charges->create([
                'amount' => $planDetails['price'] * 100,
                'currency' => 'pkr',
                'source' => $request->stripeToken,
                'description' => $planDetails['name'],
            ]);

        } catch (\Exception $e) {

            return back()->with('error', 'Payment failed: ' . $e->getMessage());
        }

        DB::beginTransaction();

        try {

            /**
             * Renewal for expired user
             */
            $renewUserId = session('renew_user_id');

            if ($renewUserId) {

                $user = User::find($renewUserId);

                $shopkeeper = Shopkeeper::where('user_id', $user->id)->first();

                if (!$shopkeeper) {
                    throw new \Exception("Shopkeeper not found.");
                }

                $shopkeeper->update([
                    'plan_name' => $planDetails['name'],
                    'plan_price' => $planDetails['price'],
                    'plan_expiry' => Carbon::now()->addDays($planDetails['days']),
                    'plan_status' => 'active'
                ]);

                DB::commit();

                session()->forget(['renew_user_id', 'selected_plan']);

                return redirect('/login')
                    ->with('success', 'Subscription renewed successfully. Please login.');
            }

            /**
             * Renewal for logged-in user
             */
            if (auth()->check() && auth()->user()->type === 'shopkeeper') {

                $user = auth()->user();

                $shopkeeper = Shopkeeper::where('user_id', $user->id)->first();

                if (!$shopkeeper) {
                    throw new \Exception("Shopkeeper not found.");
                }

                $shopkeeper->update([
                    'plan_name' => $planDetails['name'],
                    'plan_price' => $planDetails['price'],
                    'plan_expiry' => Carbon::now()->addDays($planDetails['days']),
                    'plan_status' => 'active'
                ]);

                DB::commit();

                session()->forget('selected_plan');

                return redirect()->route('subscription.success')
                    ->with('plan', $plan);
            }

            /**
             * New Signup
             */

            $signupData = session('signup_data', []);

            $fullName = $request->input('full_name') ?? ($signupData['name'] ?? null);
            $email = $request->input('email') ?? ($signupData['email'] ?? null);
            $password = $request->input('password') ?? ($signupData['password'] ?? Str::random(8));

            if (!$email) {
                throw new \Exception("Email is required.");
            }

            $shopkeeperData = [
                'name' => $fullName,
                'email' => $email,
                'shop_name' => $request->input('shop_name') ?? ($signupData['shop_name'] ?? null),
                'retailer_name' => $request->input('retailer_name') ?? ($signupData['retailer_name'] ?? null),
                'address' => $request->input('address') ?? ($signupData['address'] ?? null),
                'phone' => $request->input('phone') ?? ($signupData['phone'] ?? null),
                'status' => 'active'
            ];

            $existingUser = User::where('email', $email)->first();

            /**
             * Existing User
             */
            if ($existingUser) {

                $shopkeeper = Shopkeeper::firstOrCreate(
                    ['user_id' => $existingUser->id],
                    $shopkeeperData
                );

                $existingUser->update(['is_approved' => true]);

                $shopkeeper->update([
                    'plan_name' => $planDetails['name'],
                    'plan_price' => $planDetails['price'],
                    'plan_expiry' => Carbon::now()->addDays($planDetails['days']),
                    'plan_status' => 'active'
                ]);

                DB::commit();

                session()->forget(['signup_data', 'selected_plan']);

                return redirect('/signup')
                    ->with('success', "Payment successful! Login with email {$email}");
            }

            /**
             * New User Registration
             */
            $registerData = array_merge($shopkeeperData, [
                'password' => $password
            ]);

            $user = $this->userService->registerUser($registerData);

            $user->update(['is_approved' => true]);

            $shopkeeper = Shopkeeper::firstOrCreate(
                ['user_id' => $user->id],
                $shopkeeperData
            );

            $shopkeeper->update([
                'plan_name' => $planDetails['name'],
                'plan_price' => $planDetails['price'],
                'plan_expiry' => Carbon::now()->addDays($planDetails['days']),
                'plan_status' => 'active'
            ]);

            DB::commit();

            session()->forget(['signup_data', 'selected_plan']);

            return redirect('/signup')
                ->with('success', "Payment successful! Login with email {$email} and password {$password}");

        } catch (\Exception $e) {

            DB::rollBack();

            \Log::error("Stripe registration failed: " . $e->getMessage());

            return back()->with('error', 'Payment succeeded but registration failed.');
        }
    }
}