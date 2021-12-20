<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class AddController extends Controller
{
    //

    public function addProduct(Request $request){
        $request->validate([
            
        ]);
        $messages=[
            'unique' => 'Bu ürün  kayıt edilmiş',
            'required' => 'Boş bırakılamaz',
            'min' => 'En az 2 karakter olmalıdır.'
        ];
        Validator::make($request->all(),[
            'name' => 'required|min:2|unique:products,name'
        ],$messages)->validate();

        DB::table('products')->insert([
            'name' => $request->name
        ]);

        return back()->with('success','Ürün başarıyla kaydedildi');

    }

    public function addReceipt(Request $request){
        return $request->id;
    }
}
