<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shopkeeper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopkeeperController extends Controller
{
    /**
     * Display the approval page
     */
    public function index()
    {
        return view('shopkeeper-approvals.index');
    }

    /**
     * Get all pending shopkeepers (is_approved = 0)
     */
    public function getPending()
    {
        try {
            // Fetch users of type 'shopkeeper' which are not yet approved
            $shopkeeperUsers = User::pendingShopkeepers()
                ->orderBy('created_at', 'desc')
                ->get();

            $data = $shopkeeperUsers->map(function ($shopkeeper) {
                // Try to pull additional profile data from shopkeepers table (if exists)
                $profile = Shopkeeper::where('user_id', $shopkeeper->id)->first();

                $createdTime = strtotime($shopkeeper->created_at);
                $now = time();
                $diff = $now - $createdTime;

                // Calculate time ago
                if ($diff < 60) {
                    $timeAgo = 'Just now';
                } elseif ($diff < 3600) {
                    $minutes = floor($diff / 60);
                    $timeAgo = $minutes . ' minute' . ($minutes > 1 ? 's' : '') . ' ago';
                } elseif ($diff < 86400) {
                    $hours = floor($diff / 3600);
                    $timeAgo = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
                } else {
                    $days = floor($diff / 86400);
                    $timeAgo = $days . ' day' . ($days > 1 ? 's' : '') . ' ago';
                }

                return [
                    'id' => $shopkeeper->id,
                    'name' => $shopkeeper->name,
                    'email' => $shopkeeper->email,
                    'shop_name' => $profile->shop_name ?? 'N/A',
                    'retailer_name' => $profile->retailer_name ?? 'N/A',
                    'address' => $profile->address ?? 'N/A',
                    // prefer profile phone if present, otherwise user's phone
                    'phone_number' => $profile->phone ?? $shopkeeper->phone ?? 'N/A',
                    'created_at' => date('F j, Y g:i A', $createdTime),
                    'time_ago' => $timeAgo,
                    'is_approved' => $shopkeeper->is_approved
                ];
            });

            return response()->json([
                'success' => true,
                'data' => $data
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Approve a shopkeeper (change is_approved from 0 to 1)
     */
    public function approve($id)
    {
        try {
            $shopkeeper = User::where('id', $id)
                ->where('type', 'shopkeeper')
                ->where('is_approved', 0)
                ->first();

            if (!$shopkeeper) {
                return response()->json([
                    'success' => false,
                    'message' => 'Shopkeeper not found or already approved'
                ], 404);
            }

            // Update is_approved to 1
            $shopkeeper->is_approved = 1;
            $shopkeeper->save();

            return response()->json([
                'success' => true,
                'message' => 'Shopkeeper approved successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error approving shopkeeper: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Decline a shopkeeper (delete all related data)
     */
    public function decline($id)
    {
        try {
            $shopkeeper = User::where('id', $id)
                ->where('type', 'shopkeeper')
                ->where('is_approved', 0)
                ->first();

            if (!$shopkeeper) {
                return response()->json([
                    'success' => false,
                    'message' => 'Shopkeeper not found or already processed'
                ], 404);
            }

            // Delete the shopkeeper
            $shopkeeper->delete();

            return response()->json([
                'success' => true,
                'message' => 'Shopkeeper declined and removed successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error declining shopkeeper: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get details of a specific shopkeeper
     */
    public function getDetails($id)
    {
        try {
            $shopkeeper = User::where('id', $id)
                ->where('type', 'shopkeeper')
                ->first();

            if (!$shopkeeper) {
                return response()->json([
                    'success' => false,
                    'message' => 'Shopkeeper not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $shopkeeper->id,
                    'name' => $shopkeeper->name,
                    'email' => $shopkeeper->email,
                    // Prefer shopkeeper profile data if available
                    'shop_name' => optional(Shopkeeper::where('user_id', $shopkeeper->id)->first())->shop_name ?? 'N/A',
                    'retailer_name' => optional(Shopkeeper::where('user_id', $shopkeeper->id)->first())->retailer_name ?? 'N/A',
                    'address' => optional(Shopkeeper::where('user_id', $shopkeeper->id)->first())->address ?? $shopkeeper->address ?? 'N/A',
                    'phone_number' => optional(Shopkeeper::where('user_id', $shopkeeper->id)->first())->phone ?? $shopkeeper->phone ?? 'N/A',
                    'created_at' => $shopkeeper->created_at->format('F j, Y g:i A'),
                    'is_approved' => $shopkeeper->is_approved
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching details: ' . $e->getMessage()
            ], 500);
        }
    }
}