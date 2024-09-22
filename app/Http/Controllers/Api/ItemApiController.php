<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Storage;

class ItemApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // first method to show category
        // $items = Item::with('category')->get();

        // second method
        $items = Item::with('category')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'stock' => $item->stock,
                'description' => $item->description,
                'status' => $item->status,
                'category_id' => $item->category->name,
            ];
        });

        return response()->json(["data" => $items, "message" => "data fetching successful"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $images = [];

        if ($request->item_images) {
            foreach ($request->file('item_images') as $file) {
                $newName = "item_image" . uniqid() . "." . $file->extension();
                $file->storeAs('public/item_images', $newName);
                $images[] = $newName;
            }
        }

        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->description = $request->description;
        $item->status = $request->status;
        $item->category_id = $request->category_id;
        $item->item_images = json_encode($images);

        $item->save();

        return response()->json(["message" => "Item is successfully created."]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::find($id);
        return response()->json([
            'item' => $item,
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



        $item = Item::find($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->description = $request->description;
        $item->status = $request->status;
        $item->category_id = $request->category_id;

        $images = [];

        if ($request->item_images) {
            foreach ($request->file('item_images') as $file) {
                $newNew = "item_image" . uniqid() . "." . $file->extension();
                $file->storeAs('public/item_images', $newNew);
                $images[] = $newNew;
            }

            $item->item_images = json_encode($images);
        }

        $item->update();

        return response()->json(["message" => "Item is updated successfully."]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);
        if ($item) {

            $images = json_decode($item->item_images);

            if ($images) {
                foreach ($images as $image) {
                    Storage::delete('public/item_images/' . $image);
                }
            }

            $item->delete();
        }

        return response()->json(["message" => "item is successfully deleted."]);
    }
}
