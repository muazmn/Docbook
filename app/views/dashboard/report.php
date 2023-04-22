<!-- <h1>brobeo beo</h1> -->

<div class="dashboard-main homeDashboard requestDashboardContainer" style="margin-left:260px">
    <div class="titleAndsearch-bar reportContainerBar">
        <h2>Between Dates Report of Appointmetns</h2>
        <form action="<?= BASEURL; ?>Doctors/reportDashboardPage" method="post">
            <div class=" search-container dashboardSearch-container appointmentRpBar">
                <input type="text" placeholder="From Date" name="date1" onfocus=" (this.type='date' )" onblur="if(this.value==''){this.type='text'}">
                <!-- <button type="submit">CHECK</button> -->
            </div>
            <div class=" search-container dashboardSearch-container appointmentRpBar">
                <input type="text" placeholder="To Date" name="date2" onfocus=" (this.type='date' )" onblur="if(this.value==''){this.type='text'}">
            </div>
            <button type="submit" class="rpBtn" name="submit">CHECK</button>
        </form>
    </div>
    <?php Flasher::searchingRecordFlash() ?>
    <div class=" dashboardHistoryTableContainer dashboardHistoryTableContainer1">
        <div class="generalDashboardContainer generalRequestContainer" id="reportDashboard">
            <table class="dashboardHistoryTable requestHomeDashboard table">
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Mobile No</th>
                    <th>Date</th>
                    <th>Diseases</th>
                    <th>Time</th>
                    <th>Approval</th>
                </tr>
                <?php if (isset($_POST["submit"]) && ($_POST['date1'] == null || $_POST['date2'] == null)) {
                    echo "<script>
                            var tbl = document.getElementById('reportDashboard')
                            tbl.style.display = 'none'
                          </script>";
                } elseif ($_POST['date1'] == null && $_POST['date2'] == null) {
                    echo "<script>
                    var tbl = document.getElementById('reportDashboard')
                    tbl.style.display = 'none'
                  </script>";
                } else {
                    echo "<script>
                    var tbl = document.getElementById('reportDashboard')
                    tbl.style.display = 'static'
                  </script>";
                    foreach ($data['patient'] as $data) : ?>
                        <tr>
                            <td><?= $data['FullName']; ?></td>
                            <td><?= $data['PhoneNumber']; ?></td>
                            <td><?= $data['Date']; ?></td>
                            <td><?= $data['Disease']; ?></td>
                            <td><?= $data['Time']; ?></td>
                            <td><?= $data['status']; ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php } ?>
            </table>
        </div>
    </div>
</div>