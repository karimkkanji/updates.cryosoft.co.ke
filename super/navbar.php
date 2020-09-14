<?php
$filename = get_file();
$index = $project_vc = $project_vlst = $covid19test = $driveintheoryTest = $cloudsites = $notices="";
function get_file()
{
    return basename($_SERVER['PHP_SELF']);
}
switch ($filename) {
    case 'home.php':
        $index = "active";
        break;
    case 'projects.php':
        $project_vc = "active";
        break;
    case 'listing.php':
        $project_vlst = "active";
        break;
    case 'covid19.php':
        $covid19test = "active";
        break;
    case 'dit.php':
        $driveintheoryTest = "active";
        break;
    case 'cloudsites.php':
        $cloudsites = "active";
        break;
    case 'notices.php':
        $notices = "active";
        break;
}

?>

<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-dark p-0">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon"><img src='assets/img/colored_transparent_logo.png' height="60px"></div>
            <div class="sidebar-brand-text mx-3"><span>Updates</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" role="presentation"><a class="nav-link <?php echo $index;?>" href="home.php"><i class="fas fa-tachometer-alt"></i><span>Project Version Control</span></a></li>
        </ul>
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" role="presentation"><a class="nav-link <?php echo $project_vc;?>" href="projects.php"><i class="fas fa-table"></i><span>Project Version Listing</span></a></li>
        </ul>
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" role="presentation"><a class="nav-link <?php echo $project_vlst;?>" href="listing.php"><i class="fas fa-check"></i><span>Cryosoft Project Listing</span></a></li>
        </ul>
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" role="presentation"><a class="nav-link <?php echo $covid19test;?>" href="covid19.php"><i class="fas fa-bug"></i><span>Covid-19 Self Test</span></a></li>
        </ul>
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" role="presentation"><a class="nav-link <?php echo $driveintheoryTest;?>" href="dit.php"><i class="fas fa-car"></i><span>Drive In Theory Self Test</span></a></li>
        </ul>
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" role="presentation"><a class="nav-link <?php echo $cloudsites;?>" href="cloudsites.php"><i class="fas fa-cloud"></i><span>Cloudsites</span></a></li>
        </ul>
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item" role="presentation"><a class="nav-link <?php echo $notices;?>" href="notices.php"><i class="fa fa-envelope"></i><span>Site Notices</span></a></li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>