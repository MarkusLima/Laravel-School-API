<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\ClassRoom;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ClassRoom::listAll();
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
        $response = ClassRoom::toCreate($request->all());

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
        $response = ClassRoom::findById($id);

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
        $response = ClassRoom::up($request->all(), $id);

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
        $response = ClassRoom::del($id);

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
    public function search($name)
    {
        $response = ClassRoom::findByName($name);

        if ($response['success'] == 'true') {
            return response()->json($response, 200);
        } else {
            return response()->json($response);
        }
    }

    public function change_school($school_id){
        $response = ClassRoom::findByIdSchoolClass($school_id);

        if ($response['success'] == 'true') {
            return response()->json($response, 200);
        } else {
            return response()->json($response);
        }
    }


}
