<?php 
session_start();
if(!isset($_SESSION['AdminLoginId']))
{
   header("location: admin login.php");
}



?>

<html>
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    .welcome-text {
      margin-top: 150px;
      text-align: center;
      font-size: 48px;
      font-weight: bold;
      display: none;
    }

    .logout-button {
        position: fixed;
        top: 15px;
        right: 20px;
    }
    .footer {
      text-align: center;
      background-color: transparent;
      padding: 10px;
      position: fixed;
      bottom: 0;
      width: 100%;
      font: #fff;
    }
    .footer p {
     color: black;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="admin panel.php">STUDENT RECORD MANAGEMENT SYSTEM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="students.php">Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manage students.php">Manage Students</a>
        </li>
      </ul>
    </div>
  </nav>


<!-- Modal -->
<div class="modal fade" id="completeModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Student Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <div class="mb-3">
    <label for="studentId" class="form-label">Student ID</label>
    <input type="text" class="form-control" id="studentId" >
    <label for="firstName" class="form-label">First Name</label>
    <input type="text" class="form-control" id="firstName" >
    <label for="lastName" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="lastName" >
    <label for="email" class="form-label">Email Address</label>
    <input type="text" class="form-control" id="email" >
    <label for="city" class="form-label">city</label>
    <input type="text" class="form-control" id="city" >
    <label for="course" class="form-label">Course</label>
    <input type="text" class="form-control" id="course" >
    <label for="guardian" class="form-label">Guardian</label>
    <input type="text" class="form-control" id="guardian" >
    <label for="subjects" class="form-label">Subjects</label>
    <input type="text" class="form-control" id="subjects" >

  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button onclick="adduser()" type="button" class="btn btn-primary" >Submit</button>

      </div>
    </div>
  </div>
</div>

<!--Update Modal-->
<div class="modal fade" id="updateModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <div class="mb-3">
    <label for="updatestudentId" class="form-label">Student ID</label>
    <input type="text" class="form-control" id="updatestudentId" >
    <label for="updatefirstName" class="form-label">First Name</label>
    <input type="text" class="form-control" id="updatefirstName" >
    <label for="updatelastName" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="updatelastName" >
    <label for="updateemail" class="form-label">Email Address</label>
    <input type="text" class="form-control" id="updateemail" >
    <label for="updatecity" class="form-label">city</label>
    <input type="text" class="form-control" id="updatecity" >
    <label for="updatecourse" class="form-label">Course</label>
    <input type="text" class="form-control" id="updatecourse" >
    <label for="updateguardian" class="form-label">Guardian</label>
    <input type="text" class="form-control" id="updateguardian" >
    <label for="updatesubjects" class="form-label">Subjects</label>
    <input type="text" class="form-control" id="updatesubjects" >

  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button onclick="updateDetails()" type="button" class="btn btn-primary" >Update</button>
        <input type="hidden" id="hiddendata">

      </div>
    </div>
  </div>
</div>


  <div class="container">
    <div class="welcome-text">
      Welcome, Admin!
    </div>
    <div class="container my-3">
        <h1 class ="text-center">Manage Students</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#completeModel">
  Add Student
</button>
<div id="displayDataTable"></div> 
    </div>
    <div class="logout-button">
        <form method="POST">
      <button class="btn btn-primary" name="Logout">Logout</button>
</form>
    </div>
  </div>
  <div class="footer">
    <p>A project from group 18B</p>
  </div>

  <?php
    if(isset($_POST['Logout']))
    {
        session_destroy();
        header("location: admin login.php");
    }
  
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" ></script>

  <script>
    $(document).ready(function(){
        displayData();
    });


    function displayData(){
        var displayData = "true";

        $.ajax({
            url :"display.php",
            type : "post",
            data:{
                displaySend:displayData
            },
            success:function(data,status){
                $('#displayDataTable').html(data);

            }
        })

    
    }



    function adduser(){
        var idAdd=$('#studentId').val();
        var fnameAdd=$('#firstName').val();
        var lnameAdd=$('#lastName').val();
        var emailAdd=$('#email').val();
        var cityAdd=$('#city').val();
        var courseAdd=$('#course').val();
        var guardianAdd=$('#guardian').val();
        var subjectsAdd=$('#subjects').val();
      
        
        $.ajax({
            url:"insert.php",
            type:'post',
            data:{
                idSend:idAdd,
                fnameSend:fnameAdd,
                lnameSend:lnameAdd,
                emailSend:emailAdd,
                citySend:cityAdd,
                courseSend:courseAdd,
                guardianSend:guardianAdd,
                subjectsSend:subjectsAdd,
            },
            success:function(data,status){
                //display data function
                //console.log(status);
                $('#completeModel').modal('hide');
                displayData();


            }
        });
    }

    //delete user function
    function DeleteUser(deleteid){
        $.ajax({
            url: "delete.php",
            type:'post',
            data:{
                deletesend:deleteid
        },

            success:function(data,status){
                displayData();
            }
        })
    
    }

    //Function for Update 
    function getDetails(updateid){

        $('#hiddendata').val(updateid);

        $.post("update.php",{updateid:updateid},function(data,status) {

            var userid=JSON.parse(data);
            $('#updatestudentId').val(userid.sid);
            $('#updatefirstName').val(userid.firstName);
            $('#updatelastName').val(userid.lastName);
            $('#updateemail').val(userid.email);
            $('#updatecity').val(userid.city);
            $('#updatecourse').val(userid.course);
            $('#updateguardian').val(userid.guardian);
            $('#updatesubjects').val(userid.subjects);
            
        });
        $('#updateModel').modal("show");
      }

  

        // update on button click event function
        function updateDetails(updateid){
            var updatestudentId=$('#updatestudentId').val();
            var updatefirstName=$('#updatefirstName').val();
            var updatelastName=$('#updatelastName').val();
            var updateemail=$('#updateemail').val();
            var updatecity=$('#updatecity').val();
            var updatecourse=$('#updatecourse').val();
            var updateguardian=$('#updateguardian').val();
            var updatesubjects=$('#updatesubjects').val();
            var hiddendata=$('#hiddendata').val();

            $.post("update.php",{
                updatestudentId:updatestudentId,
                updatefirstName:updatefirstName,
                updatelastName:updatelastName,
                updateemail:updateemail,
                updatecity:updatecity,
                updatecourse:updatecourse,
                updateguardian:updateguardian,
                updatesubjects:updatesubjects,
                hiddendata:hiddendata
            },function(data,status){
                $('#updateModel').modal('hide');
                displayData();
           
            
         });

        
    }
    
  </script>

</body>
</html>