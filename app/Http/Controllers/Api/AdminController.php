<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Admin Dashboard - Returns JSON data
     */
    public function dashboard(Request $request)
    {
        $user = $request->user();
        
        // Check if user is admin
        if ($user->type !== 'admin') {
            return response()->json([
                'message' => 'Unauthorized access'
            ], 403);
        }
        
        // Fetch real data from database
        $totalShops = User::where('type', 'shopkeeper')->count();
        $activeUsers = User::where('is_approved', true)->count();
        
        // Get recent shops
        $recentShops = User::where('type', 'shopkeeper')
            ->where('is_approved', true)
            ->latest()
            ->take(3)
            ->get()
            ->map(function($shop) {
                return [
                    'id' => $shop->id,
                    'name' => $shop->name,
                    'email' => $shop->email,
                    'plan' => 'Pro Plan', // You can add this field to users table
                    'status' => 'Active'
                ];
            });
        
        // Dashboard data
        $data = [
            'user' => [
                'name' => $user->name,
                'email' => $user->email
            ],
            'stats' => [
                'total_shops' => $totalShops,
                'active_users' => $activeUsers,
                'lens_catalog' => 156, // From lenses table
                'monthly_revenue' => 45200
            ],
            'recent_shops' => $recentShops,
            'lenses' => [
                ['name' => 'Natural Brown', 'category' => 'Natural', 'color' => '#D2691E'],
                ['name' => 'Ocean Blue', 'category' => 'Vibrant', 'color' => '#1E90FF']
            ]
        ];
        
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }
    
    /**
     * Get all shops
     */
    public function getShops(Request $request)
    {
        $shops = User::where('type', 'shopkeeper')->get();
        
        return response()->json([
            'success' => true,
            'shops' => $shops
        ], 200);
    }
    
    /**
     * Approve shopkeeper
     */
    public function approveShopkeeper(Request $request, $id)
    {
        $user = User::find($id);
        
        if (!$user || $user->type !== 'shopkeeper') {
            return response()->json(['message' => 'Shopkeeper not found'], 404);
        }
        
        $user->is_approved = true;
        $user->save();
        
        return response()->json([
            'message' => 'Shopkeeper approved successfully',
            'user' => $user
        ], 200);
    }
}
