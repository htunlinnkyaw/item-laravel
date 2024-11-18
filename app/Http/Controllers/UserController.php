<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = User::find(1);

        // return $user->posts()->get();



        // this is the query builder way

        // $user = DB::table('users')->pluck('name', 'email');

        // $user = DB::table('users')->select('id', 'name', 'email')->get();
        // $user = DB::table('users')->get();
        // $user = DB::table('users')->where('id', '>', 10)->get();
        // $user = DB::table('users')
        //     ->where('id', '>', 10)
        //     ->orderBy('name', 'desc')->get();
        // return $user;

        // $collection = collect([1, 2, 3, 4, 5, 6]);
        // $result = $collection->filter(function ($item) {
        //     return $item > 2;
        // });
        // return $result;

        // $users = User::all();
        // $filterActiveUser = $users->filter(function ($user) {
        //     return $user->status == 'active';
        // });
        // return $filterActiveUser;

        // $user = User::all();
        // $nameToUpperCase = $user->map(function ($user) {
        //     return strtoupper($user->name);
        // });
        // return $nameToUpperCase;

        // $users = User::all()->pluck('email');
        // return $users;

        // $users = User::all();
        // $sortedUsers = $users->sortBy('name');
        // return $sortedUsers;
        // print_r($sortedUsers->values()->all());

        // $users = User::all();
        // $hasEmail = $users->pluck('email')->contains('asf@example.com');
        // return $hasEmail ? 'Email is present' : 'Email is not present';

        // $users = User::where('status', 'active')->get()->last(); // first,count methods exist
        // return $users;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::all();
        return view("user.create", compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        // $user = new User();
        // $user->name = $request->name;
        // $user->save();

        // $user->posts()->attach($request->post_ids);
        // return redirect()->back();

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => 'admin@example.com',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
