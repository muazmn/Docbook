<!-- <h1>brobeo beo</h1> -->

<div class="dashboard-main homeDashboard requestDashboardContainer todayDashboard" style="margin-left:260px">
    <?php if (sizeof($data['patientToday']) > 0) { ?>
        <div class="dashboardHistoryTableContainer dashboardHistoryTableContainer1">
            <div class="generalDashboardContainer generalRequestContainer">
                <h2>Today Appointment</h2>
                <table class="dashboardHistoryTable requestHomeDashboard">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Mobile No</th>
                        <th>Date</th>
                        <th>Diseases</th>
                    </tr>

                    <?php foreach ($data['patientToday'] as $key => $data) : ?>
                        <tr>
                            <td><?= $key + 1 + ($data['activePage'] - 1) * 7; ?></td>
                            <td><?= $data['FullName']; ?></td>
                            <td><?= $data['PhoneNumber']; ?></td>
                            <td><?= $data['Date']; ?></td>
                            <td><?= $data['Disease']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <div class="paginationContainer">
            <div class="pagination">
                <ul class="digit">
                    <?php if ($_SESSION['active_page'] > 1) : ?>

                        <a href="<?= BASEURL; ?>Doctors/todayDashboardPage/1">
                            <li><i class="fas fa-angle-double-left fa-lg"></i></li>
                        </a>
                        <a href="<?= BASEURL; ?>Doctors/todayDashboardPage/<?= $_SESSION['active_page'] - 1; ?>">
                            <li><i class="fas fa-chevron-left"></i></li>
                        </a>

                    <?php endif ?>
                    <?php for ($i = $_SESSION['start_number']; $i <= $_SESSION['end_number']; $i++) : ?>
                        <?php if ($_SESSION['active_page'] == $i) : ?>

                            <a href="<?= BASEURL; ?>Doctors/todayDashboardPage/<?= $i; ?>">
                                <li class="activeDashboard"><?= $i; ?></li>
                            </a>

                        <?php else : ?>

                            <a href="<?= BASEURL; ?>Doctors/todayDashboardPage/<?= $i; ?>">
                                <li><?= $i; ?></li>
                            </a>

                        <?php endif ?>
                    <?php endfor; ?>
                    <?php if ($_SESSION['active_page'] < $_SESSION['totalPage'] && $_SESSION['totalPage'] > 1) : ?>
                        <a href="<?= BASEURL; ?>/Doctors/todayDashboardPage/<?= $_SESSION['active_page'] + 1; ?>">
                            <li>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                        </a>
                        <a href="<?= BASEURL; ?>Doctors/todayDashboardPage/<?= $_SESSION['totalPage']; ?>">
                            <li><i class="fas fa-angle-double-left fa-flip-horizontal fa-lg"></i></li>
                        </a>
                    <?php elseif ($_SESSION['active_page'] == 1) : ?>
                        <a href=""></a>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    <?php } else { ?>
        <div class="dashboardHistoryTableContainer dashboardHistoryTableContainer1">
            <div class="generalDashboardContainer generalRequestContainer">
                <h2>You Dont Have Appointment Today</h2>
                <table class="dashboardHistoryTable requestHomeDashboard">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Mobile No</th>
                        <th>Date</th>
                        <th>Diseases</th>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    <?php } ?>

</div>