<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\User;
use Laravel\Socialite\Facades\Socialite;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function getDataByLogin(Request $request){
        $email=$request->input('email');
        $password=$request->input('password');
        if($email != null && $password != null){
            $resultAccount = UserController::getDataByEmail($email);
            if(count($resultAccount) == 0 || count($resultAccount) > 1){
                $request->session()->flash('error', 'email or password wrong!');
                return redirect("/");
            }
            foreach($resultAccount as $account){
                if(password_verify($password,$account->password)){
                    $valid_user = new User();
                        $valid_user->username = $account->name;
                        $valid_user->email = $account->email;
                        $valid_user->googleId = $account->googleId;
                        $valid_user->imageUrl = $account->image_url;
                        $valid_user->subscription = $account->subscription;
                    $request->session()->put("user",$valid_user);
                    return redirect("/");
                }
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

    function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $valid_user = new User();
            $valid_user->username = $user->name;
            $valid_user->email = $user->email;
            $valid_user->subscription = 0;
            $valid_user->imageUrl = $user->avatar;
            $valid_user->googleId = $user->id;
            $this->googleSignin($valid_user);
            return redirect('/');
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function googleSignin($user){
        $resultAccount = UserController::getDataByEmail($user->email);
        $time = new DateTime(null,new DateTimeZone('Asia/Jakarta'));
        if(count($resultAccount) == 1){
            foreach($resultAccount as $account){
                if($account->googleId == null){
                    DB::table(str_replace("=","",base64_encode('users')))->where("email",$user->email)->update(['googleId'=>$user->googleId,'image_url'=>$user->imageUrl]);
                }
            }
            $resultAccount = UserController::getDataByEmail($user->email);
            $valid_user = new User();
            foreach($resultAccount as $account){
            $valid_user->username = $account->name;
            $valid_user->email = $account->email;
            $valid_user->googleId = $account->googleId;
            $valid_user->imageUrl = $account->image_url;
            $valid_user->subscription = $account->subscription;
            Session::put('user',$valid_user);
            return;
            }
        }
        else if(count($resultAccount) == 0){
            DB::table(str_replace("=","",base64_encode('users')))->insert(
                    [
                        'name'=> $user->username,
                        'email'=> $user->email,
                        'googleId' => $user->googleId,
                        'image_url' => $user->imageUrl,
                        'subscription' => 1,
                        'created_at'=>$time->format('Y-m-d H:i:s')
                    ]
                );
            
                return $this->googleSignin($user);
        }
        else
            abort('500');
    }

    function register(Request $request){
        $time = new DateTime(null,new DateTimeZone('Asia/Jakarta'));
        $name=$request->input('username');
        $email=$request->input('email');
        $password=$request->input('password');
        $subscription=1;
        $createdAt=$time->format('Y-m-d H:i:s');
        //validator format
        $this->validate($request,[
            'username'=>'required|max:12|min:4',
            'email'=>'required|email',
            'password'=>'required|max:24|min:6|required_with:repassword|same:repassword',
            'repassword'=>'required|max:24|min:6'
        ]);
        //validator db
        if(count(UserController::getDataByEmail($email))>0){
            $request->session()->flash('error', 'email is exists!');
            return redirect("/register");
        }
        //insert
        DB::table(str_replace("=","",base64_encode('users')))->insert(
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
