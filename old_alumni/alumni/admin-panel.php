<?php
include 'functions.php';
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
      <a class="navbar-brand text-brand" href="admin-panel.php">Alumni<?php echo " ";?><span class="color-b">(CSE-DIU)</span></a>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="admin-panel.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-events.php">Events</a>
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
            <h1 class="title-single">Admin Panel</h1>
            <span class="color-text-a">Welcome to admin panel.</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Admin-panel</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Home
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <header>
      <div class="">
        <div class="container d-flex justify-content-between">
            <div class="pull-right">
                <?php
                if(isset($_POST['logout'])){
                    session_destroy();
                    header('location:home.php');
                }
    
                ?>
            </div>
        </div>
      </div>
    </header>
<?php
include "conn.php";
if(isset($_REQUEST['submit'])){
$file=$_FILES["file"]["name"];
$temp_name=$_FILES["file"]["tmp_name"];
$path="slider_image/".$file;
move_uploaded_file($temp_name,$path);
$q = "insert into slider(image) values('$file')";
 mysqli_query($con,$q);
 echo "<script>alert('image uploaded Successfully'); location.href='admin-panel.php';</script>";

 

}
?>
  <!--image upload for silder-->
    <div class="slider" style="padding:50px; text-align:center;">
    <h2 style="padding:20px;">Upload Home Page Slider Images</h2>
    <hr style="border:2px solid #000; width:70%;"/>
   <form method="post" enctype="multipart/form-data">
      <label> Image Upload:</label>
      <input type="file" name="file"/>
      <input type="submit" name="submit" value="Upload"/>
      <br>
      <br>
   <label>You want to Remove previous slider photo?</label>
   <a href="remove.php" class="btn btn-primary">Delete</a>
   </form>   
    </div>
      <!-- end image upload for silder-->
    <main role="main">

<section class="jumbotron text-center">
  <div class="container">
      <?php
      
          $query = "select * from `requests`;";
          if(count(fetchAll($query))>0){
              foreach(fetchAll($query) as $row){
                  ?>
              <img src="<?php echo $row['alm_photo'] ?>" alt="Image" style="height:200px;width:200px;border-radius:50%;">
              <h1 style="font-size:20px;"><?php echo $row['alm_id'] ?></h1>
              <h1 style="font-size:20px;"><?php echo $row['alm_email'] ?></h1>
                <p class="lead text-muted"><?php echo $row['alm_batch_no'] ?></p>
                <p>
                  <a href="accept.php?id=<?php echo $row['alm_id'] ?>" class="btn btn-primary my-2">Accept</a>
                  <a href="reject.php?id=<?php echo $row['alm_id'] ?>" class="btn btn-secondary my-2">Reject</a>
                </p>
              
      <?php
              }
          }else{
              echo "No Pending Requests.";
          }
      ?>
    
  </div>
    
</section>

</main>

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
