<?php


namespace App\Http\Controllers;


class IndexController extends Controller
{
    public function init(){
        if($_SERVER["REMOTE_ADDR"] !== "127.0.0.1" && strpos($_SERVER["REMOTE_ADDR"],"192.168.") !== 0 && strpos($_SERVER["REMOTE_ADDR"],"10.") !== 0 )  {
            die("admin only");
        }
        if(!file_exists("/var/tmp/".md5($_SERVER["REMOTE_ADDR"]))){
            mkdir("/var/tmp/".md5($_SERVER["REMOTE_ADDR"]));
        }
    }
    public function rm(){
        if(strpos($_POST["filename"], '../') !== false) die("???");
        if(file_exists("/var/".$_POST["filename"])){
            if(is_dir("/var/".$_POST["filename"])){
                rmdir("/var/".$_POST["filename"]);
                echo "rmdir";
            }
            else{
                unlink("/var/".$_POST["filename"]);
                echo "unlink";
            }
        }
    }
    public function upload()
    {

        if(strpos($_POST["filename"], '../') !== false) die("???");
        file_put_contents("/var/tmp/".md5($_SERVER["REMOTE_ADDR"])."/".$_POST["filename"],base64_decode($_POST["content"]));
        echo "/var/tmp/".md5($_SERVER["REMOTE_ADDR"])."/".$_POST["filename"];
    }

    public function moveLog($filename)
    {

        $data =date("Y-m-d");
        if(!file_exists(storage_path("logs")."/".$data)){
            mkdir(storage_path("logs")."/".$data);
        }
        $opts = array(
            'http'=>array(
                'method'=>"GET",
                'timeout'=>1,//单位秒
            )
        );

        $content = file_get_contents("http://127.0.0.1/tmp/".md5('127.0.0.1')."/".$filename,false,stream_context_create($opts));
        file_put_contents(storage_path("logs")."/".$data."/".$filename,$content);
        echo storage_path("logs")."/".$data."/".$filename;
    }
}