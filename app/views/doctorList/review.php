<div class="generalContainer">
    <div class="profileContainer reviewContainer">
        <div class="imgContainer">
            <div class="imgGallery">
                <img src="<?= BASEURL; ?>/img/<?= $data['doctor']['Img']; ?>" alt="">
            </div>
        </div>
        <div class="profileHeader reviewHeader">
            <h2>Dr . <?= $data['doctor']['FirstName']; ?> <?= $data['doctor']['LastName']; ?></h2>
            <p><?= $data['doctor']['Location']; ?></p>
        </div>
        <div class="doctorListBar profileBar reviewBar">
            <form action="" method="post" class="barForm">
                <a href="<?= BASEURL; ?>Doctors/profilePage/<?= $data['doctor']['ID']; ?>">My Profile</a>
                <a href="" style="text-decoration:underline; color:#4C84C3">reviews</a>
            </form>
        </div>
        <div class="allDoctorBookBtn profileInformation profileBtn commentBtn">
            <a href="<?= BASEURL; ?>Doctors/commentPage/<?= $data['doctor']['ID']; ?>">Comment Here</a>
        </div>
        <?php if (sizeof($data['comment']) > 0) { ?>
            <div class="profileInformation commentSection">
                <div class="commentSlider">
                    <a class="prev" onclick="plusSlides(-2)">&#10094; Previous</a>
                    <a class="next" onclick="plusSlides(2)">Next &#10095;</a>
                </div>





                <div class="slideshow-container">

                    <!-- Full-width slides/quotes -->
                    <?php foreach ($data['comment'] as $key => $data) : ?>
                        <div class="mySlides">
                            <h2 class="commentName"><?= $data['patient_name']; ?></h2>
                            <p><span style="color: black;"><?= $key + 1; ?>.</span> <?= $data['comment']; ?></p>
                            <p class="author">- <?= $data['patient_name']; ?></p>
                        </div>
                    <?php endforeach ?>
                </div>

            </div>
        <?php } else { ?>
        <?php } ?>

    </div>
</div>