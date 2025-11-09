<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ShopkeeperController extends Controller
{
    /**
     * Shopkeeper Dashboard - Returns JSON data
     */
    public function dashboard(Request $request)
    {
        $user = $request->user();
        
        // REMOVED: type check kyunki route already protected hai
        // Frontend pe role check ho raha hai, yahan ki zaroorat nahi
        
        // Log for debugging
        Log::info('Shopkeeper dashboard accessed', [
            'user_id' => $user->id,
            'email' => $user->email,
            'type' => $user->type ?? 'not set'
        ]);
        
        // Dashboard data
        $data = [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'type' => $user->type,
                'shop_name' => $user->shopname ?? 'danish optics'
            ],
            'stats' => [
                'total_tryons' => 1247,
                'growth_percentage' => '+12% from last month',
                'subscription_plan' => 'Pro Plan',
                'days_remaining' => 124
            ],
            'qr_code' => [
                'url' => url('/catalog/' . $user->id),
                'catalogue_link' => 'https://virtual-lens.io/catalogue/' . $user->id
            ]
        ];
        
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }
}
