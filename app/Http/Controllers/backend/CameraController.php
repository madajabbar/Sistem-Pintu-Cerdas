<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Access;
use App\Models\Camera;
use App\Models\Room;
use Illuminate\Http\Request;

class CameraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ruangan_id = $request->room_id;
        $str = 'admin-$2y$05$mvSFmzTfoWwJ3f5Zy4/OEO/Jh4zy4rP0LnvdMWfJkWGX4y2JWczg.-$2y$10$Uzm1x3qnbS/oK8G4oFR.a.G8qoDgczrr5kESeEU/0eT542qBTF4/u';
        $expld = explode('-', $str);
        $arr = Access::whereIn('unique_key',$expld)->where('room_id',$ruangan_id)->get();
        $room = [];
        foreach($arr as $data){
            $room[]=$data->room_id;
        }
        $ruangan = Room::whereIn('id',$room)->first();
        // dd($ruangan->id == $ruangan_id);

        return $ruangan->id == $ruangan_id;
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

        $data = Camera::create(['link' => $request->input('link')]);

        // do something with the data
        // save it to the database, etc.

        return response()->json(['status' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
