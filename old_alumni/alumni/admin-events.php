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
      <a class="navbar-brand text-brand" href="admin-panel.php">Alumni<?php echo " ";?><span class="color-b">(CSE-DIU)</span></a>
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
            <span class="color-text-a">Events' admin panel</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Admin-panel</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Events
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->


  <!--/ Insert event /-->
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


          $q = "INSERT INTO `events`(`event_title`, `event_date`, `event_time`, `event_details`, `event_photo`) VALUES ('$event_title','$event_date','$event_time','$event_details','$destinationimage')";

          $query = mysqli_query($con,$q);

          echo "<script>location.href='admin-events.php'</script>";


        }

      }


    ?>  



  <!--/ Form start /-->
  <section class="section-services"  id="logreg">
    <div class="container">
      <div class="row jumbotron">
        <div class="col-md-9">
          <p><b>Add events from here. Add events with proper details and image size shoudn't be huge.</b></p>
        </div>
        <div class="col-md-3">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModa2">
            Add Event
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabe2" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabe2">Add Event form</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                  <form method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                      <label>Event Title</label>
                      <input name="event_title" type="text" class="form-control" placeholder="Enter title of the event" required>
                    </div>
                    <div class="form-row">
                      <label>Event date</label>
                      <input name="event_date" type="text" class="form-control" placeholder="Enter event date" required>
                    </div>
                    <div class="form-row">
                      <label>Event Time</label>
                      <input name="event_time" type="text" class="form-control" placeholder="Enter evebt time" required>
                    </div>
                    <div class="form-row">
                      <label>Event Details</label>
                      <textarea  name="event_details" type="text" class="form-control" rows="5" placeholder="Enter event description(maximum 1000 characters)" required></textarea>
                    </div>
                    <div class="form-row">
                      <label for="file">Event Photo</label>
                      <input name="event_photo" type="file" class="form-control" id="file">
                    </div>
                    <hr>
                    <div class="form-row">
                      <button type="submit" class="btn btn-success" name="done">Submit</button>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Form ends /-->
  

  <!--/ Data table /-->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-striped table-responsive text-center">
            <thead>
              <tr class="bg-warning">
                <th colspan="9"><h2>Events</h2></th>
              </tr>
              <tr class="bg-info">
                <th scope="col">Title</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Description</th>
                <th scope="col">Photo</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
              </tr>
            </thead>

        <?php
          include 'conn.php';

            $q = "select * from events";

            $query = mysqli_query($con,$q);

            while($res = mysqli_fetch_array($query)){


        ?>

              <tbody>
                <tr>
                  <td><?php echo $res['event_title']; ?></td>
                  <td><?php echo $res['event_date']; ?></td>
                  <td><?php echo $res['event_time']; ?></td>
                  <td><?php echo $res['event_details']; ?></td>
                  <td><img src="<?php echo $res['event_photo']; ?>" class="img-fluid" height="450px" width="900px" alt="Event photo"></td>
                  <td><button class="btn btn-danger"><a href="delete-event.php?id=<?php echo $res['id']; ?>" class="text-white" onClick="return confirm('Are you sure you want to delete?')">Delete</a></button></td>
                  <td><button class="btn btn-success"><a href="event-update.php?id=<?php echo $res['id']; ?>" class="text-white">Edit</a></button></td>
                </tr>
              </tbody>
              <?php
                }
              ?>
            </table>
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
