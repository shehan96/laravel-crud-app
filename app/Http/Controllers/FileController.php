<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = Storage::url('new/dxWjSu1FWT8CasprwYN0n7CTHdmCCfy2YFoULWYU.png');
        return "<img src='".$url."' />";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $t = time();
        // $result = $request->file('file')->store('apiDocs','storage');
        // $path = Storage::putFile('photos', new File('/path/to/photo'));
        // $result = Storage::putFile('public/new', $request->file('file'));
        // $result = Storage::put('public/new', $request->file('file'));
        // $imageSize = $request->file('file')->getSize();
        $extension = $request->file('file')->extension();
        $kbSize = $imageSize / 1000;
        $newImageName = $t . '.' . $extension;
        $result = Storage::putFileAs('public/users', $request->file('file'), $newImageName);
        return ["result" => $result, "size" => $imageSize, "kbSize" => $kbSize, "extension" => $extension];
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
