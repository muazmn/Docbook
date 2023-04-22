<?php
class Patients extends Controller
{
    public function index()
    {

        $data['title'] = "Home";
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('home/index');
        $this->view('templates/footer');
    }
    public function updatePage($id = 1)
    {
        $_SESSION['id'] = $id;
        $data['dashboardTitle'] = "Action Page";
        $data['doctor'] = $this->model('Doctors_model')->getDoctorById();
        $data['title'] = "Action Page";
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('dashboard/appointmentUpdate');
        $this->view('templates/dashboardFooter');
    }
    public function insertTmpDataPatients()
    {

        $_SESSION["specialization2"] = $_POST['specialization'];
        $data["docAppointmentId"] = $this->model('Patients_model')->getDoctorId()[0];


        //  Date
        $specificDate = date("m/d/y", strtotime("+2 days"));
        $chosenDate = $_POST['date'];
        $chosenDate2 = date("m/d/y", strtotime($chosenDate));

        // Time 
        // $chosenTime = $_POST['appointmentTime'];
        $chosenTime = strtotime($_POST['time']);
        $chosenTime1 = date('H:i', $chosenTime);

        $timeValidation = strtotime('10:30am');
        $timeValidation1 = date('H:i', $timeValidation);

        $timeValidation_ = strtotime('7:30pm');
        $timeValidation2 = date('H:i', $timeValidation_);

        if ($chosenDate2 < $specificDate) {
            Flasher::setFlash('please insert date 2 days from now and above');
            header("Location:" . BASEURL . "Patients");
            return false;
        }
        if ($chosenTime1 < $timeValidation1 || $chosenTime1 > $timeValidation2) {
            Flasher::setFlash('please insert time betweeen 10:30am to 7:30pm');
            header("Location:" . BASEURL . "Patients");
            return false;
        }

        if ($this->model('Patients_model')->addTempDataPatients($_POST) > 0) {

            Flasher::setFlash('Your Request Successfully Sent');
            header("Location:" . BASEURL . "Patients");
        }
        // header("Location:" . BASEURL . "Patients");
    }
    public function insertTempDataPatients2()
    {


        //  Date
        $specificDate = date("m/d/y", strtotime("+2 days"));
        $chosenDate = $_POST['date'];
        $chosenDate2 = date("m/d/y", strtotime($chosenDate));

        // Time 
        // $chosenTime = $_POST['appointmentTime'];
        $chosenTime = strtotime($_POST['time']);
        $chosenTime1 = date('H:i', $chosenTime);

        $timeValidation = strtotime('10:30am');
        $timeValidation1 = date('H:i', $timeValidation);

        $timeValidation_ = strtotime('7:30pm');
        $timeValidation2 = date('H:i', $timeValidation_);

        if ($chosenDate2 < $specificDate) {
            Flasher::setFlash('please insert date 2 days from now or above');
            header("Location:" . BASEURL . "Doctors/bookPage/" . $_SESSION['idBook']);
            return false;
        }
        if ($chosenTime1 < $timeValidation1 || $chosenTime1 > $timeValidation2) {
            Flasher::setFlash('please insert time betweeen 10:30am to 7:30pm');
            header("Location:" . BASEURL . "Doctors/bookPage/" . $_SESSION['idBook']);
            return false;
        }

        if ($this->model('Patients_model')->addTempDataPatients2($_POST) > 0) {
            Flasher::setFlash('succesfully sent, please keep check the result at <a href=' . BASEURL . 'Patients/checkAppointment>check appointment</a> page or back to doctor list page <a href=' . BASEURL . 'Doctors>here</a>');
            header("Location:" . BASEURL . "Doctors/bookPage/" . $_SESSION['idBook']);
            exit;
        }
    }

    public function update()
    {

        // echo $_POST['remark'];
        // echo "<br>";
        // echo $_SESSION['id'];
        // $data['updatePatients'] = $this->model('Patients_model')->updatePatients();

        // echo "<br>";
        // var_dump($data['updatePatients']);
        // echo "<br>";
        // echo $_POST['status'];

        if ($this->model('Patients_model')->updatePatients($_POST) > 0) {
            Flasher::setFlash("<div class='actionAlertContainer'><p>Data Updated Successfully, return to main dashboard page <a class='profileReturnLink' href='" . BASEURL . "Doctors/dashboardPage/" . $_SESSION['idLogin'] . "'>here..</a></p></div>");

            header("Location:" . BASEURL . "Patients/updatePage/" . $_SESSION['id']);
        };
    }

    public function messageSuccess()
    {
        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('doctorList/success');
        $this->view('templates/footer');
    }

    public function checkAppointment()
    {
        $data["title"] = 'Search Record';

        if (!isset($_POST['keyword'])) {
            $_POST['keyword'] = null;
        }
        // var_dump(($_POST['keyword']));

        // $data['patient'] = $this->model('patients_model')->getAllTempPatients();
        $data['patient'] = $this->model('Patients_model')->searchAppointment();
        if (isset($_POST["submit"]) && $_POST['keyword'] == null) {
            $_POST['keyword'] = null;
            Flasher::setFlash("please insert keyword first!");
        }
        if ($_POST['keyword'] == null) {
            Flasher::setFlash("please insert keyword first!");
        }
        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('appointment/index', $data);
        $this->view('templates/footer');
    }

    public function comment()
    {

        $_SESSION['patientCommentId'] = $_POST['patientId'];
        $_SESSION['commentPatientName'] = $_POST['patientName'];

        $data['patient'] = $this->model('Patients_model')->getPatientName();
        if (!$this->model('Patients_model')->getPatientName()) {
            Flasher::setFlash('<div class="commentFlasher">
                 <p>please use the name you have entered when filling out the appointment form.</p>
             </div>');
            header('location: ' . BASEURL . "Doctors/commentPage/" . $_SESSION['idBook']);
            return false;
        }
        // die;
        if (!$this->model('Patients_model')->getIdPatientByDoctorId()) {
            Flasher::setFlash('<div class="commentFlasher">
            <p>Only Patient that made an appointment to this doctor can comment here, you can see your Id at check Appointment <a href="' . BASEURL . 'Patients/checkAppointment">Page</a> if you forgot....</p>
        </div>');
            header('location: ' . BASEURL . "Doctors/commentPage/" . $_SESSION['idBook']);
            return false;
        }


        if ($this->model('Patients_model')->insertComment($_POST) > 0) {
            Flasher::setFlash("<div class='commentFlasher'>
                 <p>your comment successfully sent, back to doctor's profle page <a href='" . BASEURL . "Doctors/reviewPage/" . $_SESSION['idBook'] . "'>here</a></p>
             </div>");
            header('location: ' . BASEURL . "Doctors/commentPage/" . $_SESSION['idBook']);
            exit;
        }
    }
}

// comment flow
// 1 . only patient with related doctor can comment 
// 2 . just patient with approved status can comment, we check this with inserted id by the patient.....