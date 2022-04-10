<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Log;

class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        //Log::info(json_encode($request->all()));

        /*
        $validatedData = $request->validate([
            'select_file' =>'required|mimes:csv,txt,xls,xlsx,pdf|max:2048'
        ]);

        Log::info($validatedData);*/

        $name = $request->file('file')->getClientOriginalName();

        $path = $request->file('file')->store('public/files');
        Log::info("end");


        $save = new File();

        $save->name = $name;
        $save->path = $path;
        $save->save();

        return redirect('/');
    }
}
