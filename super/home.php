<?php
require '_cred.php';
session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
}
else{
    $sql_android = "SELECT * FROM app_updates WHERE type='android'";
    $sql_websites = "SELECT * FROM app_updates WHERE type='website'";
    $sql_pwa = "SELECT * FROM app_updates WHERE type='pwa-app'";
    $sql_system = "SELECT * FROM app_updates WHERE type='system'";
    $result = $conn->query($sql_android);
    $android =$result->num_rows;
    $resultweb = $conn->query($sql_websites);
    $websites =$resultweb->num_rows;
    $resultwa = $conn->query($sql_pwa);
    $pwa =$resultwa->num_rows;
    $resultsys = $conn->query($sql_system);
    $system =$resultsys->num_rows;

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Updates | Cryosoft</title>
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
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-download"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Updates | Cryosoft</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                </ul>
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="projects.php"><i class="fas fa-table"></i><span>Projects</span></a></li>
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
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
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
                    <h3 class="text-dark mb-0">Dashboard</h3>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-primary py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Total apps</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $android; ?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fab fa-android fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>total websites</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $websites; ?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fab fa-chrome fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-warning py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>Total PWAs </span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $pwa; ?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fab fa-chrome fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-danger py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-danger font-weight-bold text-xs mb-1"><span>Total Systems </span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $system; ?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fab fa-chrome fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header py-3">
                                <h6 class="text-primary font-weight-bold m-0">Update</h6>
                            </div>
                            <div class="card-body">
                                <?php
                                if(isset($_POST['submit'])) {
                                    $appid = $_POST["app-id"];
                                    $changelog = $_POST['change_log_update'];
                                        $app_version = $_POST['app_version-update'];
                                    $sql = "UPDATE app_updates SET app_version='$app_version',app_change_log='$changelog',date_updated= NOW() WHERE id='$appid'";

                                    if ($conn->query($sql) === TRUE) {
                                        echo "<div class='alert alert-success'>Record updated successfully!</div>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Error updating record: " . $conn->error."</div>";
                                    }
                                }
                                ?>
                                <form method="post">
                                    <div class="form-group"><label>Choose an existing Item</label><select class="form-control" name="app-id">
                                            <?php

                                            $sql_options = "SELECT * FROM app_updates";
                                            $resultoptions = $conn->query($sql_options);

                                            if ($resultoptions->num_rows > 0) {
                                                // output data of each row
                                                while($row = $resultoptions->fetch_assoc()) {
                                                    echo "<option value=\"" . $row["id"]. "\">" . $row["app_name"]. "</option>";
                                                }
                                            } else {
                                                echo "<option disabled selected>Nothing to Add</option>";
                                            }
                                            ?>
                                            </select></div>
                                    <div
                                        class="form-group"><input class="form-control" type="text" placeholder="Version" required="" name="app_version-update"></div>
                            <div class="form-group"><textarea class="form-control" name="change_log_update" placeholder="Change Log" rows="10" required=""></textarea></div>
                            <div class="form-group"><button class="btn btn-primary" type="submit" name="submit">Update app</button></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header py-3">
                            <h6 class="text-primary font-weight-bold m-0">Add New</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            if(isset($_POST['add'])) {
                                $stmt = $conn->prepare("INSERT INTO app_updates(app_domain, app_name, app_version, app_change_log, date_updated, type) VALUES (?,?,?,?,NOW(),?)");
                                $domain =$_POST['domain'];
                                $appname=$_POST['app_name'];
                                $appversion=$_POST['app_version'];
                                $changelog=$_POST['change_log'];
                                $type=$_POST['type'];
                                $stmt->bind_param("sssss", $domain, $appname, $appversion,$changelog,$type);
                                if ($stmt->execute()) {
                                    echo "<div class='alert alert-success'>Record updated successfully!</div>";
                                } else {
                                    echo "<div class='alert alert-danger'>Error adding record</div>";
                                }

                            }
                            ?>
                            <form method="post">
                                <div class="form-group"><input class="form-control" type="text" name="app_name" placeholder="Name" required=""></div>
                                <div class="form-group"><input class="form-control" name="domain" type="text" placeholder="Domain" required=""></div>
                                <div class="form-group"><input class="form-control" type="text" placeholder="Version" required="" name="app_version"></div>
                                <div class="form-group"><select class="form-control" name="type"><option value="android" selected="">Android App</option><option value="pwa-app">PWA app</option><option value="website">Website</option><option value="system">System</option></select></div>
                                <div
                                    class="form-group"><textarea class="form-control" name="change_log" placeholder="Change Log" rows="10" required=""></textarea></div>
                        <div class="form-group"><button class="btn btn-primary" type="submit" name="add">Add</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © Updates | Cryosoft 2019</span></div>
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
</script>
</html>