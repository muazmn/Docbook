<!-- <div id="myModall" class="modal"> -->

<!-- <div class="modal-container">
        <div class="modal-header"> -->
<!-- <span class="close">&times;</span> -->
<!-- </div> -->
<!-- <div class="modal-content"> -->
<!-- <div class="registerForm modal-form"> -->
<!-- <h1>Take Action</h1>
                <p>take action here</p>
                <form action="<?= BASEURL; ?>Patients/update" method="POST">

                    <select id="" name="status">
                        <option value="action" disabled selected>Select status</option>
                        <option value="Approved">Approved</option>
                        <option value="Not Approved">Not Approved</option>
                    </select>

                    <input type="text" name="remark" placeholder="Remark" required>
                    <hr>
                    </a>
                    <button type="submit" name="submit">submit</button>
                </form> -->
<!-- </div> -->
<!-- </div> -->
<!-- </div> -->
<div class="generalContainer2">
    <div style="width: 100vw; display:grid; justify-content:center;">
        <div class="appointmentFormContainer bookContainer">
            <div class="flashContainer" style="display: flex; width:100%; justify-content: center;">
                <?php Flasher::flash2(); ?>
                <!-- <div class='alert'>
                    succesfully sent, please keep check the result at <a href="<?= BASEURL; ?>Patients/checkAppointment">check appointment</a> page or back to doctor list page <a href="<?= BASEURL; ?>Doctors">here</a>
                </div> -->
            </div>
            <h2>book Dr . <?= $data['doctor']['FirstName']; ?> here </h2>
            <div class="appointmentInputContainer bookInputContainer">
                <form action="<?= BASEURL; ?>Patients/insertTempDataPatients2" method="POST" id="form1">
                    <?php Flasher::flash(); ?>
                    <input type="text" id="Name" name="fullName" placeholder="Your Full name.." required>
                    <input type="number" id="phoneNumber" name="phoneNumber" placeholder="Your Phone Number.." required>
                    <input type="date" id="appointmentDate" name="date" placeholder="Your Appointment Date.." required>
                    <input type="email" id="email" name="email" placeholder="Your Email.." required>
                    <input type="text" id="disease" name="disease" placeholder="Disease" required>
                    <input type="time" id="appointmentTime" name="time" placeholder="Time" required>
                    <textarea name="additionalMessage" id="" rows="5" placeholder="Additional Message" required></textarea>
                    <button type="submit" id="formBtn">Submit</button>
                </form>
            </div>
        </div>
    </div>


</div>

<!-- </div> -->