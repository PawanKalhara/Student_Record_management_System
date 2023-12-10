<?php
include 'connection.php';

if(isset($_POST['updateid'])){
    $user_id=$_POST['updateid'];

    $sql= "Select * from `manage_students` where sid=$user_id";
    $result=mysqli_query($con,$sql);
    $response = array();
    while($row=mysqli_fetch_assoc($result)){
        $response=$row;

    }
    echo json_encode($response);
}else{
    $response['status']=200;
    $response['message']="Invalid or data not found ";
}

//query update
if(isset($_POST['hiddendata'])){
    $uniqueid=$_POST['hiddendata'];
    $sid=$_POST['updatestudentId'];
    $firstName=$_POST['updatefirstName'];
    $lastName=$_POST['updatelastName'];
    $email=$_POST['updateemail'];
    $city=$_POST['updatecity'];
    $course=$_POST['updatecourse'];
    $guardian=$_POST['updateguardian'];
    $subjects=$_POST['updatesubjects'];

    $sql = "Update `manage_students` set sid = ' $sid',firstName = '$firstName', lastName = '$lastName', email = '$email', city = '$city',course = '$course', guardian = '$guardian', subjects = '$subjects' where sid=$uniqueid";
    $result = mysqli_query($con,$sql);

}


?>