<?php

$email = $_POST['email'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$musicType = $_POST['musicType'];
$personelType = $_POST['personelType'];
$personelTypeOther = $_POST['personelTypeOther'];
$request = $_POST['request'];

$data = array();

try {
    $conn = new PDO('mysql:host=localhost;dbname=u0239934_id-istanbul;charset=utf8;port=3306', 
    'u0239934_id-istanbul','?id2021?id');
    $query = $conn->prepare("INSERT INTO basvuru SET
        email= ?,
        name= ?,
        surname= ?,
        musicType= ?,	
        personelType= ?,
        personelTypeOther= ?,
        request= ?");

    $insert = $query->execute(array($email, $name, $surname, $musicType, $personelType, $personelTypeOther,$request));

    if ($insert) {
        $last_id = $conn->lastInsertId();
        $data['status'] = 'ok';
        $data['result'] = $last_id;
        echo json_encode($data);
    } else {
        $data['status'] = 'err';
        $data['result'] = 'Kayıt başarısız!';
        echo json_encode($data);
    }
} catch (PDOexception $exe) {

    $data['status'] = 'err';
    $data['result'] = $exe->getMessage();
    echo json_encode($data);
}
