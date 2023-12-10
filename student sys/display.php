<?php
include 'connection.php';

if (isset($_POST['displaySend'] )){
    $table ='<table class="table caption-top">
    <caption>List of users</caption>
    <thead>
      <tr>
        <th scope="col">SID</th>
        <th scope="col">First </th>
        <th scope="col">Last </th>
        <th scope="col">Email</th>
        <th scope="col">Near City</th>
        <th scope="col">Course</th>
        <th scope="col">Guardian</th>
        <th scope="col">Subjects</th>
        <th scope="col">Operations</th>
      </tr>
    </thead>';

    $sql = "Select * from `manage_students`";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $sid=$row['sid'];
        $firstName=$row['firstName'];
        $lastName=$row['lastName'];
        $email=$row['email'];
        $city=$row['city'];
        $course=$row['course'];
        $guardian=$row['guardian'];
        $subjects=$row['subjects'];
        $table.='<tr>
        <td scope="row">'.$sid.'</td>
        <td>'.$firstName.'</td>
        <td>'.$lastName.'</td>
        <td>'.$email.'</td>
        <td>'.$city.'</td>
        <td>'.$course.'</td>
        <td>'.$guardian.'</td>
        <td>'.$subjects.'</td>
        <td>
         <button onclick = "getDetails('.$sid.')"class= "btn btn-dark">Edit</button>
         <button onclick = "DeleteUser('.$sid.')"class= "btn btn-danger">Delete</button>
         </td>
      </tr>';

    }
    $table.='</table>';
    echo $table;
}
?>
