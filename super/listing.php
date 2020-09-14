<?php
require '_cred_main.php';
session_start();
if(!isset($_SESSION['username'])){
    header("location:index.php");
}
else{
    $que = "SELECT * FROM projects_list WHERE stage=";
    $sql_published = $que."'Published'";
    $sql_alpha = $que."'Alpha'";
    $sql_beta = $que."'Beta'";
    $sql_ongoing = $que."'Ongoing'";
    $sql_discontinued = $que."'Discontinued'";
    $sql_hidden = $que."'Hidden'";
    
    // $sql_websites = "SELECT * FROM app_updates WHERE type='website'";
    // $sql_pwa = "SELECT * FROM app_updates WHERE type='pwa-app'";
    // $sql_system = "SELECT * FROM app_updates WHERE type='system'";

    $result = $conn->query($sql_published);
    $published =$result->num_rows;
    $resultweb = $conn->query($sql_alpha);
    $alpha =$resultweb->num_rows;
    $resultwa = $conn->query($sql_beta);
    $beta =$resultwa->num_rows;
    $resultsys = $conn->query($sql_ongoing);
    $ongoing =$resultsys->num_rows;
    $resultsys = $conn->query($sql_discontinued);
    $discontinued =$resultsys->num_rows;
    $resultsys = $conn->query($sql_hidden);
    $hidden =$resultsys->num_rows;
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
                    <h3 class="text-dark mb-0">Cryosoft Project Listing</h3>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-info py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Alpha</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $alpha; ?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-font fa-2x text-info"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-primary py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Beta</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $beta; ?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-asterisk fa-2x text-primary"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-warning py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>Ongoing</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $ongoing; ?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-running fa-2x text-warning"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Published </span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $published; ?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-check fa-2x text-success"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-danger py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-danger font-weight-bold text-xs mb-1"><span>Discontinued </span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $discontinued; ?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-ban fa-2x text-danger"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-secondary py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-secondary font-weight-bold text-xs mb-1"><span>Hidden </span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $hidden; ?></span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-ghost fa-2x text-secondary"></i></div>
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
                                    $appid = $_POST["project_id"];
                                    $project_name = $_POST["name_update"];
                                    $project_link = $_POST["url_update"];
                                    $project_lead = $_POST["project_lead_update"];
                                    $project_stage = $_POST["stage_update"];
                                    $project_description = $_POST["description_update"];
                                    date_default_timezone_set("Africa/Nairobi");
                                        $sql = "UPDATE projects_list SET name='$project_name',link='$project_link',description='$project_description',publisher='$project_lead',stage='$project_stage',date_modified=NOW() WHERE id='$appid'";
                                    if ($conn->query($sql) === TRUE) {
                                        echo "<div class='alert alert-success'>Project $project_name updated successfully!</div>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Error updating record: " . $conn->error."</div>";
                                    }
                                }
                                ?>
                                <form method="post">
                                    <div class="form-group"><label>Choose an existing Item</label><select class="form-control" name="project_id" onchange="fillIn(this.value)">
                                            <?php

                                            $sql_options = "SELECT * FROM projects_list order by name asc";
                                            $resultoptions = $conn->query($sql_options);

                                            if ($resultoptions->num_rows > 0) {
                                                // output data of each row
                                                echo "<option disabled selected>Select one</option>";
                                                while($row = $resultoptions->fetch_assoc()) {
                                                    echo "<option value=\"" . $row["id"]. "\">" . $row["name"]. "</option>";
                                                }
                                            } else {
                                                echo "<option disabled selected>Nothing to Add</option>";
                                            }
                                            ?>
                                            </select></div>
                                            <div id="filler">
                                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header py-3">
                            <h6 class="text-primary font-weight-bold m-0">Add New Listing</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            if(isset($_POST['add'])) {
                                $stmt = $conn->prepare("INSERT INTO projects_list(name, link, description, publisher, stage,date_created,date_modified) VALUES (?,?,?,?,?,NOW(),NOW())");
                                $project_name = $_POST["project_name"];
                                $project_link = $_POST["url"];
                                $project_lead = $_POST["project_lead"];
                                $project_stage = $_POST["stage"];
                                $project_description = $_POST["description"];
                                date_default_timezone_set("Africa/Nairobi");
                                $stmt->bind_param("sssss", $project_name,$project_link,$project_description,$project_lead,$project_stage);
                                if ($stmt->execute()) {
                                    echo "<div class='alert alert-success'>Project has been added successfully!</div>";
                                } else {
                                    echo "<div class='alert alert-danger'>Error adding record</div>";
                                }

                            }
                            ?>
                            <form method="post">
                                <div class="form-group">
                                <label for="project_name">Project Name</label>
                                <input class="form-control" type="text" name="project_name" id="project_name" placeholder="Name" required="">
                                </div>
                                <div class="form-group">
                                <label for="url">URL of Project</label>
                                <input class="form-control" name="url" id="url"type="url" placeholder="URL of Project" required="">
                                </div>
                                <div class="form-group">
                                <label for="url">Project Lead</label>
                                <input class="form-control" type="text" placeholder="Project Lead" required="" name="project_lead" id="project_lead></div>
                                <div class="form-group">
                                <label for="stage">Stage</label>
                                <select class="form-control" name="stage" id="stage">
                                <option value="Alpha" selected="">Alpha</option>
                                <option value="Beta">Beta</option>
                                <option value="Ongoing">Ongoing</option>
                                <option value="Published">Published</option>
                                <option value="Discontinued">Discontinued</option>
                                <option value="Hidden">Hidden</option>
                                </select></div>
                                <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Description" rows="10" required=""></textarea></div>
                        <div class="form-group"><button class="btn btn-primary" type="submit" name="add">Add</button></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Projects In Progress</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Project Updates</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>Description</th>
                                        <th>Project Lead&nbsp;</th>
                                        <th>Stage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT * FROM projects_list";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                    echo " <tr> <td>".$row['id']."</td>
                                        <td>".$row['name']."</td>
                                        <td>".$row['link']."</td>
                                        <td>".$row['description']."</td>
                                        <td>".$row['publisher']."</td>
                                        <td>".$row['stage']."</td>
                                    </tr>";
                                    }
                                } else {
                                echo "0 results";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
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
    const fillIn=(value)=>{
        let filler =document.getElementById("filler");
        filler.innerHTML="Please wait...";
        let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     filler.innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "filler.php?selected="+value, true);
  xhttp.send();
       
    }
</script>
</html>