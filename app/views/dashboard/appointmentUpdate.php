<div id="myModall" class="modal">

    <div class="modal-container">
        <div class="modal-header">
            <!-- <span class="close">&times;</span> -->
        </div>
        <div class="modal-content">
            <div class="registerForm modal-form actionForm">
                <h1>Take Action</h1>
                <p>take action here</p>
                <form action="<?= BASEURL; ?>Patients/update" method="POST">
                    <!-- <div class='actionAlertContainer'>
                        <p>Data Updated Successfully, return to main dashboard page <a class='profileReturnLink' href='" . BASEURL . "Doctors/dashboardPage'>here..</a></p>
                    </div> -->
                    <?php Flasher::flash3() ?>
                    <select id="actionSelect" name="status">
                        <option value="action" selected>Select status</option>
                        <option value="Approved">Approved</option>
                        <option value="Not Approved">Not Approved</option>
                    </select>

                    <input id="remarkAction" type="text" name="remark" placeholder="Remark" required>
                    <hr>
                    </a>
                    <button type="submit" name="submit">submit</button>
                </form>
            </div>
        </div>
    </div>

</div>