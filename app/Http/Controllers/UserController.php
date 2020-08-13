<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public static function  getAllData(){
        return DB::table(str_replace("=","",base64_encode('users')))->get();
    }

    public static function getDataById($id){
        return DB::table(str_replace("=","",base64_encode('users')))->get()->where("id",$id);
    }

    public static function getDataByEmail($email){
        return DB::table(str_replace("=","",base64_encode('users')))->get()->where("email",$email);
    }
}
