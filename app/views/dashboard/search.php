<!-- <h1>brobeo beo</h1> -->

<div class="dashboard-main homeDashboard requestDashboardContainer" style="margin-left:260px">
    <div class="titleAndsearch-bar">
        <h2>Search Appointment by Name/Mobile.no</h2>
        <form action="<?= BASEURL; ?>Doctors/searchDashboardPage" method="POST">
            <div class=" search-container dashboardSearch-container appointmentSearchBar">
                <input type="text" placeholder="Search.." name="patient">
                <button type="submit" name="submit">CHECK</button>
            </div>
        </form>
        <p styl>check here</p>
        <?php Flasher::searchingRecordFlash() ?>
    </div>
    <div class="dashboardHistoryTableContainer dashboardHistoryTableContainer1">
        <div class="generalDashboardContainer generalRequestContainer generalSearchContainer" id="requestHomeDashboard">
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
                <?php if (isset($_POST["submit"]) && $_POST['patient'] == null) {
                    echo "<script>
                            var tbl = document.getElementById('requestHomeDashboard')
                            tbl.style.display = 'none'
                          </script>";
                } elseif ($_POST['patient'] == null) {
                    echo "<script>
                    var tbl = document.getElementById('requestHomeDashboard')
                    tbl.style.display = 'none'
                  </script>";
                } else {
                    echo "<script>
                    var tbl = document.getElementById('appointmentHistoryTable')
                    tbl.style.display = 'static'
                  </script>";
                    foreach ($data['patient'] as $data) : ?>
                        <tr>
                            <!-- <td class=" recordId">
                </td> -->
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