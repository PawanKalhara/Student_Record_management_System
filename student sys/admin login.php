<?php 
require("connection.php");
?>

<html>
<head>
  <title>Admin Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      background-image: url("images/login.jpg");
      background-size: cover;
      background-repeat: no-repeat;
    }
    
    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: transparent;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 100px;
    }
    
    h2 {
      text-align: center;
      
    }
    
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 20px;
    }
    
    button {
      background-color: #4CAF50;
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }
    
    button:hover {
      background-color: #45a049;
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
  <div class="container">
    <h2>Admin Login</h2>
    <form method="POST">
      <input type="text" name="username" placeholder="Username"  >
      <input type="password" name="password" placeholder="Password" >
      <button type="submit" name = "Login">Login</button>
    </form>
  </div>
  <div class="footer">
    <p>A project from group 18B</p>
  </div>
<?php 
$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "login";
$con = new mysqli($host, $username, $password, $database);
if (isset($_POST['Login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM `admin_login` WHERE `Admin_Name`='$username' AND `Admin_Password`='$password'";
  $result = $con->query($query);

  if (mysqli_num_rows($result)==1) 
  {
    session_start();
    $_SESSION['AdminLoginId']=$_POST['username'];
    header("location:admin panel.php");
  } 
  else {
      // Query failed, handle the error
      echo "<script>alert('Incorrect Password or Username');</script> " . $con->error;
  }
}

$con->close();
?>



</body>
</html>