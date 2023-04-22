<div class="generalContainer">
    <div class="registerContainer">
        <div class="registerImg">
            <img src="<?= BASEURL; ?>img/registerPic.png" alt="">
        </div>
        <div class="registerForm">
            <h1>Register</h1>
            <p>register as doctor here</p>
            <form action="<?= BASEURL; ?>Doctors/register" method="POST" enctype="multipart/form-data">

                <?php Flasher::flash3() ?>

                <input type="text" name="firstName" placeholder="First Name" required>

                <input type="text" name="lastName" placeholder="Last Name" required>

                <!-- <div class="usernameFlasher">
                    <p>Your Username Have Been Taken, Please Choose Other Username</p>
                </div> -->
                <input type="text" name="userName" placeholder="User Name" required>

                <input type="email" name="email" placeholder="Email" required>

                <input type="number" name="mobileNumber" placeholder="Mobile" required>


                <select class="registerSelect" id="" name="specialization" required>
                    <option value="action" disabled selected>Select Specialization</option>
                    <option value="Pediatrics">Pediatrics</option>
                    <option value="General Medicine">General Medicine</option>
                    <option value="Orthopedics">Orthopedics</option>
                    <option value="Eye Specialist">Eye Specialist</option>
                </select>
                <select class="registerSelect" id="" name="status" required>
                    <option value="action" disabled selected>Select status</option>
                    <option value="Available">Available</option>
                    <option value="Not Available">Not Available</option>
                </select>

                <input type="password" name="password" placeholder="Password" required>

                <input type="text" name="location" placeholder="Location" required>

                <input type="text" name="code" placeholder="Registration Code" required>

                <input type="text" name="experience" placeholder="Experience" required>

                <input type="file" name="image" placeholder="image" required>

                <a style="display: inline-block;" href="<?= BASEURL; ?>/Doctors/loginPage" class="loginLink">dah login? tekan sini kawan
                    <hr>
                </a>
                <input type="submit" value="submit">
            </form>
        </div>
    </div>
</div>