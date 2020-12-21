<?php
require '_cred_agrikenya.php';
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
    <title>Agrikenya Prices - Updates | Cryosoft</title>
    <link rel="icon" type="image/png" sizes="308x303" href="assets/img/colored_transparent_logo.png">
    <link rel="icon" type="image/png" sizes="308x303" href="assets/img/colored_transparent_logo.png">
    <link rel="icon" type="image/png" sizes="308x303" href="assets/img/colored_transparent_logo.png">
    <link rel="icon" type="image/png" sizes="308x303" href="assets/img/colored_transparent_logo.png">
    <link rel="icon" type="image/png" sizes="308x303" href="assets/img/colored_transparent_logo.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
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
                <h3 class="text-dark mb-4">Agrikenya Prices</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header py-3">
                                <h6 class="text-primary font-weight-bold m-0">Update Price</h6>
                            </div>
                            <div class="card-body">
                                <?php
                                if(isset($_POST['submit'])) {
                                    $itemid = $_POST["item-id"];
                                    $itemunit = $_POST['item_unit'];
                                    $itemprice = $_POST['item_price'];
                                    $dealprice=$_POST['deal-price'];
                                    $availabilitycheck =(isset($_POST['availability_check'])? '1':'0');
                                    $dealcheck =(isset($_POST['deal_check'])? '1':'0');
                                    $sql = "UPDATE products SET unit='$itemunit', price='$itemprice',deal='$availabilitycheck', availability='$availabilitycheck',deal_price='$dealprice' WHERE id='$itemid'";

                                    if ($conn->query($sql) === TRUE) {
                                        echo "<div class='alert alert-success'>Record updated successfully!</div>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Error updating record: " . $conn->error."</div>";
                                    }
                                }
                                ?>
                                <form method="post">
                                    <div class="form-group"><label>Choose an existing Item</label><select class="form-control" name="item-id" onchange="fillIn(this.value)">
                                            <?php

                                            $sql_options = "SELECT * FROM products";
                                            $resultoptions = $conn->query($sql_options);

                                            if ($resultoptions->num_rows > 0) {
                                                // output data of each row
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
                                <h6 class="text-primary font-weight-bold m-0">Add New Item</h6>
                            </div>
                            <div class="card-body">
                                Coming soon
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow" style="margin-top: 30px">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Price List</p>
                    </div>
                    <div class="card-body">
                        <div id="messageDeleteHere"></div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Unit</th>
                                        <th>Price</th>
                                        <th>Picture</th>
                                        <th>Deal</th>
                                        <th>Availability</th>
                                        <th>Deal Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT * FROM products";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                    echo " <tr> <td>".$row['id']."</td>
                                        <td>".$row['name']."</td>
                                        <td>".$row['unit']."
                                        <td>".$row['price']."</td>
                                        <td><img src='https://agrikenya.cryosoft.co.ke/images/".$row['pic_webp']."' height='50px'/></td>
                                        <td>".($row['deal']==1 ? 'Yes' : 'No' )."</td>
                                        <td>".($row['availability'] == 1 ? 'Yes' : 'No')."</td>
                                        <td>".($row['deal_price']?$row['deal_price']:'-')."</td>";

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
    <script src="assets/js/sb-admin-2.min.js"></script>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
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
            xhttp.open("GET", "fillerAgrikenya.php?selected="+value, true);
            xhttp.send();

        }
    </script>
</body>

</html>