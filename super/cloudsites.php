<?php
require '_cred.php';
session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
}
else{

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cloudsites- Updates | Cryosoft</title>
    <link rel="icon" type="image/png" sizes="308x303" href="assets/img/colored_transparent_logo.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
</head>

<body id="page-top">
<div id="wrapper">
    <nav class="navbar navbar-dark darkmode-ignore align-items-start sidebar sidebar-dark accordion bg-gradient-dark p-0">
        <div class="container-fluid d-flex flex-column p-0">
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon"><img src='assets/img/colored_transparent_logo.png' height="60px"></div>
                <div class="sidebar-brand-text mx-3"><span>Updates</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item" role="presentation"><a class="nav-link" href="home.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            </ul>
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item" role="presentation"><a class="nav-link" href="projects.php"><i class="fas fa-table"></i><span>Projects</span></a></li>
            </ul>
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item" role="presentation"><a class="nav-link" href="listing.php"><i class="fas fa-check"></i><span>Cryosoft Project Listing</span></a></li>
            </ul>
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item" role="presentation"><a class="nav-link" href="covid19.php"><i class="fas fa-bug"></i><span>Covid-19 Self Test</span></a></li>
            </ul>
            <ul class="nav navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="javascript:void(0)"><i class="fas fa-cloud"></i><span>Cloudsites</span></a></li>
            </ul>
            <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
        </div>
    </nav>
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
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Cloudsites</h3>
                    <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-plus fa-sm text-white-50"></i> New Cloudsite</a>
                </div>
                <div class="row" id="cloudsitesHere">
                    <img src="./assets/img/oval_custom.svg" class="mx-auto text-center">
                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal" id="confirm">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content d-block">

                    <!-- Modal Header -->
                    <div class="modal-header" id="modalHeader">
                        <h4 class="modal-title">Are you sure?</h4>
                        <button type="button" class="close" onclick="clearReq()">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div id="waiting" class="text-center"></div>
                        <p id="waitingBody">
                        Are you sure you want to execute the command on the cloudsite? Please confirm It's the right action.
                        The action may be irreversible.
                        </p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer" id="modalFooter">
                        <button type="button" class="btn btn-danger" onclick="clearReq()">No</button>
                        <button type="button" class="btn btn-success" onclick="proceed()">Yes, I am sure</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal" id="modalMessage">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content d-block">
                    <!-- Modal body -->
                    <div class="modal-body text-center mx-auto" id="responseRequest">
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Updates | Cryosoft <?php echo date("Y");?></span></div>
            </div>
        </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="assets/js/theme.js"></script>
</body>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    $("document").ready(()=>cloudLoad());
    let req_got = "";
    let ident = "";
    const action =(id, req)=>{
        req_got = req;
        ident = id;
        $("#confirm").modal({backdrop: "static"});
    };
    const cloudLoad =()=>{
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("cloudsitesHere").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "load.cloudsites.php", true);
        xmlhttp.send();
    };
    const proceed=()=>{
        document.getElementById("waiting").innerHTML ='<img src="./assets/img/oval_custom.svg" class="mx-auto text-center"><br>Please Wait';
        $("#waitingBody").hide();
        $("#modalFooter").hide();
        $("#modalHeader").hide();
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                $("#waitingBody").show();
                $("#modalFooter").show();
                $("#modalHeader").show();
                document.getElementById("waiting").innerHTML ="";
                document.getElementById("responseRequest").innerHTML = this.responseText;
                req_got = "";
                ident = "";
                $("#confirm").modal("hide");
                $("#modalMessage").modal({backdrop: true});
                document.getElementById("cloudsitesHere").innerHTML ='<img src="./assets/img/oval_custom.svg" class="mx-auto text-center">';
                cloudLoad();
            }
        };
        xmlhttp.open("GET", "actions.manage.php?request=" + req_got+"&id="+ident, true);
        xmlhttp.send();
    };
    const clearReq=()=>{
        req_got = "";
        ident = "";
        $("#confirm").modal("hide");
        return 0;
    }
</script>
</html>