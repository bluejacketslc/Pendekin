<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class LinkController extends Controller
{   

    function checkNotSSL($url){
        $file_headers = @get_headers('http://'.$url);
        if(!$file_headers ||$file_headers[0] == 'HTTP/1.1 404 Not Found') {
            return false;
        }
            return true;
    }

    function checkSSL($url){
        $file_headers_ssl = @get_headers('https://'.$url);
        if(!$file_headers_ssl ||$file_headers_ssl[0] == 'HTTP/1.1 404 Not Found') {
            return false;
        }
            return true;
    }

    function checkIsExists($url){
        if($this->checkSSL($url))
            return 'SSL';
        else if($this->checkNotSSL($url))
            return 'HTTP';
        else
            return false;
    }

    function getLink($url){
        $allLink = DB::table(str_replace("=","",base64_encode('url')))->get('*')->where('result',$url);
        if(count($allLink) == 0)
            return abort(404);
        foreach($allLink as $link){
            $redirect = $link->url;
            if($this->checkIsExists($redirect) === 'SSL')
                $redirect = "https://".$redirect;
            else if($this->checkIsExists($redirect) === 'HTTP')
                $redirect = "http://".$redirect;
            else
                return abort(500);
            return redirect($redirect);
        }
    }

    function generate(Request $request){
        if($request->input('url') != null){
            
            $url = $request->input('url');
            $url = str_replace('https://',"",$url);
            $url = str_replace('http://',"",$url);

            if($this->checkIsExists($url) === 'SSL' || $this->checkIsExists($url) === 'HTTP'){
                $Checkurl = DB::table(str_replace("=","",base64_encode('url')))->get('*')->where('url',$url);
                if(count($Checkurl) > 0){
                    foreach($Checkurl as $resultURL){
                        return json_encode(array("url"=>URL::to('/')."/".$resultURL->result));
                    }
                }else{
                    $time = new DateTime(null,new DateTimeZone('Asia/Jakarta'));
                    $created = $time->format('Y-m-d H:i:s');
                    $expired = date('Y-m-d H:i:s', strtotime('+1 day',strtotime($created)));
                    $result = str_replace("=","",base64_encode(intval($url, 36)));
                    $checkIsSame = DB::table(str_replace("=","",base64_encode('url')))->get('*')->where('result',$result);
                    while(count($checkIsSame) > 0){
                        $result = str_replace("=","",base64_encode(intval($result, 36)));
                        $checkIsSame = DB::table(str_replace("=","",base64_encode('url')))->get('*')->where('result',$result);
                    }
                    DB::table(str_replace("=","",base64_encode('url')))->insert(
                        [
                            'url'=>$url,
                            'result'=>$result,
                            'created'=>$created,
                            'expired'=>$expired
                        ]
                    );
                    return json_encode(array("url"=>URL::to('/')."/".$result));
                }
            }else{
                return json_encode(array("error"));
            }
        }
        return json_encode(array("error"));
    }

}
