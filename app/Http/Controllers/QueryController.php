<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class QueryController extends Controller
{
    //
    public function queryProduct(Request $request){
      
        $query=DB::table('products')->where('name','like','%'.$request->value.'%')->limit(5)->get();
      
       
        return response($query);
    }
}
