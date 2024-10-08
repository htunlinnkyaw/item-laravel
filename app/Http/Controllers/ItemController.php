<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function search(Request $request)
    {
        $query = $request->input('query');
        $items = Item::where('name', 'LIKE', "%{$query}%")->orWhere('status', 'LIKE', "%{$query}%")->paginate(5);

        return view('item.index', compact('items'));
    }


    public function index()
    {
        $items = Item::all();

        $appNome = config('app.appName');

        foreach ($items as $item) {
            $item->item_images = json_decode($item->item_images, true);
        }

        return view('item.index', compact('items', 'appNome'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("item.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:10|min:5|unique:items,name',
            'price' => 'required|integer|max:10000|min:100',
            'stock' => 'required|integer|max:100|min:10',
            'description' => 'required|string|max:200|min:10',
            'category_id' => 'required|integer|max:3|min:1',

        ]);

        // signle file upload
        // if ($request->image) {
        //     $file = $request->image;
        //     $newName = "item_image" . uniqid() . "." . $file->extension();
        //     $file->storeAs('public/item_images', $newName);
        // }

        $images = [];

        if ($request->images) {
            foreach ($request->file('images') as $file) {
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

        return redirect()->route("item.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $items = Item::find($id);

        $items->item_images = json_decode($items->item_images, true);

        return view("item.detail", compact("items"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $item = Item::find($id);
        $item->item_images = json_decode($item->item_images, true);
        return view("item.edit", compact("item", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $request->validate([
            'name' => 'required|string|max:10|min:5',
            'price' => 'required|integer|max:1000|min:100',
            'stock' => 'required|integer|max:100|min:10',
            'description' => 'required|string|max:200|min:10',
            'category_id' => 'required|integer|max:3|min:1',

        ]);

        $item = Item::find($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->description = $request->description;
        $item->status = $request->status;
        $item->category_id = $request->category_id;

        // if ($request->image) {
        //     $file = $request->image;
        //     $newName = "item_image" . uniqid() . "." . $file->extension();
        //     $file->storeAs('public/item_images', $newName);
        //     $item->image = $newName;
        // }

        $images = [];

        if ($request->images) {
            foreach ($request->file('images') as $file) {
                $newName = "item_image" . uniqid() . "." . $file->extension();
                $file->storeAs('public/item_images', $newName);
                $images[] = $newName;
            }


            $item->item_images = json_encode($images);
        }

        $item->update();




        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // return $id;
        $item = Item::find($id);
        if ($item) {
            $item->delete();
            return back();
        }
    }
}
