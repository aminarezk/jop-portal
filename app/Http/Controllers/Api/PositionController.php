<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PositionResource;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $position = PositionResource::collection(Position::all());
        return response()->json([
            'mesg' => 'All positions',
            'data' => $position,
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
        if ($validator->fails()) {
            return response()->json(
                [
                    'mesg' => 'validation error',
                    'data' => $validator->errors(),
                ]
            );
        }

        $data = $validator->validate();
        $position = Position::create($data);
        return response()->json([
            'mesg' => 'Created Succesufly',
            'data' => new PositionResource($position),
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
        $position = Position::findorfail($id);
        if (!$position) {
            return response()->json([
                'mesg' => ' on such data',
                'data' => null,
            ]);
        }
        return response()->json([
            'mesg' => 'one position',
            'data' => new PositionResource($position),
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
        $position = Position::findorfail($id);
        if (!$position) {
            return response()->json([
                'mesg' => ' on such data',
                'data' => null,
            ]);
        }

        $validator = Validator::make($request->all(), [
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
        if ($validator->fails()) {
            return response()->json(
                [
                    'mesg' => 'invalid',
                    'data' => $validator->errors(),
                ]
            );
        }

        $data = $validator->validate();
        $position->update($data);
        return response()->json([
            'mesg' => 'Updated Succesufly',
            'data' => new PositionResource($position),
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
        $position = Position::findorfail($id);
        if (!$position) {
            return response()->json([
                'mesg' => ' on such data',
                'data' => null,
            ]);
        } else {
            $position->delete();
            return response()->json([
                'mesg' => 'Deleted Successfuly',
                'data' => null,
            ]);
        }
    }
}
