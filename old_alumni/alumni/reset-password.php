<?php
include 'conn.php';
if(isset($_POST['fpass'])){
$email=$_POST['email'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
if($pass==$cpass){
  $query="select * from alumnus where alm_email='$email'";
  $query_check=mysqli_query($con,$query);
  if( $query_check){
    if(mysqli_num_rows( $query_check)>0){
       $query1="UPDATE alumnus SET alm_password='$pass' WHERE alm_email='$email'";
      $query_run=mysqli_query($con,$query1);
      if($query_run){
        echo "<script>
        alert('Your password is updated');
        window.location.href='alumni_info_login.php';
        </script>";
      }
        else{
          echo "<script>
          alert('Your password is not updated,Try again!');
          window.location.href='reset-password.php';
          </script>";
        }
    }
      else{
        echo "<script>
        alert('Your is not found.. Registration please.');
    
        </script>";
      }
  }
    else{
      echo "<script>
      alert(' Email query is not working');
      window.location.href='reset-password.php';
      </script>";
    }
}
  else{
    echo "<script>
    alert('Password not match!');
    window.location.href='reset-password.php';
    </script>";
  }
}
else{}


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
  <link href="css/index.css" rel="stylesheet">

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
      <a class="navbar-brand text-brand" href="index.php">Alumnus<?php echo " ";?><span class="color-b">(CSE-DIU)</span></a>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="events.php">Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="notice-board.php">Notice Board</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="alumnus.php">Alumni</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
  </nav>
  <!--/ Nav End /-->
 <div class="container">
     
<form action="reset-password.php" method="POST" style="margin:200px auto;">
              
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Enter your name" style="width:550px;" required >
                      </div>
                      <div class="form-row">
                      <div class="form-group col-md-12">
                        <label>New Password</label>
                        <input name="pass" type="password" class="form-control" placeholder="Enter your  new password" required>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Confirm Password</label>
                        <input name="cpass" type="password" class="form-control" placeholder="confirm new password" required>
                      </div>

                    <div class="">
                      <button type="submit" class="btn btn-success" name="fpass">Submit</button>
                    </div>
                  </form>
           </div>
        
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
