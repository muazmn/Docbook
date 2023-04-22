<?php

class Doctors extends Controller
{
    public function index($id = 0)
    {

        if (!isset($_POST['doctor'])) {
            $_POST['doctor'] = null;
        }

        $data['title'] = 'Doctor List';

        $data['generalMedicine'] = $this->model('Doctors_model')->getDoctorByCategory1();
        $data['eyeSpecialist'] = $this->model('Doctors_model')->getDoctorByCategory2();
        $data['orthopedics'] = $this->model('Doctors_model')->getDoctorByCategory3();
        $data['pediatrics'] = $this->model('Doctors_model')->getDoctorByCategory4();
        $data['allDoctors'] = $this->model('Doctors_model')->getAllDoctor();

        // $data['result'] =  $this->model('Doctors_model')->searchDoctorByName();
        // $selectOption = $_POST['specialization'];

        if (isset($_REQUEST['specialization'])) {
            if ($_REQUEST['specialization'] == 'all') {
                $data['doctorsList'] = $data['allDoctors'];
                $data['result'] = '<span style="font-weight: 100;">result for</span> "All Doctors"';
            } elseif ($_REQUEST['specialization'] == 'pediatrics') {
                $data['doctorsList'] = $data['pediatrics'];
                $data['result'] = '<span style="font-weight: 100;">result for</span> "Pediatrics"';
            } elseif ($_REQUEST['specialization'] == 'generalMedicine') {
                $data['doctorsList'] = $data['generalMedicine'];
                $data['result'] = '<span style="font-weight: 100;">result for</span> "General Medicine"';
            } elseif ($_REQUEST['specialization'] == 'eyeSpecialist') {
                $data['doctorsList'] = $data['eyeSpecialist'];
                $data['result'] = '<span style="font-weight: 100;">result for</span> "Eye Specialist"';
            } elseif ($_REQUEST['specialization'] == 'orthopedics') {
                $data['doctorsList'] = $data['orthopedics'];
                $data['result'] = '<span style="font-weight: 100;">result for</span> "Orthopedics"';
            }
        } else {
            $data['doctorsList'] = $this->model('Doctors_model')->searchDoctorByName();;
            $data['result'] = "";
        }

        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('doctorList/index', $data);
        $this->view('templates/footer');
    }
    public function bookPage($id = 0)
    {

        $data['title'] = 'Book Doctor';

        $_SESSION['idBook'] = $id;
        $data['doctor'] = $this->model('Doctors_model')->getDoctorById2();

        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('doctorList/book', $data);
        $this->view('templates/footer');
    }
    public function registerPage()
    {

        $data['title'] = "Register";

        $this->view('templates/header', $data);
        $this->view('templates/navbar2');
        $this->view('register/index');
        $this->view('templates/footer');
    }
    public function loginPage()
    {

        $data["title"] = 'Sign in';

        if (isset($_SESSION['login'])) {
            header("Location: " . BASEURL . "Doctors/dashboardPage");
        }
        $this->view('templates/header', $data);
        $this->view('templates/navbar2');
        $this->view('login/index');
        $this->view('templates/footer');
    }
    public function dashboardPage()
    {

        $data['title'] = "Main Dashboard";
        $data['dashboardTitle'] = "Main Dashboard";

        if (!isset($_SESSION['login'])) {
            header("Location: " . BASEURL . "Doctors/loginPage");
        }

        $id = $_SESSION['idLogin'];
        $data['doctor'] = $this->model('Doctors_model')->getDoctorById();
        $data['patientRequest'] = $this->model('Patients_model')->getPatientsByTblDocId();
        $data['patientCancel'] = $this->model('Patients_model')->getCancelPatients();

        $date = date('Y-m-d', time());
        $_SESSION['todayAppointment'] = $date;


        $data['todayPatient'] = $this->model('Patients_model')->getTodayPatients();



        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/dashboardFooter');
    }
    public function requestDashboardPage($id = 1)
    {

        $data['doctor'] = $this->model('Doctors_model')->getDoctorById();
        $data["title"] = "Request Dashboard";
        $data['patientRequest'] = $this->model('Patients_model')->getPatientsByTblDocId();
        $data["dashboardTitle"] = "Appointment Request Dashboard";

        if (!isset($_SESSION['login'])) {
            header("Location: " . BASEURL . "Doctors/loginPage");
        }

        $_SESSION['totalDataPerPage'] = 7;

        // get total data
        $data['totalData'] = count($this->model('Patients_model')->getPatientsByTblDocId());
        $data['totalData2'] = $this->model('Patients_model')->getPatientsByTblDocId();

        // get total page
        $data['totalPage'] = ceil($data['totalData'] / $_SESSION['totalDataPerPage']);

        $_GET['id'] = $id;
        $data['activePage'] = (isset($_GET["id"])) ? $_GET['id'] : 1;

        $data['totalLink'] = 1;
        if ($data['activePage'] > $data['totalLink']) {
            $data["start_number"] = $data['activePage'] - $data['totalLink'];
        } else {
            $data["start_number"] = 1;
        }
        if ($data['activePage'] < ($data["totalPage"] - $data["totalLink"]) && $data['activePage'] > 1) { //5
            $data['end_number'] = $data["activePage"] + $data["totalLink"];
        } else {
            $data["end_number"] = $data["totalPage"];
        }

        $data['firstData'] = ($_SESSION['totalDataPerPage'] * $data['activePage']) - $_SESSION['totalDataPerPage'];
        $_SESSION['firstData'] = $data['firstData'];


        $data['patientRequest'] = $this->model('Patients_model')->getPatientsByTblDocId2();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/request', $data);
        $this->view('templates/dashboardFooter');
    }
    public function approvedDashboardPage($id = 1)
    {
        $data['title'] = 'Approved Page';
        $data['dashboardTitle'] = 'Approved Appointment Dashboard';
        $data['doctor'] = $this->model('Doctors_model')->getDoctorById();
        $data['patientApprove'] = $this->model('Patients_model')->getApprovedPatients();
        if (!isset($_SESSION['login'])) {
            header("Location: " . BASEURL . "Doctors/loginPage");
        }

        // get total data
        $data['totalData'] = count($this->model('Patients_model')->getApprovedPatients());

        // get total page
        $data['totalPage'] = ceil($data['totalData'] / $_SESSION['totalDataPerPage']);

        $_GET['id'] = $id;
        $data['activePage'] = (isset($_GET["id"])) ? $_GET['id'] : 1;

        $data['totalLink'] = 1;
        if ($data['activePage'] > $data['totalLink']) {
            $data["start_number"] = $data['activePage'] - $data['totalLink'];
        } else {
            $data["start_number"] = 1;
        }
        if ($data['activePage'] < ($data["totalPage"] - $data["totalLink"]) && $data['activePage'] > 1) { //5
            $data['end_number'] = $data["activePage"] + $data["totalLink"];
            // } elseif ($data['halamanAktif'] == 1) {
            //     $data["end_number"] = $data['halamanAktif'] + 2;
            //
        } else {
            $data["end_number"] = $data["totalPage"];
            // $data["start_number"] = $data["jmlahHalaman"] - 2;
        }

        $data['firstData'] = ($_SESSION['totalDataPerPage'] * $data['activePage']) - $_SESSION['totalDataPerPage'];
        $_SESSION['firstData'] = $data['firstData'];
        $data['patientCancel'] = $this->model('Patients_model')->getApprovedPatients2();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/approve', $data);
        $this->view('templates/dashboardFooter');
    }
    public function cancelDashboardPage($id = 1)
    {

        $data["title"] = "Cancel Dashboard";
        $data['dashboardTitle'] = "Cancelled Appointment Dashboard";
        $data['doctor'] = $this->model('Doctors_model')->getDoctorById();

        if (!isset($_SESSION['login'])) {
            header("Location: " . BASEURL . "Doctors/loginPage");
        }

        $_SESSION['totalDataPerPage'] = 7;

        // get total data
        $data['totalData'] = count($this->model('Patients_model')->getCancelPatients());

        // get total page
        $data['totalPage'] = ceil($data['totalData'] / $_SESSION['totalDataPerPage']);

        $_GET['id'] = $id;
        $data['activePage'] = (isset($_GET["id"])) ? $_GET['id'] : 1;

        $data['totalLink'] = 1;
        if ($data['activePage'] > $data['totalLink']) {
            $data["start_number"] = $data['activePage'] - $data['totalLink'];
        } else {
            $data["start_number"] = 1;
        }
        if ($data['activePage'] < ($data["totalPage"] - $data["totalLink"]) && $data['activePage'] > 1) { //5
            $data['end_number'] = $data["activePage"] + $data["totalLink"];
            // } elseif ($data['halamanAktif'] == 1) {
            //     $data["end_number"] = $data['halamanAktif'] + 2;
            //
        } else {
            $data["end_number"] = $data["totalPage"];
            // $data["start_number"] = $data["jmlahHalaman"] - 2;
        }

        $data['firstData'] = ($_SESSION['totalDataPerPage'] * $data['activePage']) - $_SESSION['totalDataPerPage'];
        $_SESSION['firstData'] = $data['firstData'];
        $data['patientCancel'] = $this->model('Patients_model')->getCancelPatients2();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/cancel', $data);
        $this->view('templates/dashboardFooter');
    }
    public function todayDashboardPage($id = 1)
    {
        $data["title"] = "Today Dashboard";
        $data['dashboardTitle'] = "Today Appointment Dashboard";
        $data['doctor'] = $this->model('Doctors_model')->getDoctorById();

        if (!isset($_SESSION['login'])) {
            header("Location: " . BASEURL . "Doctors/loginPage");
        }

        $_SESSION['totalDataPerPage'] = 3;

        // get total data
        $data['totalData'] = count($this->model('Patients_model')->getCancelPatients());

        // get total page
        $data['totalPage'] = ceil($data['totalData'] / $_SESSION['totalDataPerPage']);

        $_GET['id'] = $id;
        $data['activePage'] = (isset($_GET["id"])) ? $_GET['id'] : 1;

        $data['totalLink'] = 1;
        if ($data['activePage'] > $data['totalLink']) {
            $data["start_number"] = $data['activePage'] - $data['totalLink'];
        } else {
            $data["start_number"] = 1;
        }
        if ($data['activePage'] < ($data["totalPage"] - $data["totalLink"]) && $data['activePage'] > 1) { //5
            $data['end_number'] = $data["activePage"] + $data["totalLink"];
        } else {
            $data["end_number"] = $data["totalPage"];
        }
        $_SESSION['active_page'] = $data['activePage'];
        $_SESSION['end_number'] = $data['end_number'];
        $_SESSION['start_number'] = $data['start_number'];
        $_SESSION['totalPage'] = $data['totalPage'];

        $data['firstData'] = ($_SESSION['totalDataPerPage'] * $data['activePage']) - $_SESSION['totalDataPerPage'];
        $_SESSION['firstData'] = $data['firstData'];
        $data['patientToday'] = $this->model('Patients_model')->getTodayPatients2();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/today', $data);
        $this->view('templates/dashboardFooter');
    }
    public function searchDashboardPage($id = 1)
    {

        $data["title"] = "Search Dashboard";
        $data['dashboardTitle'] = "Search Dashboard Page";
        $data['doctor'] = $this->model('Doctors_model')->getDoctorById();

        if (!isset($_SESSION['login'])) {
            header("Location: " . BASEURL . "Doctors/loginPage");
        }

        if (!isset($_POST['patient'])) {
            $_POST['patient'] = null;
        }

        // $data['patient'] = $this->model('patients_model')->getAllTempPatients();
        $data['patient'] = $this->model('Doctors_model')->searchPatient();
        if (isset($_POST["submit"]) && $_POST['patient'] == null) {
            $_POST['patient'] = null;
            Flasher::setFlash("please insert keyword first!");
        }
        if ($_POST['patient'] == null) {
            Flasher::setFlash("please insert keyword first!");
        }

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/search', $data);
        $this->view('templates/dashboardFooter');
    }
    public function reportDashboardPage()
    {
        $data["title"] = "Report Page";
        $data['dashboardTitle'] = "Report Appointment Page";
        $data['doctor'] = $this->model('Doctors_model')->getDoctorById();

        if (!isset($_SESSION['login'])) {
            header("Location: " . BASEURL . "Doctors/loginPage");
        }


        if (!isset($_POST['date1'])) {
            $_POST['date1'] = null;
        }
        if (!isset($_POST['date2'])) {
            $_POST['date2'] = null;
        }
        // var_dump(($_POST['keyword']));

        // $data['patient'] = $this->model('patients_model')->getAllTempPatients();
        $data['patient'] = $this->model('Doctors_model')->searchPatientByDate();
        if (isset($_POST["submit"]) && ($_POST['date1'] == null || $_POST['date2'] == null)) {
            $_POST['date1'] = null;
            $_POST['date2'] = null;
            Flasher::setFlash("please insert date at two column above!");
        } elseif ($_POST['date1'] == null && $_POST['date1'] == null) {
            Flasher::setFlash("please insert date at two column above!");
        }


        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/report', $data);
        $this->view('templates/dashboardFooter');
    }
    public function logoutDashboardPage()
    {
        $this->view('templates/header');
        $this->view('templates/sidebar');
        $this->view('dashboard/logout');
        $this->view('templates/dashboardFooter');
    }
    public function profilePage($id = 0)
    {
        $_SESSION['idBook'] = $id;
        $data['title'] = "Profile";
        $data['doctor'] = $this->model('Doctors_model')->getDoctorById2();

        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('doctorList/profile', $data);
        $this->view('templates/footer');
    }
    public function reviewPage($id = 0)
    {
        $_SESSION['idBook'] = $id;

        $data['doctor'] = $this->model('Doctors_model')->getDoctorById2();
        $data['comment'] = $this->model('Doctors_model')->getDoctorComment();

        $data['title'] = "review";

        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('doctorList/review', $data);
        $this->view('templates/reviewFooter');
    }
    public function commentPage()
    {
        $data['title'] = 'Comment Page';
        // $data['patients'] = $this->model('Patients_model')->getIdPatientByDoctorId();
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('doctorList/comment');
        $this->view('templates/footer');
    }
    public function updateProfilePage()
    {
        $data['title'] = 'Profile Page';
        $data['dashboardTitle'] = "Update Profile Page";


        if (!isset($_SESSION['login'])) {
            header("Location: " . BASEURL . "Doctors/loginPage");
        }

        $data['doctor'] = $this->model('Doctors_model')->getDoctorById();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/profile', $data);
        $this->view('templates/dashboardFooter');
    }
    public function register()
    {

        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $tmpFile = $_FILES['image']['tmp_name'];

        // check the uploaded img is in jpg, jpeg and png format
        $imgFileValidation = ['jpg', 'jpeg', 'png'];
        $imgExtension = explode('.', $fileName);
        $imgExtension = strtolower(end($imgExtension));

        if (!in_array($imgExtension, $imgFileValidation)) {
            Flasher::setFlash('<div class="usernameFlasher">
                <p>Please insert Image with Format jpg, jpeg, png</p>
            </div>');
            // echo "<script>alert('Please insert Image with Format jpg, jpeg, png')</script>";
            header("Location: " . BASEURL . "Doctors/registerPage");
            return false;
        }
        // check if the size of image oversize
        if ($fileSize > 2000000) {
            Flasher::setFlash('<div class="usernameFlasher">
                <p>Please insert Image with size below 2MB</p>
            </div>');
            return false;
        }
        // if the image success uploaded
        // handle problem if the image name is same 
        $newFileName = uniqid();
        $newFileName .= '.';
        $newFileName .= $imgExtension;
        move_uploaded_file($tmpFile, "img/" . $newFileName);

        $_SESSION['image'] = $newFileName;

        $data['doctorUsername'] = $this->model('Doctors_model')->getUsernameDoctor();
        $data['allDoctorsList'] = $this->model('Doctors_model')->getAllDoctor();

        $_SESSION['doctorUsername'] = $_POST['userName'];
        if ($this->model('Doctors_model')->getUsernameDoctor()) {
            Flasher::setFlash('<div class="usernameFlasher">
                <p>Your Username Have Been Taken, Please Choose Other Username</p>
            </div>');
            header('Location: ' . BASEURL . '/Doctors/registerPage');
            exit;
        }
        if ($_POST['code'] != "123") {
            Flasher::setFlash('<div class="usernameFlasher">
                <p>Please Insert Valid Code, You Can Get It From Your Admin</p>
            </div>');
            header('Location: ' . BASEURL . '/Doctors/registerPage');
            exit;
        }
        if ($this->model('Doctors_model')->addDataDoctor($_POST) > 0) {
            header('Location: ' . BASEURL . '/Doctors/loginPage');
            exit;
        }
    }
    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $_SESSION['loginUsername2'] = $username;
        $_SESSION['loginPassword'] = $password;

        if (!$this->model('Doctors_model')->getPasswordDoctor() && !$this->model('Doctors_model')->getUsernameDoctor2()) {
            Flasher::setFlash('<div class="usernameFlasher">
            <p>Please Insert Correct Username And Password</p>
        </div>');
            header('Location: ' . BASEURL . 'Doctors/loginPage');
            exit;
        }

        $data['login'] = $this->model('Doctors_model')->getDoctor($username, $password);
        // $data['login'] = $this->model('Doctors_model')->getPasswordDoctor();

        if (!$this->model('Doctors_model')->getUsernameDoctor2()) {
            Flasher::setFlash('<div class="usernameFlasher">
            <p>Please Insert Correct Username</p>
        </div>');
            header('Location: ' . BASEURL . 'Doctors/loginPage');
            exit;
        }
        if (!$this->model('Doctors_model')->getPasswordDoctor()) {
            Flasher::setFlash('<div class="usernameFlasher">
            <p>Please Insert Correct Password</p>
            </div>');
            header('Location: ' . BASEURL . 'Doctors/loginPage');
            exit;
        }


        foreach ($data['login'] as $row) :
            if ($row['UserName'] != $username) {
                Flasher::setFlash("I wanna eat");
                header("Location: " . BASEURL . "Doctors/loginPage");
            }
            $_SESSION['login'] = true;
            $_SESSION['idLogin'] = $row['ID'];
            header("Location: " . BASEURL . "Doctors/dashboardPage");
            exit;
        endforeach;
    }
    public function logout()
    {
        unset($_SESSION['login']);
        unset($_SESSION['email']);
        unset($_SESSION['id']);

        header("Location:" . BASEURL . "Home");
        exit;
    }
    public function updateProfile()
    {
        $data['doctor'] = $this->model('Doctors_model')->getDoctorById();

        if (!isset($_SESSION['login'])) {
            header("Location: " . BASEURL . "Doctors/loginPage");
        }
        // if user not update new picture
        if ($_FILES['image']['error'] === 4) {
            // $_SESSION['updatedImg'] = $oldImg;
            $_SESSION['updatedImage'] = $data['doctor']['Img'];
        } else {

            $fileName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            $tmpFile = $_FILES['image']['tmp_name'];

            // check the uploaded img is in jpg, jpeg and png format
            $imgFileValidation = ['jpg', 'jpeg', 'png'];
            $imgExtension = explode('.', $fileName);
            $imgExtension = strtolower(end($imgExtension));

            if (!in_array($imgExtension, $imgFileValidation)) {
                Flasher::setFlash("<div class='profileAlertContainer2'><p>Please Insert Image With Format jpg, jpeg, png</p></div>");
                header("Location:" . BASEURL . "Doctors/updateProfilePage");
                return false;
            }
            // check if the size of image oversize
            if ($fileSize > 9000000) {
                Flasher::setFlash("<div class='profileAlertContainer2'><p>Please Insert Image below 9MB</p></div>");
                header("Location:" . BASEURL . "Doctors/updateProfilePage");
                return false;
            }
            // if the image success uploaded
            // handle problem if the image name is same 
            $newFileName = uniqid();
            $newFileName .= '.';
            $newFileName .= $imgExtension;
            move_uploaded_file($tmpFile, "img/" . $newFileName);

            $fileName = $newFileName;
            $_SESSION['updatedImage'] = $fileName;
        }

        if ($this->model('Doctors_model')->updateProfile($_POST) > 0) {
            var_dump($_POST['location']);

            Flasher::setFlash("<div class='profileAlertContainer'><p>Data Updated Successfully, return to main dashboard page <a class='profileReturnLink' href='" . BASEURL . "Doctors/dashboardPage'>here..</a></p></div>");

            header("Location:" . BASEURL . "Doctors/updateProfilePage");
            exit;
        }
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/profile', $data);
        $this->view('templates/dashboardFooter');
    }
}
