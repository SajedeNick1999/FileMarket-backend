<?php

namespace App\Http\Controllers;

use App\File;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function upload(Request $request){
        $user=User::query()->where('remember_token','=',$request->input('token'))->first();
        $physicalName=Str::random(20);
        $new_file=[
            'realName'=>$request->input('Name'),
            'physicalName'=>$physicalName,
            'description'=>$request->input('description'),
            'price'=>$request->input('price'),
            'format'=>$request->input('format'),
            'size'=>$request->input('size'),
            'author_id'=>$user->id,
            'subcategory_id'=>$request->input('subcategory_id')
        ];
        $request->file('file')->storeAs('files',$physicalName);
        File::create($new_file);
        return response()->json([
            'code'=>200,
            'status'=>'OK'
        ]);
    }
}
