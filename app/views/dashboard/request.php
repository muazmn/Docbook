<!-- <h1>brobeo beo</h1> -->
<div class="dashboard-main homeDashboard requestDashboardContainer" style="margin-left:260px">
    <?php if (sizeof($data['patientRequest']) > 0) { ?>
        <div class="dashboardHistoryTableContainer dashboardHistoryTableContainer1">
            <div class="generalDashboardContainer generalRequestContainer">
                <h2>Appointment Request</h2>
                <table class="dashboardHistoryTable requestHomeDashboard">
                    <tr>
                        <th>id</th>
                        <!-- <th>Patient id</th> -->
                        <th>Name</th>
                        <th>Mobile No</th>
                        <th>Date</th>
                        <th>Diseases</th>
                        <th>Time</th>
                        <th>Approval</th>
                    </tr>
                    <?php foreach ($data['patientRequest'] as $key => $pr) : ?>
                        <tr>
                            <td><?= $key + 1 + ($data['activePage'] - 1) * 7; ?></td>
                            <td><?= $pr['FullName']; ?></td>
                            <td><?= $pr['PhoneNumber']; ?></td>
                            <td><?= $pr['Date']; ?></td>
                            <td><?= $pr['Disease']; ?></td>
                            <td><?= $pr['Time']; ?></td>
                            <td>
                                <!-- <button class="myBtn"><i class="fas fa-times-circle requestIcon" style="color: red;"></i></button> -->
                                <!-- <a class="myBtn2" href=""><i class="fas fa-times-circle requestIcon" style="color: red;"></i></a> -->
                                <a class="myBtn" href="<?= BASEURL; ?>Patients/updatePage/<?= $pr['ID'] ?>"><i class="fas fa-times-circle requestIcon" style="color: red;"></i></a>
                                <a class="myBtn2" href="<?= BASEURL; ?>Patients/updatePage/<?= $pr['ID'] ?>"><i class="fas fa-check-circle requestIcon" style="margin-left: 10px; color:green;"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <div class="paginationContainer">
            <div class="pagination">
                <ul class="digit">
                    <?php if ($data['activePage'] > 1) : ?>

                        <a href="<?= BASEURL; ?>Doctors/requestDashboardPage/1">
                            <li><i class="fas fa-angle-double-left fa-lg"></i></li>
                        </a>
                        <a href="<?= BASEURL; ?>Doctors/requestDashboardPage/<?= $data['activePage'] - 1; ?>">
                            <li><i class="fas fa-chevron-left"></i></li>
                        </a>

                    <?php endif ?>
                    <?php for ($i = $data['start_number']; $i <= $data['end_number']; $i++) : ?>
                        <?php if ($data['activePage'] == $i) : ?>

                            <a href="<?= BASEURL; ?>Doctors/requestDashboardPage/<?= $i; ?>">
                                <li class="activeDashboard"><?= $i; ?></li>
                            </a>

                        <?php else : ?>

                            <a href="<?= BASEURL; ?>Doctors/requestDashboardPage/<?= $i; ?>">
                                <li><?= $i; ?></li>
                            </a>

                        <?php endif ?>
                    <?php endfor; ?>
                    <?php if ($data['activePage'] < $data['totalPage'] && $data['totalPage'] > 1) : ?>
                        <a href="<?= BASEURL; ?>/Doctors/requestDashboardPage/<?= $data['activePage'] + 1; ?>">
                            <li>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                        </a>
                        <a href="<?= BASEURL; ?>Doctors/requestDashboardPage/<?= $data['totalPage']; ?>">
                            <li><i class="fas fa-angle-double-left fa-flip-horizontal fa-lg"></i></li>
                        </a>
                    <?php elseif ($data['activePage'] == 1) : ?>
                        <a href=""></a>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    <?php } else { ?>
        <div class="dashboardHistoryTableContainer dashboardHistoryTableContainer1">
            <div class="generalDashboardContainer generalRequestContainer">
                <h2>You Don't Have Appointment Request For Now</h2>
                <table class="dashboardHistoryTable requestHomeDashboard">
                    <tr>
                        <th>id</th>
                        <!-- <th>Patient id</th> -->
                        <th>Name</th>
                        <th>Mobile No</th>
                        <th>Date</th>
                        <th>Diseases</th>
                        <th>Time</th>
                        <th>Approval</th>
                    </tr>
                    <tr>
                        <!-- <td></td> -->
                        <td></td>
                        <td></td>
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