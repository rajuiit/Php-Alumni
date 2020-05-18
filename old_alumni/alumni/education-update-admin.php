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

  if(isset($_POST['done3'])){

    $id=$_GET['id'];
    $degree=$_POST['degree'];
    $degree_name=$_POST['degree_name'];
    $institute=$_POST['institute'];
    $board=$_POST['board'];
    $passing_year=$_POST['passing_year'];
    $grade=$_POST['grade'];
    $cgpa=$_POST['cgpa'];
    $remarks=$_POST['remarks'];

    $q = "UPDATE `education_info` SET `degree`='$degree',`degree_name`='$degree_name',`institute`='$institute',`board`='$board',`passing_year`=$passing_year,`grade`='$grade',`cgpa`='$cgpa',`remarks`='$remarks' WHERE id=$id";

    $query = mysqli_query($con,$q);

    echo "<script>location.href='admin-alumnus.php'</script>";
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
            <a class="nav-link active" href="alumni-home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Notice Board</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Alumni</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
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
            <h1 class="title-single">Update Education info</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Alumni</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Education/ Update
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
      $q = "select * from education_info WHERE id='$id'";

      $query = mysqli_query($con,$q);

      while($res = mysqli_fetch_array($query)){
          $degree =$res['degree'];
          $degree_name =$res['degree_name'];
          $institute =$res['institute'];
          $board =$res['board'];
          $passing_year =$res['passing_year'];
          $grade =$res['grade'];
          $cgpa =$res['cgpa'];
          $remarks =$res['remarks'];
        }
    ?>


  <!--/ Education update table /-->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="text-center"><u>Update Education/Degree</u></h2>
          <form method="POST">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Degree</label>
                <input name="degree" type="text" class="form-control" value="<?php echo $degree; ?>" required>
              </div>
            </div>
            <div class="form-row">
              <label>Degree Name</label>
              <input name="degree_name" type="text" class="form-control" id="inputMobNo" value="<?php echo $degree_name; ?>" required>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Institute</label>
                <input name="institute" type="text" class="form-control" id="inputEmail4" value="<?php echo $institute; ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Board</label>
                <input name="board" type="text" class="form-control" id="inputPassword4" value="<?php echo $board; ?>">
              </div>
            </div>
            <div class="form-row">
              <label>Passing Year</label>
              <input name="passing_year" type="text" class="form-control" id="inputMobNo" value="<?php echo $passing_year; ?>" required>
            </div>
            <div class="form-group">
              <label for="inputAddress">Grade</label>
              <input name="grade" type="text" class="form-control" id="inputAddress" value="<?php echo $grade; ?>" required>
            </div>
            <div class="form-row">
              <label>CGPA</label>
              <input name="cgpa" type="text" class="form-control" id="inputMobNo" value="<?php echo $cgpa; ?>" required>
            </div>
            <div class="form-row">
              <label>Remarks</label>
              <input name="remarks" type="text" class="form-control" id="inputMobNo" value="<?php echo $remarks; ?>">
            </div>
            <hr>
            <div class="form-row">
              <button type="submit" class="btn btn-success" name="done3">Update Educaton Info</button>
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
