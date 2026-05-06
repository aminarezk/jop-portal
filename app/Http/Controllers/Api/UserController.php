<?php

namespace App\Http\Controllers\Api;

use App\Application;
use App\Category;
use App\Cv;
use App\Http\Controllers\Controller;
use App\Position;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->role != 'admin') {
            return response()->json([
                'mesg' => 'unauthozried',
                'status' => '403',
            ]);
        }

        return response()->json([
            'users' => User::all(),
            'categories' => Category::all(),
            'positions' => Position::all(),
            'applications' => Application::all(),
            'Cvs' => Cv::all(),
        ]);
    }

    public function profile(Request $request)
    {
        return response()->json([
            'users' => $request->user(),
            'positions' => Position::where('user_id', $request->user()->id)->get(),
            'applications' => Application::where('user_id', $request->user()->id)->get(),
            'Cvs' => Cv::where('user_id', $request->user()->id)->get(),
        ]);
    }
}
