<?php

namespace App\Http\Controllers\Api;

use App\Cv;
use App\Http\Controllers\Controller;
use App\Http\Resources\CvResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cv = CvResource::collection(Cv::all());
        return response()->json([
            'mesg' => 'All cvs',
            'data' => $cv,
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
            'file_path' => 'required',
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
        $cv = Cv::create($data);
        return response()->json([
            'mesg' => 'Created Succesufly',
            'data' => new CvResource($cv),
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
        $cv = Cv::findorfail($id);
        if (!$cv) {
            return response()->json([
                'mesg' => ' on such data',
                'data' => null,
            ]);
        }
        return response()->json([
            'mesg' => 'one cv',
            'data' => new CvResource($cv),
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
        $cv = Cv::find($id);
        if (!$cv) {
            return response()->json([
                'mesg' => ' on such data',
                'data' => null,
            ]);
        }

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'file_path' => 'required|file',
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
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $path = $file->store('cvs', 'public');
            $data['file_path'] = $path;
        } else {
            unset($data['file_path']);
        }
        $cv->update($data);
        return response()->json([
            'mesg' => 'Updated Succesufly',
            'data' => new CvResource($cv),
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
        $cv = Cv::findorfail($id);
        if (!$cv) {
            return response()->json([
                'mesg' => ' on such data',
                'data' => null,
            ]);
        } else {
            $cv->delete();
            return response()->json([
                'mesg' => 'Deleted Successfuly',
                'data' => null,
            ]);
        }
    }
}
