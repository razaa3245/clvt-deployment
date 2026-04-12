<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Shopkeeper;

class ShopkeeperController extends Controller
{
    /**
     * Shopkeeper Dashboard - Returns JSON data
     */
    public function dashboard(Request $request)
    {
        $user = $request->user();
        $shopkeeper = Shopkeeper::where('user_id',$user->id)->first();
        $qr_code = $shopkeeper
            ? QrCode::where('shop_id', $shopkeeper->id)->first()
            : null;

        // REMOVED: type check kyunki route already protected hai
        // Frontend pe role check ho raha hai, yahan ki zaroorat nahi

        // Log for debugging
        Log::info('Shopkeeper dashboard accessed', [
            'user_id' => $user->id,
            'email' => $user->email,
            'type' => $user->type ?? 'not set'
        ]);

        // Dashboard data
        $subscriptionPlan = $shopkeeper ? ucfirst($shopkeeper->plan_name ?? 'No Plan') : 'No Plan';
        $daysRemaining = $shopkeeper && $shopkeeper->plan_expiry
            ? now()->diffInDays($shopkeeper->plan_expiry, false)
            : 0;

        $data = [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'type' => $user->type,
                'shop_name' => $shopkeeper->shop_name ?? $user->name ?? 'Shop'
            ],
            'stats' => [
                'total_tryons' => 1247, // This should be calculated from actual data
                'growth_percentage' => '+12% from last month', // This should be calculated
                'subscription_plan' => $subscriptionPlan,
                'days_remaining' => max(0, $daysRemaining)
            ],
            'qr_code' => $qr_code,

            'links' => [
                'catalog' => url('/shopkeeper/catalog'),
            ],
        ];

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }
    public function showCatalog()
    {
        // You can pass dynamic data here later if needed
        return view('web.content.catalog');
    }

}
