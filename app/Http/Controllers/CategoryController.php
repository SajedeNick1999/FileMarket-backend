<?php

namespace App\Http\Controllers;


use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function getAll(Request $request){
        $allsubcat=Subcategory::all();
        $resp=[
            'count'=>$allsubcat->count(),
        ];
        $i=0;
        foreach ($allsubcat as $subcat) {
            $resp[$i]=[
                'id'=>$subcat->id,
                'subcategory'=>$subcat->Name,
                'category'=>Category::find($subcat->category_id)->Name
            ];
            $i++;
        }
        return response()->json($resp);
    }
}
