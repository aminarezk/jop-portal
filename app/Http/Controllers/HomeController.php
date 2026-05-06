<?php

namespace App\Http\Controllers;

use App\Application;
use App\Category;
use App\Position;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        $category = Category::all();
        $position = Position::all();
        $application = Application::all();
        return view('home', [
            'result' => $user,
            'category' => $category,
            'position' => $position,
            'application' => $application,
        ]);
    }
}
