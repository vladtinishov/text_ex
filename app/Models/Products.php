<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;
    public static function getAll(){
        return static::take(10)->get();
    }
    public static function getSearched($param){
        $sql = 'SELECT * FROM products WHERE ';
        foreach($param as $key => $value){
            if($value != 0){
                $sql .= "$key = $value ,";
            }
        }
        $sql = substr($sql,0,-1);
        // $sql .= ';';
        // $result = pg_query($sql) or die('Ошибка запроса: ' . pg_last_error());
        $result =  DB::select($sql);
        // return $result->id;
        // return $result;
    }
}
