<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File_uploads;

class Files extends Controller
{
    public function fileStore(Request $request)
    {
        $upload_path = public_path('upload');

        $file_name = $request->file->getClientOriginalName();
        $file_ext = $request->file->getClientOriginalExtension();

        $generated_new_name = time() . '.' .$file_ext ;
        $request->file->move($upload_path, $generated_new_name);

        $file_path = $upload_path."/".$generated_new_name;
        $file_size = $request->file->getSize();
        
        $insert['name'] = $file_name;
        $insert['extension'] = $file_ext;
        $insert['size'] = $file_size;
        $isert['path'] = $file_path;
        $check = File_uploads::insertGetId($insert);

        return response()->json(['success' => 'You have successfully uploaded "' . $file_name . '"']);
    }

    // public function index()
    // {
    //     $fl = File_uploads::all();
    //     return response()->json($fl);
    // }

    // public function store(Request $request)
    // {
    //     $fl = new File_uploads([
    //         'name' => $request->post('name'),
    //         'extension' => $request->post('extension'),
    //         'size' => $request->post('size'),
    //         'path' => $request->post('path'),
    //     ]);
    //     $fl->save();

    //     return response()->json('Successfully added!');
    // }

    // public function show($id)
    // {
    //     $fl = File_uploads::find($id);
    //     return response()->json($fl);
    // }

    // public function update(Request $request, $id)
    // {
    //     $fl = File_uploads::find($id);
    //     $fl->name = $request->post('name');
    //     $fl->extension = $request->post('extension');
    //     $fl->size = $request->post('size');
    //     $fl->path = $request->post('path');
    //     $fl->save();

    //     return response()->json('Successfully updated!');
    // }

    // public function destroy($id)
    // {
    //     $fl = File_uploads::find($id);
    //     $fl->delete();

    //     return response()->json('Successfully deleted!');
    // }
}
