<?php

namespace App\Http\Controllers\Api;

use App\Application;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aps = ApplicationResource::collection(Application::all());
        return response()->json([
            'mesg' => 'All Applications',
            'data' => $aps,
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
            'user_id' => 'required',
            'position_id' => 'required',
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
        $aps = Application::create($data);
        return response()->json([
            'mesg' => 'Created Succesufly',
            'data' => new ApplicationResource($aps),
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
        $aps = Application::findorfail($id);
        if (!$aps) {
            return response()->json([
                'mesg' => ' on such data',
                'data' => null,
            ]);
        }
        return response()->json([
            'mesg' => 'one cv',
            'data' => new ApplicationResource($aps),
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
        $aps = Application::find($id);
        if (!$aps) {
            return response()->json([
                'mesg' => ' on such data',
                'data' => null,
            ]);
        }

        $validator = Validator::make($request->all(), [
            'position_id' => 'required',
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
        $data['user_id'] = auth()->id();
        $aps->update($data);
        return response()->json([
            'mesg' => 'Updated Succesufly',
            'data' => new ApplicationResource($aps),
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
        $aps = Application::findorfail($id);
        if (!$aps) {
            return response()->json([
                'mesg' => ' on such data',
                'data' => null,
            ]);
        } else {
            $aps->delete();
            return response()->json([
                'mesg' => 'Deleted Successfuly',
                'data' => null,
            ]);
        }
    }
}
