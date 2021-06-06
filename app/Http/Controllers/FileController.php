<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function upload(Request $request){
        $user=User::query()->where('remember_token','=',$request->input('token'))->first();
        $new_file=[
            'realName'=>$request->input('Name'),
            'physicalName'=>Str::random(20),
            'description'=>$request->input('description'),
            'price'=>$request->input('price'),
            'format'=>$request->input('format'),
            'size'=>$request->input('size'),
            'author_id'=>$user->id,
            'subcategory_id'=>$request->input('subcategory_id')
        ];

    }
}
