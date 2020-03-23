<?php
require 'super/_cred.php';
header("Content-Type:application/json");

if (isset($_GET['app_name']) && $_GET['app_name']!="") {

 $app_name = $_GET['app_name'];
 $result = mysqli_query($conn,"SELECT * FROM app_updates WHERE app_name='$app_name' ORDER BY id DESC LIMIT 1");

 if(mysqli_num_rows($result)>0){
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $myArray["id"] = $row['id'];
        $myArray["app_domain"] = $row['app_domain'];
        $myArray["app_name"] = $row['app_name'];
        $myArray["app_version"] = $row['app_version'];
        $myArray["app_change_log"] = $row['app_change_log'];
        $myArray["date_updated"] = $row['date_updated'];
        $myArray["type"] = $row['type'];
       
}
echo json_encode($myArray);
 mysqli_close($conn);
 }else{
 response(NULL,"No Such app exists Found",NULL);
 }
}else{
    $result = mysqli_query($conn,"SELECT * FROM app_updates");
    if(mysqli_num_rows($result)>0){
        while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[]["app_name"] = $row['app_name'];
    }
    $myapps["total"] = mysqli_num_rows($result);
    $myapps["apps"] = $myArray;
    echo json_encode($myapps);
    }
    else{
        $response['message'] ="There are no apps currenly available";
        $json_response = json_encode($response);
        echo $json_response;
    }
    
 }
 
function response($app_version,$changelog,$date_updated){
 $response['app_version'] = $app_version;
 $response['app_change_log'] =  $changelog;
 $response['date_updated'] = $date_updated;
 $json_response = json_encode($response);
 echo $json_response;
}