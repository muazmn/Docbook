<!-- ! - background image section - -->

<div class="backgroundImgContainer">
    <img src="http://localhost:8080/legum/Docbook/public/img/homeBackground.jpg" alt="">
    <div class="imgTxt">
        <h1>Instant Consultation With Trusted Doctors</h1>
    </div>
</div>
<div style="position: relative;"></div>



<!-- * ! speciality section -->
<div class="specialityContainer">
    <div class="specialityTxt">
        <h1>Our Speciality</h1>
        <p>Private online consultations with verified doctors in all specialists</p>
    </div>
    <div class="specialityGallery">
        <div class="imageSpeciality">
            <figure>
                <img src="http://localhost:8080/legum/Docbook/public/img/specialityImg1.png" alt="">
                <figcaption>
                    Pediatrics
                </figcaption>
            </figure>
        </div>
        <div class="imageSpeciality">
            <figure>
                <img src="http://localhost:8080/legum/Docbook/public/img/specialityImg2.png" alt="">
                <figcaption>
                    General Medecine
                </figcaption>
            </figure>
        </div>
        <div class="imageSpeciality">
            <figure>
                <img src="http://localhost:8080/legum/Docbook/public/img/specialityImg3.png" alt="">
                <figcaption>
                    Orthopedics
                </figcaption>
            </figure>
        </div>
        <div class="imageSpeciality">
            <figure>
                <img src="<?= BASEURL; ?>img/specialityImg4.png" alt="">
                <figcaption>
                    Eye Specialist
                </figcaption>
            </figure>
        </div>
    </div>
</div>

<!-- Question Section -->
<div class="questionContainer">
    <div class="questionTitle">
        <h1>Why Docbook?</h1>
        <p>Docbook provide solution to patients so that they're can make reservation more easier</p>
    </div>
    <div class="questionDescription">
        <img src="http://localhost:8080/legum/Docbook/public/img/doctorQuestion.png" alt="">
        <div class="answer">
            <h1>Curated Doctors</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime ducimus atque ipsum impedit id deserunt eos facilis incidunt error sapiente, eum dolores, necessitatibus ipsam nihil earum sequi quibusdam? Est unde facilis magnam, aliquam voluptates explicabo suscipit voluptatem praesentium, a voluptas numquam delectus quidem,.</p>
        </div>
    </div>
</div>


<!-- Appointment form section -->
<div class="appointmentFormContainer">
    <h2>Book An Appointment</h2>
    <?php Flasher::flash(); ?>
    <!-- <input type="text" name="" class="appointmentFlasher" id="appointmentFlasher" placeholder="please insert appointment date 2 days from today"> -->
    <div class="appointmentInputContainer">
        <form action="<?= BASEURL; ?>Patients/insertTmpDataPatients" method="POST" id="form1">
            <input type="text" id="Name" name="fullName" placeholder="Your Full name.." required>
            <input type="number" id="phoneNumber" name="phoneNumber" placeholder="Your Phone Number.." required>
            <input type="date" id="appointmentDate" name="date" placeholder="Your Appointment Date.." required>
            <input type="email" id="email" name="email" placeholder="Your Email.." required>
            <input type="text" id="disease" name="disease" placeholder="Disease" required>
            <input type="time" id="appointmentTime" name="time" placeholder="Time" required>

            <select id="specialization" name="specialization">
                <option value="selectSpeciality" disabled selected>Select Speciality</option>
                <option value="Pediatrics">Pediatrics</option>
                <option value="General Medicine">General Medicine</option>
                <option value="Eye Specialist">Eye specialist</option>
                <option value="Orthopedics">orthopedics</option>
            </select>
            <textarea name="additionalMessage" id="" rows="5" placeholder="Additional Message" required></textarea>
            <button type="submit" id="formBtn">Submit</button>
        </form>
    </div>
</div>

<!-- Feedback Section -->
<!-- <div class="feedbackContainer">
    <h1>What our user say about us</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    <div class="commentSection">
        <button class="arrowComment1">
            <i class="fas fa-arrow-circle-left"></i> </button>
        <div class="innerCommentSection">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure incidunt qui quod officiis laborum vero ipsum veritatis nobis iusto consequuntur eius illum nulla quos alias, velit sapiente eligendi fugit ipsam eaque? Nemo culpa ullam esse, rem quia atque dolor fuga minus quis libero eos vel, quam in consectetur cumque fugiat.</p>
        </div>
        <button class="arrowComment2">
            <i class="fas fa-arrow-circle-right"></i> </button>
    </div>
</div> -->