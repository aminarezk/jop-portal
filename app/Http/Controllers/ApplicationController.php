<?php

namespace App\Http\Controllers;

use App\Application;
use App\Cv;
use App\Position;
use App\User;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('aps');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $position = Position::all();
        return view('aps.create', ['user' => $user, 'position' => $position]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('cv')) {
            $validatedData = $request->validate([
                'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            ]);
            $file = $request->cv;
            $filename = time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('cvs'), $filename);
            $cv = Cv::create([
                'file_path' => $filename,
                'user_id' => auth()->id(),
            ]);
        }

        $validatedData = $request->validate([

            'user_id' => 'required',
            'position_id' => 'required',
            'status' => 'required',
        ]);
        Application::create($validatedData);
        return redirect()->route('home')->with('mesg_aps', 'Creates successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        $user = User::all();
        $position = Position::all();
        return view('aps.show',  ['application' => $application, 'user' => $user, 'position' => $position]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {

        $user = User::all();
        $position = Position::all();
        return view('aps.edit',  ['application' => $application, 'user' => $user, 'position' => $position]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'position_id' => 'required',
            'status' => 'required',
        ]);
        $application->update($validatedData);
        return redirect()->route('home')->with('mesg_aps', __('language.Updated Successfuly'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('home')->with('mesg_aps', __('language.Deleted Successfuly'));
    }
}
