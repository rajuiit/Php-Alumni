<?php
session_start();

if($_SESSION["alm_id"]==true){
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

    echo "<script>location.href='alumni-home.php'</script>";
  }

  if(isset($_POST['done2'])){

    $alm_id=$_POST['id'];
    $degree=$_POST['degree'];
    $degree_name=$_POST['degree_name'];
    $institute=$_POST['institute'];
    $board=$_POST['board'];
    $passing_year=$_POST['passing_year'];
    $grade=$_POST['grade'];
    $cgpa=$_POST['cgpa'];
    $remarks=$_POST['remarks'];

    $q = "INSERT INTO `education_info`(`alm_id`, `degree`, `degree_name`, `institute`, `board`, `passing_year`, `grade`, `cgpa`, `remarks`) VALUES ('$alm_id','$degree','$degree_name','$institute','$board',$passing_year,'$grade','$cgpa','$remarks')";

    $query = mysqli_query($con,$q);

    echo "<script>location.href='alumni-home.php'</script>";
  }

?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Alumni of CSE(DIU-PC)</title>
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
      <a class="navbar-brand text-brand" href="alumni-home.php">Alumni<?php echo " ";?><span class="color-b">(CSE-DIU)</span></a>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="alumni-admin-index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="alumni-admin-event.php">Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="alumni-admin-notice.php">Notice Board</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="alumni-home.php">My Profile</a>
          </li>
            <li class="nav-item">
            <a class="nav-link active" href="alumni-menu.php">Alumni</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="alumni-admin-contact.php">Contact</a>
          </li>
          <li>
          <li>
            <form action="logout.php">
            	<button type="submit" class="btn btn-danger">Log out</button>
            </form>
          </li>
        </ul>
      </div>
       <?php echo "<b>User : <b>".$_SESSION["alm_id"]; ?>
    </div>
  </nav>
  <!--/ Nav End /-->

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Update Profile</h1>
            <span class="color-text-a"><?php echo 'Of id '.$_GET['alm_id']; ?></span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Alumni</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Profile/ Update
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



  <!--/ Image upload /-->
    <?php
      if (isset($_POST['upload'])) {
        $alm_photo=$_FILES['alm_photo'];

        $imagename=$alm_photo['name'];
        $imageerror=$alm_photo['error'];
        $imagetmp=$alm_photo['tmp_name'];

        $imageext=explode('.', $imagename);
        $imagecheck=strtolower(end($imageext));

        $imageextstored= array('png', 'jpg', 'jpeg');

        if (in_array($imagecheck, $imageextstored)) {
          $destinationimage='profilepictures/'.$imagename;
          move_uploaded_file($imagetmp, $destinationimage);

          $alm_id=$_GET['alm_id'];

          $q = "UPDATE `alumnus` SET alm_photo='$destinationimage' WHERE alm_id='$alm_id'";

          $query = mysqli_query($con,$q);

          echo "<script>location.href='alumni-home.php'</script>";


        }

      }


    ?>  

    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <label for="file">Profile Picture</label>
              <input name="alm_photo" type="file" class="form-control" id="file">
            </div>
            <hr>
            <div class="form-row">
              <button type="submit" class="btn btn-warning" name="upload"><b>Upload/Update</b></button>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="card" style="width: 18rem;">
            <div class="card-header text-center bg-success text-white">
              Current Profile Picture
            </div>
            <ul class="list-group list-group-flush text-center">
              <li class="list-group-item"><img src="<?php echo $alm_photo; ?>" class="img-fluid" alt="Profile Picture"></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <hr>
  <!--/ image upload End /-->


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
              <input name="contact_no" type="text" class="form-control" id="inputMobNo" value="<?php echo $contact; ?>">
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
              <button type="submit" class="btn btn-success" name="done">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <hr>
  <!--/ Data table End /-->



  <!--/ Education insert table /-->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="text-center"><u>Insert Education/Degree</u></h2>
          <form method="POST">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Degree</label>
                <input name="degree" type="text" class="form-control" placeholder="Enter degree" required>
              </div>
              <div class="form-group col-md-6">
                <label>Alumni ID</label>
                <input name="id" type="text" class="form-control" value="<?php echo $id; ?>" required>
              </div>
            </div>
            <div class="form-row">
              <label>Degree Name</label>
              <input name="degree_name" type="text" class="form-control" id="inputMobNo" placeholder="Enter degree name" required>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Institute</label>
                <input name="institute" type="text" class="form-control" id="inputEmail4" placeholder="Enter Institute" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Board</label>
                <input name="board" type="text" class="form-control" id="inputPassword4" placeholder="Enter Board">
              </div>
            </div>
            <div class="form-row">
              <label>Passing Year</label>
              <input name="passing_year" type="text" class="form-control" id="inputMobNo" placeholder="Enter passing year" required>
            </div>
            <div class="form-group">
              <label for="inputAddress">Grade</label>
              <input name="grade" type="text" class="form-control" id="inputAddress" placeholder="Enter Grade" required>
            </div>
            <div class="form-row">
              <label>CGPA</label>
              <input name="cgpa" type="text" class="form-control" id="inputMobNo" placeholder="Enter CGPA" required>
            </div>
            <div class="form-row">
              <label>Remarks</label>
              <input name="remarks" type="text" class="form-control" id="inputMobNo" placeholder="Enter remarks">
            </div>
            <hr>
            <div class="form-row">
              <button type="submit" class="btn btn-success" name="done2">Insert Educaton Info</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <hr>
  <!--/ Education table End /-->



  <!--/ footer Star /-->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
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
