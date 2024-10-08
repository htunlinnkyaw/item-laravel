<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        View::share('fruit', 'Apple');
    }

    public function index()
    {
        // View::share('fruit', 'Orange');

        // $timeZone = config('app.timezone');
        // dd($timeZone);

        $appName = config('app.appName');
        // dd($appName);

        $categories = Category::paginate(3);
        return view('category.index', compact('categories', 'appName'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // View::share('fruit', 'Orange');
        return view("category.create", );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

        // $request->validate([
        //     "name" => "required|string",
        //     "description" => 'required|string',
        // ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->route("category.index")->with('create', 'Category is Successfully Created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view("category.detail", compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // View::share('fruit', 'Orange');
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->description = $request->description;
        $category->update();
        return redirect()->route('category.index')->with('update', 'Category is Successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category) {
            $category->delete();
        }
        return redirect()->route('category.index')->with('delete', 'Category is Successfully Removed.');
    }
}
