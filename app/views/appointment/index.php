<div class="generalContainer">
    <div class="appointmentHistoryBody">
        <div class="appointmentHistoryContainer">
            <h1>Search Record By Appointment Name/Mobile No...</h1>
            <form action="<?= BASEURL; ?>Patients/checkAppointment" method="POST">
                <div class="search-container appointmentSearchBar">
                    <input type="text" placeholder="Search.." name="keyword">
                    <button type="submit" name="submit">CHECK</button>
                </div>
            </form>
            <div class="appointmentHistoryLine">
                <hr>
            </div>
        </div>
        <p styl>check your result or status here</p>
        <?php Flasher::searchingRecordFlash() ?>
        <div class="appointmentHistoryTableContainer">
            <table class="appointmentHistoryTable table" id="appointmentHistoryTable">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Your_Id</th>
                    <th>Mobile No</th>
                    <th>Remark</th>
                    <th>Email</th>
                    <th>Status</th>
                    <!-- <th>Status</th> -->
                </tr>
                <?php if (isset($_POST["submit"]) && $_POST['keyword'] == null) {
                    echo "<script>
                            var tbl = document.getElementById('appointmentHistoryTable')
                            console.log('fdsfas')
                            tbl.style.display = 'none'
                          </script>";
                } elseif ($_POST['keyword'] == null) {
                    echo "<script>
                    var tbl = document.getElementById('appointmentHistoryTable')
                    console.log('fdsfas')
                    tbl.style.display = 'none'
                  </script>";
                } else {
                    echo "<script>
                    var tbl = document.getElementById('appointmentHistoryTable')
                    console.log('hai')
                    tbl.style.display = 'static'
                  </script>";
                    foreach ($data['patient'] as $data) : ?>
                        <tr>
                            <!-- <td class="recordId"></td> -->
                            <td><?= $data['FullName']; ?></td>
                            <td><?= $data['ID']; ?></td>
                            <td><?= $data['PhoneNumber']; ?></td>
                            <td><?= $data['AdditionalMessage']; ?></td>
                            <td><?= $data['Email']; ?></td>
                            <td><?= $data['status']; ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php } ?>
            </table>
        </div>

    </div>
</div>