<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shopkeeper;
use App\Models\TryonLog;        // create this model if it doesn't exist yet
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ShopkeeperController extends Controller
{
    // ══════════════════════════════════════════════════════════════
    // DASHBOARD PAGE (web route - just returns the blade view)
    // ══════════════════════════════════════════════════════════════
    public function dashboard()
    {
        return view('shopkeeper.shopkeeper');
    }

    // ══════════════════════════════════════════════════════════════
    // DASHBOARD API  →  GET /api/shopkeeper/dashboard
    // Returns: stats, subscription info, QR code, shop details
    // ══════════════════════════════════════════════════════════════
    public function getDashboard(Request $request)
    {
        try {
            $user = $request->user();   // Sanctum / Passport token auth

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthenticated'
                ], 401);
            }

            // ── Shop Profile ──────────────────────────────────────
            $shop = Shopkeeper::where('user_id', $user->id)->first();


            // -- Subscription / Plan info --
            // Plan columns live directly on the shopkeepers table:
            // plan_name, plan_price, plan_expiry, plan_status
            $planName        = 'No Plan';
            $planPrice       = null;
            $expiryFormatted = null;
            $daysLeft        = 0;

            if ($shop) {
                $planName  = $shop->plan_name   ?? 'No Plan';
                $planPrice = $shop->plan_price  ?? null;
                $planStatus= $shop->plan_status ?? 'none';

                if (!empty($shop->plan_expiry)) {
                    $expiry          = \Carbon\Carbon::parse($shop->plan_expiry);
                    $daysLeft        = max(0, (int) \Carbon\Carbon::now()->diffInDays($expiry, false));
                    $expiryFormatted = $expiry->format('M j, Y');

                    // Auto-expire if date has passed
                    if ($daysLeft === 0 && $planStatus === 'active') {
                        $shop->plan_status = 'expired';
                        $shop->save();
                        $planStatus = 'expired';
                    }
                }
            }


            // ── Try-On Stats ──────────────────────────────────────
            $totalTryons    = 0;
            $changePct      = null;

            if (\Schema::hasTable('tryon_logs')) {
                $totalTryons = DB::table('tryon_logs')
                    ->where('shopkeeper_id', $user->id)
                    ->count();

                // Month-on-month comparison
                $thisMonth = DB::table('tryon_logs')
                    ->where('shopkeeper_id', $user->id)
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year)
                    ->count();

                $lastMonth = DB::table('tryon_logs')
                    ->where('shopkeeper_id', $user->id)
                    ->whereMonth('created_at', Carbon::now()->subMonth()->month)
                    ->whereYear('created_at', Carbon::now()->subMonth()->year)
                    ->count();

                if ($lastMonth > 0) {
                    $changePct = round((($thisMonth - $lastMonth) / $lastMonth) * 100, 1);
                } elseif ($thisMonth > 0) {
                    $changePct = 100;
                }
            }

            // ── QR Code ───────────────────────────────────────────
            // catalog_url = the public link customers scan to try lenses
            $catalogUrl = url('/shopkeeper/catalog1');
            $qrImage    = $shop ? ($shop->qr_image ?? null) : null;

            // ── Response ──────────────────────────────────────────
            return response()->json([
                'success' => true,
                'data'    => [
                    'stats' => [
                        'total_tryons'       => $totalTryons,
                        'tryon_change_pct'   => $changePct,
                        'subscription_plan'  => $planName,
                        'plan_status'        => $planStatus ?? 'none',
                        'days_remaining'     => $daysLeft,
                        'plan_price'         => $planPrice ? 'Rs.' . number_format($planPrice) . '/month' : null,
                        'plan_expiry'        => $expiryFormatted,
                    ],
                    'shop' => $shop ? [
                        'id'            => $shop->id,
                        'shop_name'     => $shop->shop_name,
                        'retailer_name' => $shop->retailer_name,
                        'phone'         => $shop->phone,
                        'address'       => $shop->address,
                        'city'          => $shop->city,
                    ] : null,
                    'qr_code' => [
                        'qr_image'    => $qrImage,
                        'catalog_url' => $catalogUrl,
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error loading dashboard: ' . $e->getMessage()
            ], 500);
        }
    }


    // ══════════════════════════════════════════════════════════════
    // UPDATE SHOP DETAILS  →  POST /api/shopkeeper/update-shop
    // ══════════════════════════════════════════════════════════════
    public function updateShop(Request $request)
    {
        try {
            $user = $request->user();

            if (!$user) {
                return response()->json(['success' => false, 'message' => 'Unauthenticated'], 401);
            }

            $validated = $request->validate([
                'shop_name'     => 'required|string|max:255',
                'retailer_name' => 'nullable|string|max:255',
                'phone'         => 'nullable|string|max:20',
                'address'       => 'nullable|string|max:500',
                'city'          => 'nullable|string|max:100',
            ]);

            // Update or create shopkeeper profile
            $shop = Shopkeeper::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'name'          => $user->name,
                    'email'         => $user->email,
                    'shop_name'     => $validated['shop_name'],
                    'retailer_name' => $validated['retailer_name'] ?? '',
                    'phone'         => $validated['phone']         ?? null,
                    'address'       => $validated['address']       ?? null,
                    'city'          => $validated['city']          ?? null,
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'Shop details updated successfully',
                'data'    => [
                    'shop_name'     => $shop->shop_name,
                    'retailer_name' => $shop->retailer_name,
                    'phone'         => $shop->phone,
                    'address'       => $shop->address,
                    'city'          => $shop->city,
                ]
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors'  => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating shop: ' . $e->getMessage()
            ], 500);
        }
    }


    // ══════════════════════════════════════════════════════════════
    // CATALOG VIEW (web route)
    // ══════════════════════════════════════════════════════════════
    public function showCatalog()
    {
        return view('web.content.catalog1');
    }


    // ══════════════════════════════════════════════════════════════
    // APPROVAL MANAGEMENT (existing methods, unchanged)
    // ══════════════════════════════════════════════════════════════

    public function index()
    {
        return view('web.content.messages');
    }

    public function getPending()
    {
        try {
            $shopkeeperUsers = User::pendingShopkeepers()
                ->orderBy('created_at', 'desc')
                ->get();

            $data = $shopkeeperUsers->map(function ($shopkeeper) {
                $profile     = Shopkeeper::where('user_id', $shopkeeper->id)->first();
                $createdTime = strtotime($shopkeeper->created_at);
                $now         = time();
                $diff        = $now - $createdTime;

                if ($diff < 60)         { $timeAgo = 'Just now'; }
                elseif ($diff < 3600)   { $m = floor($diff / 60);    $timeAgo = $m . ' minute' . ($m > 1 ? 's' : '') . ' ago'; }
                elseif ($diff < 86400)  { $h = floor($diff / 3600);  $timeAgo = $h . ' hour'   . ($h > 1 ? 's' : '') . ' ago'; }
                else                    { $d = floor($diff / 86400); $timeAgo = $d . ' day'    . ($d > 1 ? 's' : '') . ' ago'; }

                return [
                    'id'           => $shopkeeper->id,
                    'name'         => $shopkeeper->name,
                    'email'        => $shopkeeper->email,
                    'shop_name'    => $profile->shop_name    ?? 'N/A',
                    'retailer_name'=> $profile->retailer_name ?? 'N/A',
                    'address'      => $profile->address      ?? 'N/A',
                    'phone_number' => $profile->phone        ?? $shopkeeper->phone ?? 'N/A',
                    'created_at'   => date('F j, Y g:i A', $createdTime),
                    'time_ago'     => $timeAgo,
                    'is_approved'  => $shopkeeper->is_approved,
                ];
            });

            return response()->json(['success' => true, 'data' => $data]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function approve($id)
    {
        try {
            $shopkeeper = User::where('id', $id)->where('type', 'shopkeeper')->where('is_approved', 0)->first();
            if (!$shopkeeper) {
                return response()->json(['success' => false, 'message' => 'Not found or already approved'], 404);
            }
            $shopkeeper->is_approved = 1;
            $shopkeeper->save();
            return response()->json(['success' => true, 'message' => 'Shopkeeper approved']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function decline($id)
    {
        try {
            $shopkeeper = User::where('id', $id)->where('type', 'shopkeeper')->where('is_approved', 0)->first();
            if (!$shopkeeper) {
                return response()->json(['success' => false, 'message' => 'Not found'], 404);
            }
            $shopkeeper->delete();
            return response()->json(['success' => true, 'message' => 'Shopkeeper declined and removed']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function getDetails($id)
{
    try {
        // Find shopkeeper using user_id (IMPORTANT FIX)
        $shopkeeper = Shopkeeper::where('user_id', $id)->first();

        if (!$shopkeeper) {
            return response()->json([
                'success' => false,
                'message' => 'Not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => [
                'id'            => $shopkeeper->id,
                'name'          => $shopkeeper->name,
                'email'         => $shopkeeper->email,
                'shop_name'     => $shopkeeper->shop_name ?? 'N/A',
                'retailer_name' => $shopkeeper->retailer_name ?? 'N/A',
                'address'       => $shopkeeper->address ?? 'N/A',
                'phone_number'  => $shopkeeper->phone ?? 'N/A',
                'created_at'    => $shopkeeper->created_at->format('F j, Y g:i A'),
                'plan_name'     => $shopkeeper->plan_name ?? 'N/A',
                'plan_status'   => $shopkeeper->plan_status ?? 'N/A',
            ]
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}
    // GET ALL SHOPKEEPERS (approved + pending)
public function getAllShopkeepers()
{
    try {
        $users = User::where('type', 'shopkeeper')
            ->orderBy('created_at', 'desc')
            ->get();

        $data = $users->map(function ($user) {
            $profile = Shopkeeper::where('user_id', $user->id)->first();

            return [
                'id'            => $user->id,
                'name'          => $user->name,
                'email'         => $user->email,
                'shop_name'     => $profile->shop_name ?? 'N/A',
                'retailer_name' => $profile->retailer_name ?? 'N/A',
                'phone_number'  => $profile->phone ?? 'N/A',
                'address'       => $profile->address ?? 'N/A',
                'created_at'    => $user->created_at->format('F j, Y g:i A'),
                'is_approved'   => $user->is_approved,
                'is_active'     => $user->is_active,
            ];
        });

        return response()->json(['success' => true, 'data' => $data]);

    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}
public function toggleStatus($id)
{
    try {
        $user = User::where('id', $id)
            ->where('type', 'shopkeeper')
            ->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Shopkeeper not found'
            ], 404);
        }

        // Toggle user active status
        $user->is_active = !$user->is_active;
        $user->save();

        // 🔥 UPDATE SHOPKEEPER PLAN STATUS
        $shopkeeper = Shopkeeper::where('user_id', $user->id)->first();

      if ($shopkeeper) {

    if ($user->is_active == 0) {
        $shopkeeper->plan_status = 'expired'; // ✅ FIXED
    } else {
        $shopkeeper->plan_status = 'active';
    }

    $shopkeeper->save();
}

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully',
            'is_active' => $user->is_active,
            'plan_status' => $shopkeeper->plan_status ?? null
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}
}