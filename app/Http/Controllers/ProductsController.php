<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
class ProductsController extends Controller
{
    public function showAll(){ 
        $allProducts = Products::getAll();
        return json_encode($allProducts);
    }
    public function search(Request $request){
        $gotObj = json_decode($request->input('sql'));
        $sqlFull = 'select * from products where ';
        $sql = '';
        foreach($gotObj as $key => $value){
            $val = $value->val;
            $exp = $value->exp;
            if($value->val != ''){
                if($key == 'id' || $key == 'price' || $key == 'weight'){
                    $sql .= "$key $exp $val AND ";
                }
                else{
                    $sql .= "$key $exp '$val' AND ";
                }
            }
        }
        if($sql == '') return '';  
        $sqlFull .= substr($sql, 0, -4);
        $result = DB::select($sqlFull);
        return json_encode($result);
    }
}
