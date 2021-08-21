<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = request('name');

        return 'ji';
        /*
        try {

            $users = DB::select('select * from test');
            return response()->json($users);
          
          } catch (\Exception $e) {
          
              return $e->getMessage();
          }
          */

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $all = $request->all();

        $name = $all['name'];
        $age = $all['age'];
        $marks = $all['marks'];

        try {
            
            $insert = DB::insert('INSERT INTO test(name, age, marks) VALUES (?,?,?)', [$name, $age, $marks]);
            return response()->json([ "code" => 201, "message" => "success", "success" => $insert]);
          
          } catch (\Exception $e) {

            $code = $e->getCode();
            $message = $e->getMessage();
            return response()->json(["code" => $code, "message" => $message]);
          }

        // return $all['name'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($id);
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
