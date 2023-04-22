<div class="generalContainer">
    <div class="signInContainer">
        <div class="signInImg">
            <img src="<?= BASEURL; ?>img/signInPic.png" alt="">
        </div>
        <div class="signInForm">
            <h1>Sign In</h1>
            <p>sign as doctor here</p>
            <form action="<?= BASEURL; ?>Doctors/login" method="POST">
                <?php Flasher::flash3() ?>
                <label for="fname" style="display: block;">Username</label>
                <input type="text" id="fname" name="username" placeholder="Usename" required>
                <label for="password" style="display: inline-block;">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <a href="<?= BASEURL; ?>/Doctors/registerPage" class="registerLink">register here
                    <hr>
                </a>
                <div class="loginBtn">
                    <button type="submit" name="login">sign in</button>
                </div>
            </form>
        </div>
    </div>
</div>