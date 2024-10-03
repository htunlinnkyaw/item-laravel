<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function search(Request $request)
    {
        if ($request->name) {
            $category = Category::where('name', 'LIKE', "%{$request->name}%")->get();

            return response()->json([
                'category' => $category,
                'message' => 'success'
            ]);
        }

        return response()->json([
            'message' => 'Not Found Searching Data'
        ]);
    }

    public function index()
    {
        // $categories = Category::all();
        // $categories = Category::all()->makeHidden(['created_at', 'updated_at']);
        $categories = Category::select('id', 'name', 'description')->get();

        if ($categories->isEmpty()) {
            return apiResponse(null, 'Categories not found ', 404);
        }

        return apiResponse($categories, 'success', 200);



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return response()->json(["message" => "category is successfully stored."]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return response()->json([
            'category' => $category,
            'message' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->update();

        return response()->json(["message" => "category is updated successfully."]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = category::find($id);
        if ($category) {
            $category->delete();
        }

        return response()->json(["message" => "category is successfully deleted."]);
    }
}
