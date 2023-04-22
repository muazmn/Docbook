<nav>
    <ul class="menu">
        <a href="<?= BASEURL; ?>Home" <li class="logo navbar2Home"><img src="https://icon-master.com/i/Hospital/4C84C3" alt=""></li></a>
        <li class="item searchLi">
            <form action="<?= BASEURL; ?>Doctors/" method="post">
                <div class="search-root">
                    <div class="search-container">
                        <button class="searchBtnNav" type="submit">
                            <i class='fas fa-search fa-xs' style='color:#4c84c3'></i>
                        </button>
                        <input type="text" placeholder="Search for doctor's name..." name="doctor">
                    </div>
                </div>
            </form>
        </li>
        <li class="item"><a href="<?= BASEURL; ?>Home/">Home</a></li>
        <li class="item"><a href="<?= BASEURL; ?>Doctors/">All Doctors</a></li>
        <li class="item"><a href="<?= BASEURL; ?>Patients/checkAppointment">Check Appointment</a></li>
        <li class="item"><a href="<?= BASEURL; ?>Doctors/loginPage">Doctor</a></li>
        <li class="toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
    </ul>
</nav>