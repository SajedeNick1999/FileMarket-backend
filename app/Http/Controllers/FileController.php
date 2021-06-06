<?php

namespace App\Http\Controllers;

use App\File;
use App\Subcategory;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function upload(Request $request){
        $user=User::where('remember_token', $request->input('token'))->first();
        $physicalName=Str::random(30);
        $new_file=[
            'name'=>$request->input('name'),
            'physicalName'=>$physicalName,
            'description'=>$request->input('description'),
            'price'=>$request->input('price'),
            'format'=>$request->input('format'),
            'size'=>$request->input('size'),
            'author_id'=>$user->id,
            'subcategory_id'=>$request->input('subcategory_id')
        ];

        //dd($new_file);
        $file=File::create($new_file);

        $request->file('file')->storeAs('files',$physicalName);

        if ($file instanceof File) {
            return response()->json([
                'code'=>200,
                'status'=>'OK'
            ]);
        }
        else{
            return response()->json( [
                'code'=>409,
                'status'=>'File Upload Error'
            ]);
        }
    }

    public function getAll(Request $request){
        $allfile=File::all();
        $i=0;
        foreach ($allfile as $file) {
            $subcategory=Subcategory::where('id', $file->subcategory_id)->first();
            $resp[$i]=[
                'id'=>$file->id,
                'realName'=> $file->realName,
                'description'=> $file->description,
                'price'=> $file->price,
                'format'=> $file->format,
                'size'=> $file->size,
                'author'=> User::find($file->author_id)->name.' '.User::find($file->author_id)->family,
                'subcategory'=>Subcategory::find($file->subcategory_id)->Name,
                'category'=>Category::find($subcategory->category_id)->Name
            ];
            $i++;
        }
        return response()->json($resp);
    }

}
