<?php
include 'connection.php';

if(isset($_POST['deletesend'])){
    $unique=$_POST['deletesend'];

    $sql="delete from `manage_students`where sid=$unique";
    $result=mysqli_query($con,$sql);
}



?>