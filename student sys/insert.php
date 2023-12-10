<?php
include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idSend = $_POST['idSend'] ?? '';
    $fnameSend = $_POST['fnameSend'] ?? '';
    $lnameSend = $_POST['lnameSend'] ?? '';
    $emailSend = $_POST['emailSend'] ?? '';
    $citySend = $_POST['citySend'] ?? '';
    $courseSend = $_POST['courseSend'] ?? '';
    $guardianSend = $_POST['guardianSend'] ?? '';
    $subjectsSend = $_POST['subjectsSend'] ?? '';

    $sql = "insert into `manage_students` (sid, firstName, lastName, email, city, course, guardian, subjects) 
            values ('$idSend', '$fnameSend', '$lnameSend', '$emailSend', '$citySend', '$courseSend', '$guardianSend', '$subjectsSend')";

    $result = mysqli_query($con, $sql);
}

?>
