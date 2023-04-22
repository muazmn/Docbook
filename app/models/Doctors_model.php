<?php
class Doctors_model
{
    private $table = 'tbldoctor';
    private $table2 = 'comment';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDoctor()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getUsernameDoctor()
    {
        if (!isset($_SESSION['doctorUsername'])) {
            $_SESSION['doctorUsername'] = null;
        }
        $this->db->query("SELECT UserName FROM tbldoctor WHERE UserName = :username");
        $this->db->bind('username',  $_SESSION['doctorUsername']);
        return $this->db->resultSet();
    }
    public function getUsernameDoctor2()
    {
        if (!isset($_SESSION['loginUsername2'])) {
            $_SESSION['loginUsername2'] = null;
        }
        $this->db->query("SELECT UserName FROM tbldoctor WHERE UserName = :username");
        $this->db->bind('username',  $_SESSION['loginUsername2']);
        return $this->db->resultSet();
    }

    public function getPasswordDoctor()
    {
        if (!isset($_SESSION['loginPassword'])) {
            $_SESSION['loginPassword'] = null;
        }
        $this->db->query("SELECT Password FROM tbldoctor WHERE Password = :password");
        $this->db->bind('password',  $_SESSION['loginPassword']);
        return $this->db->resultSet();
    }

    public function addDataDoctor($data)
    {

        $this->db->query("INSERT INTO tbldoctor(ID, FirstName,LastName, UserName, MobileNumber,  Email, Specialization, Password, Experience, Img, CreationDate, Status, Location, Code)VALUES('', :first_name,:last_name, :username, :mobilenumber, :email, :specialization, :password, :experience,:img, '', :status, :location, :code)");
        $this->db->bind('first_name',  $data["firstName"]);
        $this->db->bind('last_name',  $data["lastName"]);
        $this->db->bind('username',  $data["userName"]);
        $this->db->bind('mobilenumber',  $data["mobileNumber"]);
        $this->db->bind('email',  $data['email']);
        $this->db->bind('specialization',  $data["specialization"]);
        $this->db->bind('password',  $data["password"]);
        $this->db->bind('experience',  $data["experience"]);
        $this->db->bind('img',  $_SESSION["image"]);
        $this->db->bind('status',  $data["status"]);
        $this->db->bind('location', $data["location"]);
        $this->db->bind('code', '123');
        // $this->db->query('SET FOREIGN_kEY_CHECKS=1');
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getDoctor($username, $password)
    {
        $this->db->query("SELECT * FROM tbldoctor WHERE Username = :username AND Password=:password");
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        return $this->db->resultSet();
    }

    public function getDoctorById()
    {
        $id = $_SESSION['idLogin'];
        $this->db->query("SELECT * FROM tbldoctor WHERE ID=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function getDoctorById2()
    {
        $id = $_SESSION['idBook'];
        $this->db->query("SELECT * FROM tbldoctor WHERE ID=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getDoctorByCategory1()
    {
        $this->db->query("SELECT * FROM tbldoctor WHERE Specialization = 'General Medicine'");
        return $this->db->resultSet();
    }

    public function getDoctorByCategory2()
    {
        $this->db->query("SELECT * FROM tbldoctor WHERE Specialization = 'Eye Specialist'");
        return $this->db->resultSet();
    }

    public function getDoctorByCategory3()
    {
        $this->db->query("SELECT * FROM tbldoctor WHERE Specialization = 'orthopedics'");
        return $this->db->resultSet();
    }

    public function getDoctorByCategory4()
    {
        $this->db->query("SELECT * FROM tbldoctor WHERE Specialization = 'Pediatrics'");
        return $this->db->resultSet();
    }

    public function searchPatient()
    {
        $patient = $_POST['patient'];
        $id = $_SESSION['idLogin'];

        $this->db->query("SELECT * FROM tempdbappointment WHERE (FullName LIKE :patient OR PhoneNumber LIKE :patient) AND id_tbldoctor = :id");
        $this->db->bind('patient', "%$patient%");
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }
    public function searchPatientByDate()
    {
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];
        $id = $_SESSION['idLogin'];
        $this->db->query("SELECT * FROM tempdbappointment WHERE (Date(Date) BETWEEN :date1 AND :date2) AND id_tbldoctor = :id");
        $this->db->bind('date1', $date1);
        $this->db->bind('date2', $date2);
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }
    public function searchDoctorByName()
    {
        $doctor = $_POST['doctor'];
        $this->db->query("SELECT * FROM tbldoctor WHERE FirstName LIKE :doctor OR LastName LIKE :doctor");
        $this->db->bind('doctor', "%$doctor%");
        return $this->db->resultSet();
    }

    public function updateProfile()
    {
        $id = $_SESSION['idLogin'];
        $username = $_POST['username'];
        $mobileNumber = $_POST['mobileNumber'];
        $email = $_POST['email'];
        $specialization = $_POST['specialization'];
        $password = $_POST['password'];
        $experience = $_POST['experience'];
        $img = $_SESSION['updatedImage'];
        $status = $_POST['status'];
        $location = $_POST['location'];

        $this->db->query("UPDATE tbldoctor set 
        MobileNumber = :mobileNumber,
        UserName = :username,
        Email = :email,
        Specialization = :specialization,
        Password = :password,
        Experience = :experience, 
        Img = :image,
        Status = :status,
        Location = :location
        WHERE ID = :id");
        $this->db->bind('mobileNumber', $mobileNumber);
        $this->db->bind('username', $username);
        $this->db->bind('email', $email);
        $this->db->bind('specialization', $specialization);
        $this->db->bind('password', $password);
        $this->db->bind('experience', $experience);
        $this->db->bind('image', $img);
        $this->db->bind('status', $status);
        $this->db->bind('location', $location);
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function getDoctorComment()
    {
        $this->db->query('SELECT * FROM ' . $this->table2 . ' WHERE doctor_id = :id');
        $this->db->bind('id',  $_SESSION['idBook']);
        return $this->db->resultSet();
    }
}
