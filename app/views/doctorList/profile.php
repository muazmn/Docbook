<div class="generalContainer">
    <!-- <div class="allDoctorImg">
        <img src="<?= BASEURL; ?>/img/doctorProfilePicture.png" alt="">
    </div> -->
    <div class="profileContainer">
        <div class="imgGallery">
            <img src="<?= BASEURL; ?>/img/<?= $data['doctor']['Img']; ?>" alt="">
        </div>
        <div class="profileHeader">
            <h2>Dr . <?= $data['doctor']['FirstName']; ?> <?= $data['doctor']['LastName']; ?></h2>
            <p><?= $data['doctor']['Location']; ?></p>
        </div>
        <div class="doctorListBar profileBar">
            <form action="" method="post" class="barForm">
                <a href="" style="text-decoration:underline; color:#4C84C3">My Profile</a>
                <a href="<?= BASEURL; ?>Doctors/reviewPage/<?= $data['doctor']['ID']; ?>">reviews</a>
            </form>
        </div>
        <!-- <div style="margin-top: 60px;"> -->
        <div class="profileInformation">
            <h3>Name:</h3>
            <p><?= $data['doctor']['FirstName']; ?> <?= $data['doctor']['LastName']; ?></p>
        </div>
        <div class="profileInformation">
            <h3>Email:</h3>
            <p><?= $data['doctor']['Email']; ?></p>
        </div>
        <div class="profileInformation profileInformation3">
            <h3>Phone:</h3>
            <p><?= $data['doctor']['MobileNumber']; ?></p>
        </div>
        <div class="profileInformation profileInformation4">
            <h3>Location:</h3>
            <p><?= $data['doctor']['Location']; ?></p>
        </div>
        <div class="profileInformation profileInformation5">
            <h3>Specilization:</h3>
            <p><?= $data['doctor']['Specialization']; ?></p>
        </div>
        <div class="allDoctorBookBtn profileInformation profileBtn">
            <a href="<?= BASEURL; ?>Doctors/bookPage/<?= $data['doctor']['ID']; ?>">Book Now</a>
        </div>
        <!-- </div> -->
    </div>
</div>


<!-- name, email, phone, location, specialization -->