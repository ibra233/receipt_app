<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ViewController extends Controller
{
    //
    public function viewReceipts(Request $request){
        $query = DB::table('receipt')->get();
        $products = [];
        foreach ($query as $item) {
            $products[] = DB::table('receipts_products')
                ->join('products', 'receipts_products.product', '=', 'products.product_id')
                ->where('receipts_products.receipt', $item->receipt_id)->get();
        }
        // dd($products);

        return view('receiptView', compact(['query', 'products']));
       
    }
}
