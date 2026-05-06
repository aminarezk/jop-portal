<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return response()->json([
            'mesg' => 'All categories',
            'data' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_ar' => 'required',
            'name_en' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'mesg' => 'invalid',
                    'data' => $validator->errors(),
                ]
            );
        }

        $data = $validator->validate();
        $category = Category::create($data);
        return response()->json([
            'mesg' => 'Created Succesufly',
            'data' => $category,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findorfail($id);
        if (!$category) {
            return response()->json([
                'mesg' => ' on such data',
                'data' => null,
            ]);
        }
        return response()->json([
            'mesg' => 'one category',
            'data' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findorfail($id);
        if (!$category) {
            return response()->json([
                'mesg' => ' on such data',
                'data' => null,
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name_ar' => 'required',
            'name_en' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'mesg' => 'invalid',
                    'data' => $validator->errors(),
                ]
            );
        }

        $data = $validator->validate();
        $category->update($data);
        return response()->json([
            'mesg' => 'Updated Succesufly',
            'data' => $category,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findorfail($id);
        if (!$category) {
            return response()->json([
                'mesg' => ' on such data',
                'data' => null,
            ]);
        } else {
            $category->delete();
            return response()->json([
                'mesg' => 'Deleted Successfuly',
                'data' => null,
            ]);
        }
    }
}
