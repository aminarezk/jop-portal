<?php

namespace App\Http\Controllers;

use App\Category;
use App\Position;
use App\User;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('positions');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $category = Category::all();
        return view('positions.create', ['user' => $user, 'category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
            'status' => 'required',
        ]);
        Position::create($validatedData);
        return redirect()->route('home')->with('mesg_pos', __('language.Created successfuly'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        $user = User::all();
        $category = Category::all();
        return view('positions.show', ['position' => $position, 'user' => $user, 'category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        $user = User::all();
        $category = Category::all();
        return view('positions.edit', ['position' => $position, 'user' => $user, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        $validatedData = $request->validate([

            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
            'status' => 'required',
        ]);
        $position->update($validatedData);
        return redirect()->route('home')->with('mesg_pos', __('language.Updated Successfuly'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('home')->with('mesg_pos', __('language.Deleted Successfuly'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $position = Position::where('title_en', 'like', "%$search%")
            ->orWhere('title_ar', 'like', "%$search%")
            ->get();
        return view('jobs', compact('position', 'search'));
    }
}
