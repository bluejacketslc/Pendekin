<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function getAllData(){
        return DB::table(str_replace("=","",base64_encode('users')))->get();
    }

    function getDataById($id){
        return DB::table(str_replace("=","",base64_encode('users')))->get()->where("id",$id);
    }

    function getDataByEmail($email){
        return DB::table(str_replace("=","",base64_encode('users')))->get()->where("email",$email);
    }

    function getDataByLogin(Request $request){
        $email=$request->input('email');
        $password=$request->input('password');
        if($email != null && $password != null){
            $resultAccount = $this->getDataByEmail($email);
            if(count($resultAccount) == 0 || count($resultAccount) > 1){
                $request->session()->flash('error', 'email or password wrong!');
                return redirect("/");
            }
            if(password_verify($password,$resultAccount[0]->password)){
                $request->session()->put("user",$resultAccount[0]);
                return redirect("/");
            }
        }
        else
            return redirect("/");
    }

    function destroyLogin(Request $request){
        $request->session()->forget('user');
        $request->session()->flush();
        return redirect("/");

    }

    function register(Request $request){
        $time = new DateTime(null,new DateTimeZone('Asia/Jakarta'));
        $name=$request->input('name');
        $email=$request->input('email');
        $password=$request->input('password');
        $subscription=1;
        $createdAt=$time->format('Y-m-d H:i:s');
        //validator format


        //validator db

        //insert
        DB::table(str_replace("=","",base64_encode('url')))->insert(
            [
                'name'=>$name,
                'email'=>$email,
                'password'=>password_hash($password,PASSWORD_BCRYPT),
                'subscription'=>$subscription,
                'created_at'=>$createdAt
            ]
        );
    }
}
