<?php
  session_start();

  if($_SESSION["username"]==true){
  }
  else
  {
   header('location:index.php');  
  }
?>

<?php
  include 'conn.php';

  if(isset($_POST['done'])){

    $alm_id=$_GET['alm_id'];
    $name=$_POST['name'];
    $id=$_POST['id'];
    $department=$_POST['department'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $contact_no=$_POST['contact_no'];
    $batch_no=$_POST['batch_no'];
    $personal_email=$_POST['personal_email'];
    $alm_curr_country=$_POST['curr_country'];
    $curr_job_pos=$_POST['curr_job_pos'];
    $curr_job_organization=$_POST['curr_job_organization'];
    $curr_study=$_POST['curr_study'];

    $q = "UPDATE `alumnus` SET alm_id='$id', alm_name='$name', alm_department='$department', alm_email='$email', alm_password='$password', alm_contact_no='$contact_no', alm_batch_no=$batch_no, alm_p_email='$personal_email', alm_curr_country='$alm_curr_country', alm_curr_job_pos='$curr_job_pos', alm_curr_job_organization='$curr_job_organization', alm_curr_study='$curr_study' WHERE alm_id='$alm_id'";

    $query = mysqli_query($con,$q);

    echo "<script>location.href='admin-alumnus.php'</script>";
  }


?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Department of CSE(DIU-PC)</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link rel="icon" type="image/jpg" href="img/diucon.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

 
</head>

<body>

  <!--/ Nav Star /-->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="admin-panel.php">CSE<?php echo " ";?><span class="color-b">(DIU-PC)</span></a>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="admin-panel.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-events.php">Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-notice-board.php">Notice Board</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="admin-alumnus.php">Alumnus</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-contact.php">Contact</a>
          </li>
          <li>
            <form action="logout.php">
              <button type="submit" class="btn btn-danger">Log out</button>
            </form>
          </li>
        </ul>
      </div>
        <?php echo "<b>User : <b>".$_SESSION["username"]; ?>
    </div>
  </nav>
  <!--/ Nav End /-->

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Update alumni Info</h1>
            <span class="color-text-a"><?php echo 'For id '.$_GET['alm_id']; ?></span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.html">Admin-panel</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Alumnus/ Update
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->



<?php
    include 'conn.php';
      $alm_id=$_GET['alm_id'];
      $q = "select * from alumnus WHERE alm_id='$alm_id'";

      $query = mysqli_query($con,$q);

      while($res = mysqli_fetch_array($query)){
          $id =$res['alm_id'];
          $name =$res['alm_name'];
          $department =$res['alm_department'];
          $batch =$res['alm_batch_no'];
          $email =$res['alm_email'];
          $contact =$res['alm_contact_no'];
          $password =$res['alm_password'];
          $personal_email =$res['alm_p_email'];
          $curr_country =$res['alm_curr_country'];
          $curr_job_pos =$res['alm_curr_job_pos'];
          $curr_job_organization =$res['alm_curr_job_organization'];
          $curr_study =$res['alm_curr_study'];
          $alm_photo=$res['alm_photo'];
        }
?>


  <!--profile pic-->
    <div class="container">
      <div class="row">
          <div class="col-lg-12 m-auto d-block">
            <div class="card" style="width: 18rem;">
              <div class="card-header text-center bg-success text-white">
                Profile Picture
              </div>
              <ul class="list-group list-group-flush text-center">
                <li class="list-group-item"><img src="<?php echo $alm_photo; ?>" class="img-fluid" alt="Profile Picture"></li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  <hr>

  <!--/ Data table /-->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <form method="POST">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Name</label>
                <input name="name" type="text" class="form-control" value="<?php echo $name; ?>" >
              </div>
              <div class="form-group col-md-6">
                <label>ID</label>
                <input name="id" type="text" class="form-control" value="<?php echo $id; ?>" >
              </div>
            </div>
            <div class="form-row">
              <label>Department</label>
              <input name="department" type="text" class="form-control" id="inputMobNo" value="<?php echo $department; ?>" >
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">DIU Email</label>
                <input name="email" type="email" class="form-control" id="inputEmail4" value="<?php echo $email; ?>" >
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input name="password" type="text" class="form-control" id="inputPassword4" value="<?php echo $password; ?>" >
              </div>
            </div>
            <div class="form-row">
              <label>Contact Number</label>
              <input name="contact_no" type="text" class="form-control" id="inputMobNo" value="<?php echo $contact; ?>" >
            </div>
            <div class="form-group">
              <label for="inputAddress">Batch Number</label>
              <input name="batch_no" type="text" class="form-control" id="inputAddress" value="<?php echo $batch; ?>" >
            </div>
            <div class="form-row">
              <label>Personal Email</label>
              <input name="personal_email" type="text" class="form-control" id="inputMobNo" value="<?php echo $personal_email; ?>" >
            </div>
            <div class="form-row">
              <label>Current Country</label>
              <input name="curr_country" type="text" class="form-control" id="inputMobNo" value="<?php echo $curr_country; ?>" >
            </div>
            <div class="form-row">
              <label>Current Job Positon</label>
              <input name="curr_job_pos" type="text" class="form-control" id="inputMobNo" value="<?php echo $curr_job_pos; ?>" >
            </div>
            <div class="form-row">
              <label>Current Job Organizaton Name</label>
              <input name="curr_job_organization" type="text" class="form-control" id="inputMobNo" value="<?php echo $curr_job_organization; ?>" >
            </div>
            <div class="form-row">
              <label>Currently Studying</label>
              <input name="curr_study" type="text" class="form-control" id="inputMobNo" value="<?php echo $curr_study; ?>" >
            </div>
            <hr>
            <div class="form-row">
              <button type="submit" class="btn btn-success" name="done">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <hr>
  <!--/ Data table End /-->



  <!--/ Education table /-->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-striped table-responsive text-center">
            <thead>
              <tr class="bg-light">
                <th colspan="10"><h2 class="text-dark">Education and Training</h2></th>
              </tr>
              <tr class="bg-info">
                <th scope="col">Degree</th>
                <th scope="col">Degree Name</th>
                <th scope="col">Institute</th>
                <th scope="col">Board name</th>
                <th scope="col">Passing Year</th>
                <th scope="col">Grade</th>
                <th scope="col">CGPA</th>
                <th scope="col">Remarks</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
              </tr>
            </thead>

        <?php
          include 'conn.php';
          $alm_id=$_GET['alm_id'];
          $q = "select * from education_info WHERE alm_id='$alm_id'";

            $query = mysqli_query($con,$q);

            while($res = mysqli_fetch_array($query)){


        ?>

              <tbody>
                <tr>
                  <td><?php echo $res['degree']; ?></td>
                  <td><?php echo $res['degree_name']; ?></td>
                  <td><?php echo $res['institute']; ?></td>
                  <td><?php echo $res['board']; ?></td>
                  <td><?php echo $res['passing_year']; ?></td>
                  <td><?php echo $res['grade']; ?></td>
                  <td><?php echo $res['cgpa']; ?></td>
                  <td><?php echo $res['remarks']; ?></td>
                  <td><button class="btn btn-danger"><a href="education-delete.php?id=<?php echo $res['id']; ?>" class="text-white" onClick="return confirm('Are you sure you want to delete?')">Delete</a></button></td>
                  <td><button class="btn btn-success"><a href="education-update-admin.php?id=<?php echo $res['id']; ?>" class="text-white">Edit</a></button></td>
                </tr>
              </tbody>
              <?php
                }
              ?>
            </table>
        </div>
      </div>
    </div>
  <!--/ Education table End /-->
  

  <!--/ footer Star /-->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="admin-panel.php">Home</a>
              </li>
              <li class="list-inline-item">
                <a href="admin-events.php">Events</a>
              </li>
              <li class="list-inline-item">
                <a href="admin-notice-board.php">Notice Board</a>
              </li>
            
              <li class="list-inline-item">
                <a href="admin-contact.php">Contact</a>
              </li>
            </ul>
          </nav>
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-dribbble" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">Department of CSE (DIU-PC)</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
            -->
           <a href="innovative.php">Development Team</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ Footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/scrollreveal/scrollreveal.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
