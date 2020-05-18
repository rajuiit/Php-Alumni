<?php
session_start();

if($_SESSION["alm_id"]==true){
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
            <h1 class="title-single">Alumni</h1>
            <span class="color-text-a">Here you can find batch wise alumni information.</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.php">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Alumni
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Data table /-->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        <form action="" method="post">
        <input type="text" name="valueToSearch" placeholder="enter search value" style="width:400px;height:40px; margin-top:3px;">
   <input type="submit" name="search" value="Search" class="btn btn-primary"> <br><br>
   <label>Search above Name, job title,Brach or Organiztion*</label>
          <table class="table table-striped table-responsive text-center">
            <thead>
              <tr class="bg-dark">
                <th colspan="7"><h2 class="text-white">Alumni Information Table</h2></th>
              </tr>
              <tr class="bg-primary text-white">
                <th scope="col">Name</th>
                <th scope="col">ID</th>
                <th scope="col">Batch</th>
                <th scope="col">Designation</th>
                <th scope="col">Organization</th>
                  <th scope="col">Photo</th>
                <th scope="col">Detatils</th>
              </tr>
            </thead>

        <?php
    
       if(isset($_POST['search'])){
          $valueToSearch=$_POST['valueToSearch'];
          $query="select * from `alumnus` where CONCAT(`alm_name`,`alm_id`,`alm_batch_no`,`alm_curr_job_pos`,`alm_curr_job_organization`) LIKE'%".$valueToSearch."%'";
          $search_result=filterTable($query);
       }
       else{
        $query="select * from alumnus ";
        $search_result=filterTable($query);
       }
       function filterTable($query){
           $connect=mysqli_connect("localhost:3306","proconfl_mahedy","mahedy01798173317","proconfl_csepc_db");
           $filter_Result=mysqli_query($connect,$query);
           return $filter_Result;
       }

       while($res=mysqli_fetch_array($search_result)){


        ?>

              <tbody>
                <tr>
                  <td><?php echo $res['alm_name']; ?></td>
                  <td><?php echo $res['alm_id']; ?></td>
                  <td><?php echo $res['alm_batch_no']; ?></td>
                  <td><?php echo $res['alm_curr_job_pos']; ?></td>
                  <td><?php echo $res['alm_curr_job_organization']; ?></td>
                  <td><img src="<?php echo $res['alm_photo']; ?>" style="width:60px;height;60px;" /></td>
                <td><button class="btn btn-success"><a href="alumni-details.php?alm_id=<?php echo $res['alm_id']; ?>" class="text-white">View Details</a></button></td>
              </tbody>
              <?php
                }
              ?>
            </table>
            </form>
        </div>
      </div>
    </div>
  <!--/ Data table End /-->



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
