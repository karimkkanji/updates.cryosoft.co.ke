<?php
require '_cred_main.php';
session_start();

if(!isset($_SESSION['username'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Projects - Updates | Cryosoft</title>
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
                <h3 class="text-dark mb-4">Site Notices</h3>
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
                                    $color = $_POST['color_alert'];
                                    $content = $_POST['change_log_update'];
                                    $bgcolorup=$_POST['bg-color'];
                                    $textcolor=$_POST['text-color'];
                                    $sql = "UPDATE notices SET notice_message='$content',notice_color= '$color', background_hex='$bgcolorup', text_hex = '$textcolor' WHERE id='$appid'";

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

                                            $sql_options = "SELECT * FROM notices";
                                            $resultoptions = $conn->query($sql_options);

                                            if ($resultoptions->num_rows > 0) {
                                                // output data of each row
                                                while($row = $resultoptions->fetch_assoc()) {
                                                    echo "<option value=\"" . $row["id"]. "\">" . $row["notice_title"]. "</option>";
                                                }
                                            } else {
                                                echo "<option disabled selected>Nothing to Add</option>";
                                            }
                                            ?>
                                        </select></div>
                                        <div class="form-group"><label>Notice Color:</label>
                                            <select class="form-control" name="color_alert">
                                            <option value="success" selected="">Success</option>
                                            <option value="danger">Danger</option>
                                            <option value="warning">Warning</option>
                                            <option value="info">Info</option>
                                            <option value="secondary">Secondary</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Background Color:</label>
                                        <input type="color" name="bg-color" class="form-control" value="#00bc8c">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Text Color:</label>
                                        <input type="color" name="text-color" class="form-control" value="#000000">
                                    </div>
                                    <div class="form-group">
                                        <label>Notice Content:</label>
                                        <textarea class="form-control" name="change_log_update" placeholder="Type updated alert Content Here..." rows="10" required=""></textarea></div>
                                    <div class="form-group"><button class="btn btn-primary" type="submit" name="submit">Update Notice</button></div>
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
                                    $stmt = $conn->prepare("INSERT INTO `notices`(`notice_title`, `notice_message`, `notice_color`,`background_hex`,`text_hex`) VALUES (?,?,?,?,?)");
                                    $appname=$_POST['app_name'];
                                    $alert_color=$_POST['color_alert'];
                                    $changelog=$_POST['change_log'];
                                    $bgcolor=$_POST['bg-color-new'];
                                    $textcolornew=$_POST['text-color-new'];
                                    $stmt->bind_param("sssss", $appname,$changelog,$alert_color,$bgcolor,$textcolornew);
                                    if ($stmt->execute()) {
                                        echo "<div class='alert alert-success'>".$appname." was added successfully!</div>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Error adding ".$appname."</div>";
                                    }

                                }
                                ?>
                                <form method="post">
                                    <div class="form-group">
                                        <label>Notice Title:</label>
                                        <input class="form-control" type="text" name="app_name" placeholder="Notice Title" required=""></div>
                                    <div class="form-group">
                                        <label>Notice Color:</label>
                                        <select class="form-control" name="color_alert">
                                            <option value="success" selected="">Success</option>
                                            <option value="danger">Danger</option>
                                            <option value="warning">Warning</option>
                                            <option value="info">Info</option>
                                            <option value="secondary">Secondary</option>
                                        </select></div>
                                    <div class="form-group col-3">
                                        <label>Background Color:</label>
                                        <input type="color" name="bg-color-new" class="form-control" value="#00bc8c">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Text Color:</label>
                                        <input type="color" name="text-color-new" class="form-control" value="#000000">
                                    </div>
                                    <div
                                            class="form-group">
                                        <label>Notice Content:</label>
                                        <textarea class="form-control" name="change_log" placeholder="Type alert Content Here..." rows="10" required=""></textarea></div>
                                    <div class="form-group"><button class="btn btn-primary" type="submit" name="add">Add Notice</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow" style="margin-top: 30px">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Project Updates</p>
                    </div>
                    <div class="card-body">
                        <div id="messageDeleteHere"></div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Title</th>
                                        <th>Color</th>
                                        <th>Background Color</th>
                                        <th>Text Color</th>
                                        <th>Message</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT * FROM notices";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                    echo " <tr> <td>".$row['id']."</td>
                                        <td>".$row['notice_title']."</td>
                                        <td>".$row['notice_color']."
                                        <td><i class='fas fa-square' style='color: ".$row['background_hex']."'></i>&nbsp".$row['background_hex']."</td>
                                        <td><i class='fas fa-square' style='color: ".$row['text_hex']."'></i>&nbsp".$row['text_hex']."</td>
                                        <td>".$row['notice_message']."</td>
                                        <td><a onclick='deleteRecord(".$row['id'].")' class='text-danger' href='javascript:void(0)'><i class='fa fa-trash'></i> </a>&nbsp;";
                                        if($row["visibility"]=='visible'){
                                            echo "<a onclick='unviewRecord(".$row['id'].", \"true\")' class='text-danger' href='javascript:void(0)'><i class='fa fa-eye-slash'></i> </a></td>";
                                        }
                                        else{
                                            echo "<a onclick='unviewRecord(".$row['id'].", \"false\")' class='text-danger' href='javascript:void(0)'><i class='fa fa-eye'></i> </a></td>";
                                        }

                                     echo "</tr>";
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
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        let deleteRecord = (id) => {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("messageDeleteHere").innerHTML = this.responseText;
                    location.reload();
                }
            };
            xmlhttp.open("POST", "./handleDelete.php", true);
            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlhttp.send("id="+id);

        }
        let unviewRecord = (id,visib) => {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("messageDeleteHere").innerHTML = this.responseText;
                    location.reload();
                }
            };
            xmlhttp.open("POST", "./handleUnview.php", true);
            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlhttp.send("id="+id+"&visibility="+visib);

        }
    </script>
</body>

</html>