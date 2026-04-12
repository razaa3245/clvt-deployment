<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class LensController extends Controller
{
    /**
     * Display all lenses (for public catalog)
     */
    public function index(Request $request)
    {
        $query = Lens::query();

        if ($request->has('type') && $request->type !== 'All') {
            $query->where('type', $request->type);
        }

        if ($request->has('color') && $request->color !== 'All') {
            $query->where('color', $request->color);
        }

        if ($request->has('brand') && $request->brand !== 'All') {
            $query->where('brand', $request->brand);
        }

        $lenses = $query->orderBy('created_at', 'desc')->get();

        return view('lenses.index', compact('lenses'));
    }

    /**
     * Admin: Display all lenses in the master catalog
     */
    public function adminIndex()
    {
        $lenses = Lens::orderBy('created_at', 'desc')->get();
        $totalLenses = Lens::count();

        return view('admin.lenses.index', compact('lenses', 'totalLenses'));
    }

    /**
     * Admin: Show create form
     */
    public function create()
    {
        return view('admin.lenses.create');
    }

    /**
     * Admin: Store a new lens
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'brand'       => 'nullable|string|max:255',
            'color'       => 'nullable|string|max:255',
            'type'        => 'required|in:daily,monthly,yearly',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $data = [
            'name'        => $request->name,
            'brand'       => $request->brand,
            'color'       => $request->color,
            'type'        => $request->type,
            'description' => $request->description,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ];

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('lenses', 'public');
            $data['image'] = $imagePath;
        }

        $lens = Lens::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Lens added successfully',
            'data'    => $lens
        ], 201);
    }

    /**
     * Admin: Show edit form
     */
    public function edit($id)
    {
        $lens = Lens::findOrFail($id);
        return view('admin.lenses.edit', compact('lens'));
    }

    /**
     * Admin: Update existing lens
     */
    public function update(Request $request, $id)
    {
        $lens = Lens::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'brand'       => 'nullable|string|max:255',
            'color'       => 'nullable|string|max:255',
            'type'        => 'required|in:daily,monthly,yearly',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $data = [
            'name'        => $request->name,
            'brand'       => $request->brand,
            'color'       => $request->color,
            'type'        => $request->type,
            'description' => $request->description,
            'updated_at'  => Carbon::now(),
        ];

        // Replace image if new one provided
        if ($request->hasFile('image')) {
            if ($lens->image) {
                Storage::disk('public')->delete($lens->image);
            }
            $imagePath = $request->file('image')->store('lenses', 'public');
            $data['image'] = $imagePath;
        }

        $lens->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Lens updated successfully',
            'data'    => $lens
        ], 200);
    }

    /**
     * Admin: Delete a lens
     */
    public function destroy($id)
    {
        $lens = Lens::findOrFail($id);

        if ($lens->image) {
            Storage::disk('public')->delete($lens->image);
        }

        $lens->delete();

        return response()->json([
            'success' => true,
            'message' => 'Lens deleted successfully'
        ], 200);
    }

    /**
     * API: Get all lenses (JSON)
     */
    public function apiIndex(Request $request)
    {
        $query = Lens::query();

        if ($request->has('type') && $request->type !== 'All') {
            $query->where('type', $request->type);
        }

        if ($request->has('color') && $request->color !== 'All') {
            $query->where('color', $request->color);
        }

        if ($request->has('brand') && $request->brand !== 'All') {
            $query->where('brand', $request->brand);
        }

        $lenses = $query->orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data'    => $lenses
        ], 200);
    }

    /**
     * API: Get single lens (JSON)
     */
    public function apiShow($id)
    {
        $lens = Lens::find($id);

        if (!$lens) {
            return response()->json([
                'success' => false,
                'message' => 'Lens not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $lens
        ], 200);
    }
}
