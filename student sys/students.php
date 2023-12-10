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
  <body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Search Students </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>city</th>
                                    <th>Course</th>
                                    <th>Guardian</th>
                                    <th>subjects</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","login");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM manage_students WHERE CONCAT(firstName,lastName,email,city,course,guardian,subjects) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['sid']; ?></td>
                                                    <td><?= $items['firstName']; ?></td>
                                                    <td><?= $items['lastName']; ?></td>
                                                    <td><?= $items['email']; ?></td>
                                                    <td><?= $items['city']; ?></td>
                                                    <td><?= $items['course']; ?></td>
                                                    <td><?= $items['guardian']; ?></td>
                                                    <td><?= $items['subjects']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
</body>
</html>