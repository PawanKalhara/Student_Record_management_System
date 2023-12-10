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
     body {
    background-image: url("images/Future-Tech.png");
    background-size: cover;
    background-repeat: no-repeat;
  }
    .welcome-text {
      margin-top: 150px;
      text-align: center;
      font-size: 48px;
      font-weight: bold;
    }

    .logout-button {
      margin-top: 30px;
      text-align: center;
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
     color: white;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">STUDENT RECORD MANAGEMENT SYSTEM</a>
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

  <div class="container">
    <div class="welcome-text">
      Welcome, Admin!
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
            }
            success:function(data,status){
                //display data function
                console.log(status);
            }
        });
    }
  </script>
</body>
</html>