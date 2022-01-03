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
        $lastId=  DB::table('receipt')->insertGetId([
           
        ]);
       
      $ids= $request->ids;
     

      for($i=0;$i<count($ids);$i++){
        DB::table('receipts_products')->insert([
            'product' => $ids[$i],
            'receipt' => $lastId,
            
        ]);

      }
        return response()->json("Başarılı");
    }
    public function receiptMake(){
        
       
        $quanity=rand(1,9);
        for($y=0;$y<$quanity;$y++){
            $ids[]=rand(1,208);
        }
        $lastId=  DB::table('receipt')->insertGetId([
           
        ]);
        for($i=0;$i<count($ids);$i++){
            DB::table('receipts_products')->insert([
                'product' => $ids[$i],
                'receipt' => $lastId,
                
            ]);
    
          }
        
        return $ids;
    }
    public function receiptcount(){
        $count=DB::table('receipt')->count();

        return $count;
    }
}
