<div class="dashboard-main homeDashboard generalContainer  dashboardProfileRoot " style="margin-left: 130px">
    <div class="dashboardProfileContainer">
        <h1> Your Profile</h1>
        <?php Flasher::flash3() ?>
        <form action="<?= BASEURL; ?>Doctors/updateProfile" method="post" enctype="multipart/form-data">
            <input type="hidden" name="oldImg" value="<?= $data['doctor']['Img']; ?>">
            <label for="">Email</label>
            <input name="email" type="text" value="<?= $data['doctor']['Email']; ?>">

            <label for="">Username</label>
            <input name="username" type="text" value="<?= $data['doctor']['UserName']; ?>">

            <label for="">Phone Number</label>
            <input name="mobileNumber" type="text" value="<?= $data['doctor']['MobileNumber']; ?>">

            <label for="">Password</label>
            <input name="password" type="text" value="<?= $data['doctor']['Password']; ?>">

            <label for="">Location</label>
            <input name="location" type="text" value="<?= $data['doctor']['Location']; ?>">

            <label for="">Experience</label>
            <input name="experience" type="text" value="<?= $data['doctor']['Experience']; ?>">

            <label for="">Image</label>
            <div class="imageProfileContainer">
                <input name="image" type="file" value="<?= $data['doctor']['Img']; ?>">
                <img src="<?= BASEURL; ?>img/<?= $data['doctor']['Img']; ?>" alt="">
            </div>

            <div class="dashboardProfileSelect">
                <div>
                    <label for="">Specialization</label>
                    <select name="specialization" id="dashboardSpecialization">
                        <option value="<?= $data['doctor']['Specialization']; ?>" selected style="display:none;"><?= $data['doctor']['Specialization']; ?></option>
                        <option value="Pediatrics">Pediatrics</option>
                        <option value="General Medicine">General Medicine</option>
                        <option value="Eye Specialist">Eye Specialist</option>
                        <option value="Orthopedics">Orthopedics</option>
                    </select>
                </div>
                <div id="dashboardAvailability">
                    <label for="">Availability</label>
                    <select name="status">
                        <option value="<?= $data['doctor']['Status']; ?>" selected style="display:none;"><?= $data['doctor']['Status']; ?></option>
                        <option value=" Available">Available</option>
                        <option value="Not Available">Not Available</option>
                    </select>
                </div>
            </div>

            <label for="">Registration Date</label>
            <input type="text" value="<?= $data['doctor']['CreationDate']; ?>" disabled>

            <button type="submit" name="submit">Update</button>
        </form>
    </div>
</div>