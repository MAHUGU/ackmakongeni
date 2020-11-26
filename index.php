<?php include('server.php') ?>
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
    <title>Login</title>

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
                    <h2 class="title">Login </h2>
                    <form method="POST" action="index.php">
                        <div class="error" style="color: #f54b42;" >
                            <?php include('errors.php'); ?>
                        </div>
                        <!-- notification message -->
                        <?php if (isset($_SESSION['msg'])) : ?>
                            <div style="font-size: 13px; color: #f54b42;" >
                                <h4>
                                    <?php 
                                        echo $_SESSION['msg']; 
                                        unset($_SESSION['msg']);
                                    ?>
                                </h4>
                            </div>
                        <?php endif ?>
                        <?php if (isset($_SESSION['usr_id'])){
                            
                            $M_ID = $_SESSION['usr_id']; 
                           }             
                        ?>
                        <div class="input-group">
                            <input class="input--style-1" type="text" value="<?php echo $M_ID; ?>" placeholder="MEMBER ID" name="id" required = true>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="PASSWORD" name="password">
                        </div>
                            
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="p-t-20">
                                <button class="btn btn--radius btn--green" name="login_user" type="submit">Login</button>  
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="p-t-20">
                                    <p>
                                        Not a member? <a href="register.php">Register</a>
                                    </p>
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
