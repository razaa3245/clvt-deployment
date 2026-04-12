<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shopkeeper;
use App\Models\Lens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Admin Dashboard API  →  GET /api/admin/dashboard
     * Returns: stats (total shops, active users, lens count) + recent shops list
     */
    public function dashboard(Request $request)
    {
        try {
            $user = $request->user();

            if (!$user) {
                return response()->json(['success' => false, 'message' => 'Unauthenticated'], 401);
            }

            // ── Stats ─────────────────────────────────────────────
            $totalShops  = Shopkeeper::count();
            $totalLenses = Lens::count();

            // Active users = all users who are shopkeepers and approved
            $activeUsers = 0;
            if (\Schema::hasColumn('users', 'is_approved')) {
                $activeUsers = User::where('type', 'shopkeeper')
                    ->where('is_approved', 1)
                    ->count();
            } else {
                $activeUsers = User::where('type', 'shopkeeper')->count();
            }

            // ── Recent Shops ──────────────────────────────────────
            $recentShops = Shopkeeper::orderBy('created_at', 'desc')
                ->limit(10)
                ->get()
                ->map(function ($shop) {
                    // Get linked user for email
                    $user = User::find($shop->user_id);
                    return [
                        'id'     => $shop->id,
                        'name'   => $shop->shop_name ?? $shop->name ?? 'Unknown Shop',
                        'email'  => $user->email ?? $shop->email ?? 'N/A',
                        'status' => 'Active',
                    ];
                });

            return response()->json([
                'success' => true,
                'data'    => [
                    'stats' => [
                        'total_shops'  => $totalShops,
                        'active_users' => $activeUsers,
                        'lens_catalog' => $totalLenses,
                    ],
                    'recent_shops' => $recentShops,
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error loading admin dashboard: ' . $e->getMessage()
            ], 500);
        }
    }
}