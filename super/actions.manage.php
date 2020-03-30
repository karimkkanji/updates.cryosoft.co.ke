<?php
require '_cred.php';
session_start();

function execute($url,$req){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER=> false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $req,
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer 77480f71d31b4021935a4d61703f025d",
            'Content-Length: 0'
        ),
    ));

    $response = curl_exec($curl);
    $array = json_decode($response,true);
    if($array['success']=='true'){
        echo "<h3 class='text-success'><i class=\"fas fa-check-circle fa-3x\"></i><br>Success!</h3><hr><span>Command has been successfully Executed</span>";

    }
    else{
        echo "<h3 class='text-danger'><i class=\"fas fa-times-circle fa-3x\"></i><br>Error!</h3><hr><span>Command has failed to executed</span>";

    }
    curl_close($curl);
}

if(!isset($_SESSION['username'])){
    header("location:index.php");
}
else{
 $request = $_GET["request"];
 $cloudSiteId = $_GET["id"];
 if($request=='stop'){
     $url="https://api.gearhost.com/v1/cloudsites/$cloudSiteId/stop";
     $req =  "POST";
     execute($url,$req);
 }
 else if($request=='start'){
        $url="https://api.gearhost.com/v1/cloudsites/$cloudSiteId/start";
        $req =  "POST";
     execute($url,$req);
    }
 else if($request=='restart'){
     $url="https://api.gearhost.com/v1/cloudsites/$cloudSiteId/restart";
     $req =  "POST";
     execute($url,$req);
 }
 else if($request=='delete'){
     $url="https://api.gearhost.com/v1/cloudsites/$cloudSiteId";
     $req =  "DELETE";
     execute($url,$req);
 }


}