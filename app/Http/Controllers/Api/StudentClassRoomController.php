<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\ClassRoom;
use App\model\StudentClassRoom;

class StudentClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            'success' => 'true',
            'entity'=> StudentClassRoom::listAll(),
            'msg' => 'success!'
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = StudentClassRoom::toCreate($request->all());

        if ($response['success'] == 'true') {
            return response()->json($response, 200);
        } else {
            return response()->json($response);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = StudentClassRoom::findById($id);

        if ($response['success'] == 'true') {
            return response()->json($response, 200);
        } else {
            return response()->json($response);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $response = StudentClassRoom::up($request->all(), $id);

        if ($response['success'] == 'true') {
            return response()->json($response, 200);
        } else {
            return response()->json($response);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = StudentClassRoom::del($id);

        if ($response['success'] == 'true') {
            return response()->json($response, 200);
        } else {
            return response()->json($response);
        }
    }

}
