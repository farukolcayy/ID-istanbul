<?php

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$educationType = $_POST['educationType'];
$university = $_POST['university'];
$universityDepartment = $_POST['universityDepartmentName'];
$className = $_POST['classNameUni'];
$highSchoolName = $_POST['hsName'];
$highSchoolType = $_POST['hsType'];
$highSchoolClass = $_POST['hsClass'];
$academyOption = $_POST['academyOption'];
$campaign = $_POST['campaign'];
// $privacyOption = $_POST['privacyOption'];

$data = array();

try {
    $conn = new PDO('mysql:host=localhost;dbname=yea_2021-2022;charset=utf8;port=3306', 'yea_yeaonline', 'Ok?2021?.');
    $query = $conn->prepare("INSERT INTO basvuru SET
        name= ?,
        surname= ?,
        emailAddress= ?,
        phoneNumber= ?,	
        educationType= ?,
        universityName= ?,
        departmentName= ?,
        className= ?,
        highSchoolName= ?,
        highSchoolType= ?,
        highSchoolClass= ?,
        academyOption= ?,
        campaign= ?");

    $insert = $query->execute(array($name, $surname, $email, $phoneNumber, $educationType, $university, $universityDepartment, $className, $highSchoolName, $highSchoolType, $highSchoolClass, $academyOption,$campaign));

    if ($insert) {
        $last_id = $conn->lastInsertId();
        $data['status'] = 'ok';
        $data['result'] = $last_id;
        echo json_encode($data);
    } else {
        $data['status'] = 'err';
        $data['result'] = 'Başvuru Başarısız!';
        echo json_encode($data);
    }
} catch (PDOexception $exe) {

    $data['status'] = 'err';
    $data['result'] = $exe->getMessage();
    echo json_encode($data);
}
