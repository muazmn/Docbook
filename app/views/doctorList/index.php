<div class="generalContainer">


    <div class="allDoctorContainer">
        <h2><?= $data['result']; ?></h2>
        <div class="doctorListBar">
            <form action="" method="post">
                <select id="specialization" name="specialization" aria-placeholder="select speciality" onchange="this.form.submit()">
                    <option id="select" value=" select" disabled selected>Select Speciality</option>
                    <option id="all" value="all">All Doctors</option>
                    <option id="pediatrics" value="pediatrics">Pediatrics</option>
                    <option id="generalMedicine" value="generalMedicine">General Medicine</option>
                    <option id="eyeSpecialist" value="eyeSpecialist">Eye specialist</option>
                    <option id="orthopedics" value="orthopedics">orthopedics</option>
                </select>
            </form>
            <!-- </form> -->
        </div>
        <!-- <input type="text" name="" id="appointmentFlasher" placeholder="' . $_SESSION['flash']['message'] . '" disabled> -->
        <?php foreach ($data['doctorsList'] as $data) : ?>
            <div class="allDoctorLists">
                <div class="allDoctorImg">
                    <img src="<?= BASEURL; ?>/img/<?= $data['Img']; ?>" alt="">
                </div>
                <div class="doctorGeneralInformation">

                    <a href="<?= BASEURL; ?>Doctors/profilePage/<?= $data['ID']; ?>">
                        <h1><?= $data['FirstName']; ?></h1>
                    </a>
                    <button class="availability"><?= $data['Status']; ?></button>


                    <div class="generalInformation">
                        <?php $_SESSION['specialization'] = $data['Specialization'] ?>
                        <a href="<?= BASEURL; ?>Doctors/profilePage/<?= $data['ID']; ?>">
                            <h2><?= $data['Specialization']; ?></h2>
                        </a>
                        <p><?= $data['Experience']; ?></p>
                        <br>
                        <p><?= $data['Location']; ?></p>
                    </div>
                </div>
                <div class="allDoctorBookBtn">
                    <a href="<?= BASEURL; ?>Doctors/bookPage/<?= $data['ID']; ?>">Book Now</a>
                </div>
            </div>
            <div class="allDocListLine">
                <hr>
            </div>

        <?php endforeach ?>
    </div>
</div>