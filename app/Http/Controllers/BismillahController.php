<?php

namespace App\Http\Controllers;

use App\Models\BismillahModel;
use Illuminate\Http\Request;

class BismillahController extends Controller
{
    public static function add($a, $b){
        return $a + $b;
    }

    public static function insertNewData(){
        BismillahModel::insert(['data' => 'some datas blablabla']);
    }
}
