<?php
  session_start();

  if($_SESSION["username"]==true){
  }
  else
  {
   header('location:index.php');	
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
      <a class="navbar-brand text-brand" href="admin-panel.php">Alumnus<?php echo " ";?><span class="color-b">(CSE-DIU)</span></a>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="admin-panel.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="admin-events.php">Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-notice-board.php">Notice Board</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-alumnus.php">Alumni</a>
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
            <h1 class="title-single">Events</h1>
            <span class="color-text-a">Update event information form here.</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Admin-panel</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Events/update
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
      $id=$_GET['id'];
      $q = "select * from events WHERE id='$id'";

      $query = mysqli_query($con,$q);

      while($res = mysqli_fetch_array($query)){
          $event_title =$res['event_title'];
          $event_date =$res['event_date'];
          $event_time =$res['event_time'];
          $event_details =$res['event_details'];
        }
    ?>


  <!--/ Form start /-->
  <section class="section-services"  id="logreg">
    <div class="container">
        <div class="col-md-8">
            <form method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                      <label>Event Title</label>
                      <input name="event_title" type="text" class="form-control" value="<?php echo $event_title;?>" required>
                    </div>
                    <div class="form-row">
                      <label>Event date</label>
                      <input name="event_date" type="text" class="form-control" value="<?php echo $event_date;?>" required>
                    </div>
                    <div class="form-row">
                      <label>Event Time</label>
                      <input name="event_time" type="text" class="form-control" value="<?php echo $event_time;?>" required>
                    </div>
                    <div class="form-row">
                      <label>Event Details</label>
                      <textarea  name="event_details" type="text" class="form-control" rows="5" required>
                         <?php echo $event_details;?>
                      </textarea>
                    </div>
                    <div class="form-row">
                      <label for="file">Event Photo</label>
                      <input name="event_photo" type="file" class="form-control" id="file" required>
                    </div>
                    <hr>
                    <div class="form-row">
                      <button type="submit" class="btn btn-success" name="done">Submit</button>
                    </div>
                  </form>
          </div>
        </div>
  </section>
  <!--/ Form ends /-->

  <!--/ update notice /-->
    <?php
      include 'conn.php';

      if (isset($_POST['done'])) {
        $event_title=$_POST['event_title'];
        $event_date=$_POST['event_date'];
        $event_time=$_POST['event_time'];
        $event_details=$_POST['event_details'];
        $event_photo=$_FILES['event_photo'];

        $imagename=$event_photo['name'];
        $imageerror=$event_photo['error'];
        $imagetmp=$event_photo['tmp_name'];

        $imageext=explode('.', $imagename);
        $imagecheck=strtolower(end($imageext));

        $imageextstored= array('png', 'jpg', 'jpeg');

        if (in_array($imagecheck, $imageextstored)) {
          $destinationimage='events/'.$imagename;
          move_uploaded_file($imagetmp, $destinationimage);

          $id=$_GET['id'];

          $q = "UPDATE `events` SET `event_title`='$event_title',`event_date`='$event_date',`event_time`='$event_time',`event_details`='$event_details',`event_photo`='$destinationimage' WHERE id='$id'";

          $query = mysqli_query($con,$q);

          echo "<script>location.href='admin-events.php'</script>";


        }

      }


    ?>
  

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
