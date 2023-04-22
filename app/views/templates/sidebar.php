<div class="dashboard-sidebar dashboard-bar-block dashboard-collapse dashboard-card" style="width:250px;" id="mySidebar">
    <div class="sidebarImg">
        <img src="<?= BASEURL; ?>img/docbook.png" style="width:50%;" alt="">
    </div>
    <button class="dashboard-bar-item dashboard-button dashboard-hide-large" onclick="dashboard_close()">Close &times;</button>
    <a href="<?= BASEURL; ?>/Doctors/dashboardPage/<?= $_SESSION['idLogin']; ?>" class="dashboard-bar-item dashboard-button ">Dashboard</a>
    <a href="<?= BASEURL; ?>/Doctors/requestDashboardPage/1" class="dashboard-bar-item dashboard-button ">Appointment Request</a>
    <a href="<?= BASEURL; ?>/Doctors/approvedDashboardPage/1" class="dashboard-bar-item dashboard-button">Approved Appointment</a>
    <a href="<?= BASEURL; ?>/Doctors/cancelDashboardPage/1" class="dashboard-bar-item dashboard-button">Cancelled Appointment</a>
    <a href="<?= BASEURL; ?>/Doctors/todayDashboardPage/<?= $_SESSION['idLogin']; ?>" class="dashboard-bar-item dashboard-button ">Today Appointment</a>
    <!-- <a href="<?= BASEURL; ?>/Doctors/searchDashboardPage/<?= $_SESSION['idLogin']; ?>" class="dashboard-bar-item dashboard-button "> Search</a> -->

    <button class="dashboardDropdown-btn">Search
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dashboardDropdown-container">
        <a href="<?= BASEURL; ?>/Doctors/searchDashboardPage/<?= $_SESSION['idLogin']; ?>">By Name</a>
        <a href="<?= BASEURL; ?>/Doctors/reportDashboardPage/<?= $_SESSION['idLogin']; ?>">By Date</a>
    </div>

    <!-- <a href="<?= BASEURL; ?>/Doctors/reportDashboardPage/<?= $_SESSION['idLogin']; ?>" class="dashboard-bar-item dashboard-button">Report</a> -->
    <a href="<?= BASEURL; ?>Doctors/logout" class="dashboard-bar-item dashboard-button">Logout</a>
</div>

<div class="dashboard-main" style="margin-left:230px">

    <div class="dashboard-teal">
        <div class="dashboard-container ">
            <button class="dashboard-button dashboard-teal dashboard-xlarge dashboardBurger" onclick="dashboard_open()">&#9776;</button>
            <h1><?= $data['dashboardTitle'] ?></h1>
        </div>
        <div class="dashboard-container profileBar2">
            <a href="<?= BASEURL; ?>Doctors/updateProfilePage"><i class="far fa-user"></i></a>
            <img style="border-radius:100%;" src="<?= BASEURL; ?>/img/<?= $data['doctor']['Img']; ?>" alt="">
        </div>
    </div>
</div>