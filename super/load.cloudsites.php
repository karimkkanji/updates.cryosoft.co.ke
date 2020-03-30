<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.gearhost.com/v1/cloudsites",
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER=> false,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer 77480f71d31b4021935a4d61703f025d"
    ),
));

$response = curl_exec($curl);

curl_close($curl);
//var_dump($response);
$array = json_decode($response,true);
for($counter = 0; $counter<count($array['cloudSites']); $counter++) {
    $name = $array['cloudSites'][$counter]["name"];
    $status = $array['cloudSites'][$counter]["status"];
    $id = $array['cloudSites'][$counter]["id"];
    if($status=="Running"){
        $status = " <span class=\"mr-2\"><i class=\"fas fa-circle text-success\"></i> Running</span></div>";
    }
    else{
        $status = " <span class=\"mr-2\"><i class=\"fas fa-circle text-danger\"></i> Not Running</span></div>";
    }
    echo " <div class=\"col-lg-5 col-xl-4\">
                        <div class=\"card shadow mb-4\">
                            <div class=\"card-header d-flex justify-content-between align-items-center\">
                                <h6 class=\"text-primary font-weight-bold m-0\">$name</h6>
                                <div class=\"dropdown no-arrow\"><button class=\"btn btn-link btn-sm dropdown-toggle\" data-toggle=\"dropdown\" aria-expanded=\"false\" type=\"button\"><i class=\"fas fa-ellipsis-v text-gray-400\"></i></button>
                                    <div class=\"dropdown-menu shadow dropdown-menu-right animated--fade-in\"
                                         role=\"menu\">
                                        <p class=\"text-center dropdown-header\">Cloudsite Actions</p><a class=\"dropdown-item\" role=\"presentation\" href=\"#\" onclick='action(\"$id\",\"start\")'><i class=\"fas fa-play text-success\"></i>&nbsp;Start</a><a class=\"dropdown-item\" role=\"presentation\" href=\"#\" onclick='action(\"$id\",\"stop\")' ><i class=\"fas fa-stop text-danger\"></i>&nbsp;Stop</a>
                                        <a class=\"dropdown-item\" role=\"presentation\" href=\"#\" onclick='action(\"$id\",\"restart\")'><i class=\"fas fa-recycle text-warning\"></i>&nbsp;Recycle</a>
                                        <div class=\"dropdown-divider\"></div><a class=\"dropdown-item\" role=\"presentation\" href=\"#\"onclick='action(\"$id\",\"delete\")' ><i class=\"fas fa-trash text-danger\"></i>&nbsp; Delete</a></div>
                                </div>
                            </div>
                            <div class=\"card-body\">
                                <div class=\"text-center small mt-4\">
                                    <span>Status:</span><br/>
                                   $status
                            </div>
                        </div>
                    </div>";
}
?>