<?php
require '_cred.php';
session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
}
$sql = "SELECT * FROM `questions` ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     $json_values = $row["json_values"];
    }
} else {
    $json_values ="'Could not fill data'";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Covid 19 Self Test - Updates | Cryosoft</title>
    <link rel="icon" type="image/png" sizes="308x303" href="assets/img/colored_transparent_logo.png">
    <link rel="icon" type="image/png" sizes="308x303" href="assets/img/colored_transparent_logo.png">
    <link rel="icon" type="image/png" sizes="308x303" href="assets/img/colored_transparent_logo.png">
    <link rel="icon" type="image/png" sizes="308x303" href="assets/img/colored_transparent_logo.png">
    <link rel="icon" type="image/png" sizes="308x303" href="assets/img/colored_transparent_logo.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
</head>

<body id="page-top">
    <div id="wrapper">
       <?php require 'navbar.php';?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                            </div>
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation"></li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php echo $_SESSION['username'];?></span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="profile.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a
                                            class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                    </div>
                    </li>
                    </ul>
            </div>
            </nav>
            <div class="container-fluid">
        <div id="message"></div>
        <div class="container" style="margin-top: 35px;">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 card card-body" id="questions-here">
                <h3>COVID-19 Self Test<a class="btn btn-primary btn-sm float-right" role="button" href="javascript:void(0)" onclick="fillData()"><i class="fa fa-refresh fa-sm text-white-50"></i> Fill from Existing</a> </h3>
                    <div id="question-1"><span><strong>Note:</strong>&nbsp;A weight of&nbsp;<strong>0</strong>&nbsp;suggests&nbsp;<strong class="text-success">No infection by COVID-19</strong>&nbsp; and a weight of&nbsp;<strong>1</strong>&nbsp;suggests&nbsp;<strong class="text-danger">COVID-19 Infection</strong></span>
                        <div id="removeFill"><button class="btn btn-primary float-right btn-sm" type="button" style="margin: 10px 0;" onclick="addQuestion()"><i class="fa fa-plus"></i></button><label style="margin: 10px 0;"><strong>Question 1<br></strong></label><input class="form-control"
                                type="text" id="q1" onfocusout="changeJson(this.id,this.value)">
                            <div class="form-row">
                                <div class="col"><label>Answer 1</label><input class="form-control" type="text" id="q1-a1" onfocusout="changeJson(this.id,this.value)"></div>
                                <div class="col"><label>Weight</label><select class="form-control" id="q1-w1" onfocusout="changeJson(this.id,this.value)"><option value="0" selected="">0</option><option value="1">1</option></select></div>
                            </div>
                            <div class="form-row">
                                <div class="col"><label>Answer 2</label><input class="form-control" type="text" id="q1-a2" onfocusout="changeJson(this.id,this.value)"></div>
                                <div class="col"><label>Weight</label><select class="form-control" id="q1-w2" onfocusout="changeJson(this.id,this.value)"><option value="0">0</option><option value="1" selected="">1</option></select></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:20px"><div class="row">
    <div class="col-md-3"></div>
                <div class="col-md-6 card card-body">
    <label>Output in JSON <span class="text-danger float-right" id="jsonerror"></span></label><textarea id="output" class="form-control" rows="10" spellcheck="false" onfocusout="changeOutput(this.value)"></textarea></div>
    </div>
                <div class="col-md-3"></div>
    <button class="btn btn-success" type="button" style="bottom:10px; right:10px; position: fixed; z-index: 100&quot;" onclick="checkIfEmpty()">Save Changes</button>
            </div>

        </div>
<!--            <footer class="bg-white sticky-footer">-->
<!--                <div class="container my-auto">-->
<!--                    <div class="text-center my-auto copyright"><span>Copyright © Updates | Cryosoft --><?php //echo date("Y");?><!--</span></div>-->
<!--                </div>-->
<!--            </footer>-->
        </div>
            <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
    <div
        class="modal fade" role="dialog" tabindex="-1" id="confirm-changes">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm saving changes.</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <p>Are you sure you want to save these changes? These changes will take place immediately.</p>
                </div>
                <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal">Don't Save</button><button class="btn btn-success" type="button" onclick="submitOutput()">Save</button></div>
            </div>
        </div>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script>
  let numberOfQuestions = 1;
let formCreated = {totalQuestions:numberOfQuestions,question1:{
  question:"",answer1:"",answer1Weight:0,answer2:"",answer2Weight:1
}};
let myJSON = JSON.stringify(formCreated, undefined, 4);
document.querySelector("#output").value=myJSON;

let addQuestion=()=>{
    numberOfQuestions++;
    formCreated.totalQuestions=numberOfQuestions;
    let additionalquestion = {
  question:"",answer1:"",answer1Weight:0,answer2:"",answer2Weight:1
};
    $("#questions-here").append('<div id="question-'+numberOfQuestions+'">'+
    '<button class="btn btn-primary float-right btn-sm" type="button"'+ 'style="margin: 10px 0;" onclick="addQuestion()"><i class="fa fa-plus"></i>'+ '</button><label style="margin: 10px 0;"><b>Question '+numberOfQuestions+'</b></label><input type="text"'+ 'class="form-control" id="q'+numberOfQuestions+'" onfocusout="changeJson(this.id,this.value)"/>'+
        '<div class="form-row">'+
            '<div class="col"><label>Answer 1</label><input onfocusout="changeJson(this.id,this.value)" type="text" id="q'+numberOfQuestions+'-a1"'+ 'class="form-control" /></div>'+
            '<div class="col"><label>Weight</label><select onfocusout="changeJson(this.id,this.value)" class="form-control" id="q'+numberOfQuestions+'-w1">'+
    '<option value="0" selected>0</option><option value="1">1</option></select>'+
    '</div></div><div class="form-row">'+
            '<div class="col"><label>Answer 2</label><input onfocusout="changeJson(this.id,this.value)" id="q'+numberOfQuestions+'-a2" type="text"'+ 'class="form-control" /></div>'+
            '<div class="col"><label>Weight</label><select onfocusout="changeJson(this.id,this.value)" id="q'+numberOfQuestions+'-w2" class="form-control">'+
    '<option value="0">0</option><option value="1" selected>1</option></select>'+
    '</div></div></div>');
formCreated["question"+numberOfQuestions]=additionalquestion;
    myJSON = JSON.stringify(formCreated, undefined, 4);
  document.querySelector("#output").value=myJSON;
    
}
let changeJson =(id,value)=>{
    if(id.indexOf("-")>-1){
        let ques = id.split('-')[0].substring(1);
        let answerspec =id.split('-')[1].charAt(0);
        let answer=id.split('-')[1].substring(1);
        switch(answerspec){
            case "a":
                formCreated["question"+ques]["answer"+answer] =value;
                break
            case "w":
                formCreated["question"+ques]["answer"+answer+"Weight"] =value;
                break;
        }
        myJSON = JSON.stringify(formCreated, undefined, 4);
  document.querySelector("#output").value=myJSON;
       
    }
    else{
        let ques = id.substring(1);
        formCreated["question"+ques].question =value;
        myJSON = JSON.stringify(formCreated, undefined, 4);
  document.querySelector("#output").value=myJSON;
    }
}
let checkIfEmpty =()=>{
    let error = 0;
    $("input").each( function() {
        if( $.trim($(this).val()).length == 0 ){
         $(this).css("border","2px solid red");
            error =1;
        }
        else{
            error =0;
            $(this).css("border","1px solid #CED4DA");
        }
    }
    );
    if(error==0){
        $("#confirm-changes").modal({backdrop: "static"});
    }
    return error;
}
let submitOutput =()=>{
    let outp = JSON.stringify(formCreated);
     if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               document.getElementById("message").innerHTML = this.responseText;
               window.scrollTo(0,0);
                $("#confirm-changes").modal("hide");
            }
        };
        xmlhttp.open("POST","./addquestions.php",true);
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlhttp.send("jsonGot="+encodeURI(outp));
}
let fillData =()=>{
formCreated = <?php echo $json_values; ?>;
if(formCreated ==="Could not fill data"){
    document.querySelector("#question-1").innerHTML="Could not fill data. Refresh to use new dataset";
}
else{
    document.querySelector('#removeFill').innerHTML="";
    let weight_1_0 ="",weight_1_1 ="",weight_2_1 ="",weight_2_0 ="";
    numberOfQuestions = formCreated.totalQuestions;
for(let i =1; i<=formCreated.totalQuestions;i++){
    weight_1_0 ="",weight_1_1 ="",weight_2_1 ="",weight_2_0 ="";
    if(formCreated["question"+i].answer1Weight==0){
        weight_1_0 = "selected";
    }
    else{
        weight_1_1 ="selected";
    }
    if(formCreated["question"+i].answer2Weight==0){
        weight_2_0 = "selected";
    }
    else{
        weight_2_1 ="selected";
    }
    $("#removeFill").append('<div id="question-'+i+'">'+
    '<button class="btn btn-primary float-right btn-sm" type="button"'+ 'style="margin: 10px 0;" onclick="addQuestion()"><i class="fa fa-plus"></i>'+ '</button><label style="margin: 10px 0;"><b>Question '+i+'</b></label><input type="text"'+ 'class="form-control" id="q'+i+'" value="'+formCreated["question"+i].question+'" onfocusout="changeJson(this.id,this.value)"/>'+
        '<div class="form-row">'+
            '<div class="col"><label>Answer 1</label><input onfocusout="changeJson(this.id,this.value)" value="'+formCreated["question"+i].answer1+'" type="text" id="q'+i+'-a1"'+ 'class="form-control" /></div>'+
            '<div class="col"><label>Weight</label><select onfocusout="changeJson(this.id,this.value)" class="form-control" id="q'+i+'-w1">'+
    '<option value="0" '+weight_1_0+'>0</option><option value="1" '+weight_1_1+'>1</option></select>'+
    '</div></div><div class="form-row">'+
            '<div class="col"><label>Answer 2</label><input value="'+formCreated["question"+i].answer2+'" onfocusout="changeJson(this.id,this.value)" id="q'+
            i+'-a2" type="text"'+ 'class="form-control" /></div>'+
            '<div class="col"><label>Weight</label><select onfocusout="changeJson(this.id,this.value)" id="q'+i+'-w2" class="form-control">'+
    '<option value="0" '+weight_2_0+'>0</option><option value="1" '+weight_2_1+'>1</option></select>'+
    '</div></div></div>');

}
myJSON = JSON.stringify(formCreated, undefined, 4);
  document.querySelector("#output").value=myJSON;
}
}
let changeOutput =(outputGot)=>{
    try{
formCreated =JSON.parse(outputGot);
document.querySelector('#removeFill').innerHTML="";
    let weight_1_0 ="",weight_1_1 ="",weight_2_1 ="",weight_2_0 ="";
    numberOfQuestions = formCreated.totalQuestions;
for(let i =1; i<=formCreated.totalQuestions;i++){
    weight_1_0 ="",weight_1_1 ="",weight_2_1 ="",weight_2_0 ="";
    if(formCreated["question"+i].answer1Weight==0){
        weight_1_0 = "selected";
    }
    else{
        weight_1_1 ="selected";
    }
    if(formCreated["question"+i].answer2Weight==0){
        weight_2_0 = "selected";
    }
    else{
        weight_2_1 ="selected";
    }
    $("#removeFill").append('<div id="question-'+i+'">'+
    '<button class="btn btn-primary float-right btn-sm" type="button"'+ 'style="margin: 10px 0;" onclick="addQuestion()"><i class="fa fa-plus"></i>'+ '</button><label style="margin: 10px 0;"><b>Question '+i+'</b></label><input type="text"'+ 'class="form-control" id="q'+i+'" value="'+formCreated["question"+i].question+'" onfocusout="changeJson(this.id,this.value)"/>'+
        '<div class="form-row">'+
            '<div class="col"><label>Answer 1</label><input onfocusout="changeJson(this.id,this.value)" value="'+formCreated["question"+i].answer1+'" type="text" id="q'+i+'-a1"'+ 'class="form-control" /></div>'+
            '<div class="col"><label>Weight</label><select onfocusout="changeJson(this.id,this.value)" class="form-control" id="q'+i+'-w1">'+
    '<option value="0" '+weight_1_0+'>0</option><option value="1" '+weight_1_1+'>1</option></select>'+
    '</div></div><div class="form-row">'+
            '<div class="col"><label>Answer 2</label><input value="'+formCreated["question"+i].answer2+'" onfocusout="changeJson(this.id,this.value)" id="q'+
            i+'-a2" type="text"'+ 'class="form-control" /></div>'+
            '<div class="col"><label>Weight</label><select onfocusout="changeJson(this.id,this.value)" id="q'+i+'-w2" class="form-control">'+
    '<option value="0" '+weight_2_0+'>0</option><option value="1" '+weight_2_1+'>1</option></select>'+
    '</div></div></div>');

}

myJSON = JSON.stringify(formCreated, undefined, 4);
  document.querySelector("#output").value=myJSON;
    }
catch(e){
    $("#output").css("border","2px solid red");
    document.querySelector("#jsonerror").innerHTML="&nbsp;"+e;
}
}
</script>
</body>

</html>