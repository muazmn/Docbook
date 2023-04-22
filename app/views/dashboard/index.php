<!-- <h1>brobeo beo</h1> -->
<div class="dashboard-main homeDashboard" style="margin-left:260px">
    <div class="dashboardFlexContainer">
        <div class="flexHomeDashboard1">
            <h1>Welcome Doctor <?= $data['doctor']['FirstName']; ?></h1>


            <!-- Request Table -->
            <div class="dashboardHistoryTableContainer dashboardHistoryTableContainer1">
                <div class="generalDashboardContainer 1">
                    <?php if (sizeof($data['patientRequest']) > 1) { ?>
                        <h2>Appointment Request</h2>
                        <table class="dashboardHistoryTable requestHomeDashboard">
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Mobile No</th>
                                <th>Date</th>
                                <th>Approval</th>
                            </tr>
                            <?php for ($i = 0; $i < 2; $i++) : ?>
                                <tr>
                                    <td><?= $i + 1; ?></td>
                                    <td><?= $data['patientRequest'][$i]['FullName']; ?></td>
                                    <td><?= $data['patientRequest'][$i]['PhoneNumber']; ?></td>
                                    <td><?= $data['patientRequest'][$i]['Date']; ?></td>
                                    <td>
                                        <a class="myBtn" href="<?= BASEURL; ?>Patients/updatePage/<?= $data['patientRequest'][$i]['ID'] ?>"><i class="fas fa-times-circle requestIcon" style="color: red;"></i></a>
                                        <a class="myBtn2" href="<?= BASEURL; ?>Patients/updatePage/<?= $data['patientRequest'][$i]['ID'] ?>"><i class="fas fa-check-circle requestIcon" style=" color:green;"></i></a>
                                    </td>
                                </tr>
                            <?php endfor ?>
                        </table>
                        <h4><a href="<?= BASEURL; ?>/Doctors/requestDashboardPage/1">see more</a></h4>
                    <?php } elseif (sizeof($data['patientRequest']) > 0) { ?>
                        <h2>Appointment Request</h2>
                        <table class="dashboardHistoryTable requestHomeDashboard">
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Mobile No</th>
                                <th>Date</th>
                                <th>Approval</th>
                            </tr>
                            <?php for ($i = 0; $i < 1; $i++) : ?>
                                <tr>
                                    <td><?= $i + 1; ?></td>
                                    <td><?= $data['patientRequest'][$i]['FullName']; ?></td>
                                    <td><?= $data['patientRequest'][$i]['PhoneNumber']; ?></td>
                                    <td><?= $data['patientRequest'][$i]['Date']; ?></td>
                                    <td>
                                        <a class="myBtn" href="<?= BASEURL; ?>Patients/updatePage/<?= $data['patientRequest'][$i]['ID'] ?>"><i class="fas fa-times-circle requestIcon" style="color: red;"></i></a>
                                        <a class="myBtn2" href="<?= BASEURL; ?>Patients/updatePage/<?= $data['patientRequest'][$i]['ID'] ?>"><i class="fas fa-check-circle requestIcon" style=" color:green;"></i></a>
                                    </td>
                                </tr>
                            <?php endfor ?>
                        </table>
                    <?php } else { ?>
                        <h2>You Don't Have Appointment Request For Now</h2>
                        <table class="dashboardHistoryTable requestHomeDashboard">
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Mobile No</th>
                                <th>Date</th>
                                <th>Approval</th>
                            </tr>
                            <tr>
                                <!-- <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td> -->
                            </tr>
                        </table>
                    <?php } ?>
                </div>
            </div>



            <!-- Cancelled Table -->
            <div class="dashboardHistoryTableContainer dashboardHistoryTableContainer2">
                <div class="generalDashboardContainer cancelContainer">
                    <?php if (sizeof($data['patientCancel']) > 1) { ?>
                        <h2>Cancelled Appointment</h2>
                        <table class="dashboardHistoryTable ">
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Mobile No</th>
                                <th>Date</th>
                                <th>Email</th>
                            </tr>
                            <?php for ($i = 0; $i < 2; $i++) : ?>
                                <tr>
                                    <td><?= $i + 1; ?></td>
                                    <td><?= $data['patientCancel'][$i]['FullName']; ?></td>
                                    <td><?= $data['patientCancel'][$i]['PhoneNumber']; ?></td>
                                    <td><?= $data['patientCancel'][$i]['Date']; ?></td>
                                    <td>
                                        <?= $data['patientCancel'][$i]['Email']; ?>
                                    </td>
                                </tr>
                            <?php endfor ?>
                        </table>
                        <h4><a href="<?= BASEURL; ?>/Doctors/cancelDashboardPage/1">see more</a></h4>
                    <?php } elseif (sizeof($data['patientCancel']) > 0) { ?>
                        <h2>Cancelled Appointment</h2>
                        <table class="dashboardHistoryTable ">
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Mobile No</th>
                                <th>Date</th>
                                <th>Email</th>
                            </tr>
                            <?php for ($i = 0; $i < 1; $i++) : ?>
                                <tr>
                                    <td><?= $data['patientCancel'][$i]['ID']; ?></td>
                                    <td><?= $data['patientCancel'][$i]['FullName']; ?></td>
                                    <td><?= $data['patientCancel'][$i]['PhoneNumber']; ?></td>
                                    <td><?= $data['patientCancel'][$i]['Date']; ?></td>
                                    <td>
                                        <?= $data['patientCancel'][$i]['Email']; ?>
                                    </td>
                                </tr>
                            <?php endfor ?>
                        </table>
                    <?php } else { ?>
                        <h2>You Don't Have Cancelled Appointment</h2>
                        <table class="dashboardHistoryTable ">
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Mobile No</th>
                                <th>Date</th>
                                <th>Email</th>
                            </tr>
                            <tr>
                                <!-- <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td> -->
                            </tr>
                        </table>
                    <?php } ?>
                </div>
            </div>
        </div>






        <!-- today table -->
        <div class="dashboardHistoryTableContainer dashboardHistoryTableContainer3">
            <div class="generalDashboardContainer generalDashboardContainer3">
                <?php if (sizeof($data['todayPatient']) > 1) { ?>
                    <h2>Today Appointment</h2>
                    <table class="dashboardHistoryTable requestHomeDashboard">
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Mobile No</th>
                        </tr>
                        <?php for ($i = 0; $i < 2; $i++) : ?>
                            <tr>
                                <td><?= $i + 1; ?></td>
                                <td><?= $data['todayPatient'][$i]['FullName']; ?></td>
                                <td><?= $data['todayPatient'][$i]['PhoneNumber']; ?></td>
                            </tr>
                        <?php endfor; ?>
                    </table>
                    <h4><a href="<?= BASEURL; ?>Doctors/todayDashboardPage/1">see more</a>
                    <?php } elseif (sizeof($data['todayPatient']) > 0) { ?>
                        <h2>Today Appointment</h2>
                        <table class="dashboardHistoryTable requestHomeDashboard">
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Mobile No</th>
                            </tr>
                            <?php for ($i = 0; $i < 1; $i++) : ?>
                                <tr>
                                    <td><?= $i + 1; ?></td>
                                    <td><?= $data['todayPatient'][$i]['FullName']; ?></td>
                                    <td><?= $data['todayPatient'][$i]['PhoneNumber']; ?></td>
                                </tr>
                            <?php endfor; ?>
                        </table>
                    <?php } else { ?>
                        <h2>You Don't Have Appointment Today</h2>
                        <table class="dashboardHistoryTable requestHomeDashboard">
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Mobile No</th>
                            </tr>
                            <tr>
                                <!-- <td></td>
                                <td></td>
                                <td></td> -->
                            </tr>
                        </table>
                    <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Trigger/Open The Modal -->
<!-- <button id="myBtn">Open Modal</button> -->