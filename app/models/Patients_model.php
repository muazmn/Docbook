<?php
class Patients_model
{
    private $table = 'tempdbappointment';
    private $table2 = 'tbldoctor';
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTempPatients()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }



    public function getDoctorId()
    {
        $specialization = $_SESSION['specialization2'];
        $this->db->query("SELECT ID FROM tbldoctor WHERE Status=:status AND Specialization=:specialization LIMIT 1");
        $this->db->bind('specialization', $specialization);
        $this->db->bind("status", 'Available');
        return $this->db->resultSet();
    }

    public function addTempDataPatients($data)
    {
        $docAppointmentId = $_SESSION['docAppointmentId'];

        $this->db->query("INSERT INTO tempdbappointment(ID, FullName, PhoneNumber, Date, Email, Disease, Time, Speciality, AdditionalMessage,status, id_tbldoctor)VALUES('', :full_name, :phone_number, :date, :email, :disease, :time, :speciality, :additional_message,:status, :id_tbldoctor)");
        $this->db->bind('full_name',  $data["fullName"]);
        $this->db->bind('phone_number',  $data["phoneNumber"]);
        $this->db->bind('date',  $data["date"]);
        $this->db->bind('email',  $data["email"]);
        $this->db->bind('disease',  $data["disease"]);
        $this->db->bind('time',  $data["time"]);
        $this->db->bind('speciality',  $data["specialization"]);
        $this->db->bind('additional_message',  $data["additionalMessage"]);
        $this->db->bind('status',  'Not Updated Yet');
        $this->db->bind('id_tbldoctor', $docAppointmentId);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function addTempDataPatients2($data)
    {
        $id = $_SESSION['idBook'];

        $this->db->query("INSERT INTO tempdbappointment(ID, FullName, PhoneNumber, Date, Email, Disease, Time, Speciality, AdditionalMessage,status, id_tbldoctor)VALUES('', :full_name, :phone_number, :date, :email, :disease, :time, '', :additional_message,:status, :id_tbldoctor)");
        $this->db->bind('full_name',  $data["fullName"]);
        $this->db->bind('phone_number',  $data["phoneNumber"]);
        $this->db->bind('date',  $data["date"]);
        $this->db->bind('email',  $data["email"]);
        $this->db->bind('disease',  $data["disease"]);
        $this->db->bind('time',  $data["time"]);
        $this->db->bind('additional_message',  $data["additionalMessage"]);
        $this->db->bind('status',  'Not Updated Yet');
        $this->db->bind('id_tbldoctor', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updatePatients()
    {
        $status = $_POST['status'];
        $remark = $_POST['remark'];
        $id = $_SESSION['id'];
        $this->db->query("UPDATE tempdbappointment SET 
                          AdditionalMessage = :remark,
                          status = :status
                          WHERE ID = :id");
        $this->db->bind('remark',  $remark, PDO::PARAM_STR);
        $this->db->bind('status',  $status, PDO::PARAM_STR);
        $this->db->bind('id',  $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchAppointment()
    {
        $keyword = $_POST['keyword'];
        $this->db->query("SELECT * FROM tempdbappointment WHERE FullName LIKE :keyword OR PhoneNumber LIKE :keyword");
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
    public function getPatientsByTblDocId()
    {
        $id = $_SESSION['idLogin'];
        $this->db->query("SELECT * FROM tempdbappointment WHERE id_tbldoctor = :id AND status = :status");
        $this->db->bind('id', $id);
        $this->db->bind("status", "Not Updated Yet");
        return $this->db->resultSet();
    }

    public function getPatientsByTblDocId2()
    {
        $id = $_SESSION['idLogin'];
        $this->db->query('SELECT * FROM tempdbappointment WHERE id_tbldoctor = :id AND status = :status LIMIT :2,:totalDataPerPage');
        $this->db->bind("2", $_SESSION['firstData']);
        $this->db->bind("id", $id);
        $this->db->bind("status", "Not Updated Yet");
        $this->db->bind('totalDataPerPage', $_SESSION['totalDataPerPage']);
        return $this->db->resultSet();
    }
    public function getApprovedPatients()
    {
        $id = $_SESSION['idLogin'];
        $this->db->query("SELECT * FROM tempdbappointment WHERE id_tbldoctor = :id AND status = :status");
        $this->db->bind('id', $id);
        $this->db->bind("status", "Approved");
        return $this->db->resultSet();
    }
    public function getApprovedPatients2()
    {
        $id = $_SESSION['idLogin'];
        $this->db->query("SELECT * FROM tempdbappointment WHERE id_tbldoctor = :id AND status = :status LIMIT :2,:totalDataPerPage");
        $this->db->bind('id', $id);
        $this->db->bind("status", "Approved");
        $this->db->bind("2", $_SESSION['firstData']);
        $this->db->bind('totalDataPerPage', $_SESSION['totalDataPerPage']);
        return $this->db->resultSet();
    }
    public function getCancelPatients()
    {
        $id = $_SESSION['idLogin'];
        $this->db->query("SELECT * FROM tempdbappointment WHERE id_tbldoctor = :id AND status = :status");
        $this->db->bind('id', $id);
        $this->db->bind("status", "Not Approved");
        return $this->db->resultSet();
    }

    public function getCancelPatients2()
    {
        $id = $_SESSION['idLogin'];
        $this->db->query('SELECT * FROM tempdbappointment WHERE id_tbldoctor = :id AND status = :status LIMIT :2,:totalDataPerPage');
        $this->db->bind("2", $_SESSION['firstData']);
        $this->db->bind("id", $id);
        $this->db->bind("status", "Not Approved");
        $this->db->bind('totalDataPerPage', $_SESSION['totalDataPerPage']);
        return $this->db->resultSet();
    }
    public function getTodayPatients()
    {
        $id = $_SESSION['idLogin'];
        $today = $_SESSION['todayAppointment'];
        $this->db->query('SELECT * FROM tempdbappointment WHERE id_tbldoctor = :id AND Date = :date');
        $this->db->bind("id", $id);
        $this->db->bind("date", $today);
        // $this->db->bind("date", "2023-04-01");
        return $this->db->resultSet();
    }
    public function getTodayPatients2()
    {
        $id = $_SESSION['idLogin'];
        $today = $_SESSION['todayAppointment'];
        $this->db->query('SELECT * FROM tempdbappointment WHERE id_tbldoctor = :id AND Date = :date LIMIT :2,:totalDataPerPage');
        $this->db->bind("2", $_SESSION['firstData']);
        $this->db->bind("id", $id);
        $this->db->bind("date", $today);
        $this->db->bind('totalDataPerPage', $_SESSION['totalDataPerPage']);
        return $this->db->resultSet();
    }

    public function getIdPatientByDoctorId()
    {
        $id = $_SESSION['idBook'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_tbldoctor = :id AND ID = :patientId");
        $this->db->bind('id', $id);
        $this->db->bind('patientId', $_SESSION['patientCommentId']);
        return $this->db->resultSet();
    }

    public function getPatientName()
    {
        $this->db->query("SELECT FullName FROM " . $this->table . " WHERE FullName = :name");
        $this->db->bind('name', $_SESSION['commentPatientName']);
        return $this->db->resultSet();
    }

    public function insertComment($data)
    {
        $id = $_SESSION['idBook'];

        $this->db->query("INSERT INTO comment(ID, patient_id,patient_name, doctor_id, comment)VALUES('', :patient_id,:patient_name, :doctor_id, :comment)");
        $this->db->bind('patient_id',  $data["patientId"]);
        $this->db->bind('patient_name',  $data["patientName"]);
        $this->db->bind('doctor_id',  $id);
        $this->db->bind('comment',  $data["comment"]);
        $this->db->execute();
        return $this->db->rowCount();
    }
}


// logic bagi appointment form //

// untuk random doctor 
// select id doctor where status = "available" and speciality = "speciality Yg Dipilih Customer"
// use limit mysql statement

// untuk specific doctor 
// id doktor masukkan id yg dikirim melalui URL