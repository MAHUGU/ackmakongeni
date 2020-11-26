<?php include('server.php') ?>
<?php 

    if (!isset($_SESSION['id'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: index.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['id']);
        header("location: index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Attendance</title>

    <!-- add icon link -->
    <link rel = "icon" href = "images/ack.ico" type = "image/x-icon"> 

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body style="background-color: #3297a8">
    <div style="background-color: #3297a8" class="page-wrapper p-t-100 p-b-100 font-robo">
        <div style="background-color: #3297a8" class="wrapper wrapper--w680">
            <div class="card card-1">
               <div class="card-heading"></div>
                <div class="card-body">
                    <h4 class="title">Welcome to ACK St. Lukes Makongeni, Thika. </h4>
                    <form method="POST" action="attendance.php">
                        <div class="error" style="color: #f54b42;" >
                            <?php include('errors.php'); ?>
                        </div>
                        <?php if (isset($_SESSION['success'])) : ?>
                            <span>
                                <h3>
                                    <?php 
                                        echo $_SESSION['success']; 
                                        unset($_SESSION['success']);
                                    ?>
                                </h3>
                            </span>
                        <?php endif ?>
                        <div style="margin-bottom: 50PX;" class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="TEMPERATURE" name="temperature" required = true>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                    <select size="6" name="service">
                                        <option disabled="disabled" selected="selected">SERVICE</option>
                                        <option>KISWAHILI SERVICE</option>
                                        <option>ENGLISH SERVICE</option>
                                        <option>YOUTH SERVICE</option>
                                        <option>KIKUYU SERVICE</option>
                                        <option>TEENS SERVICE</option>
                                        <option>SUNDAY SCHOOL</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <div class="row row-space">
                            <div class="col-md-7">
                               <div class="p-t-20">
                                    <a name="logout" href="index.php" style="background-color: #fc324d; text-decoration: none;" class="btn btn--radius">Back</a>  
                                </div> 
                            </div>
                            <div class="col-md-2">
                                <div class="p-t-20">
                                    <button class="btn btn--radius btn--green" type="submit" name="attendance">Submit</button>  
                                </div>
                            </div>
                        </div>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
