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
    <title>Register</title>

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
                    <h2 class="title">Registration Info</h2>
                    <form method="POST" action="register.php">
                        <div style="color: #f54b42;" class="error success" >
                            <?php include('errors.php'); ?>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NAME" name="name" required = true>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="ID NUMBER" name="id" required = true>
                        </div> -->
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="PHONE NO" name="phone_no" required = true>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="password" placeholder="PASSWORD" name="password_1">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="password" placeholder="CONFIRM PASSWORD" name="password_2">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="RESIDENCE" name="residence" required = true>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NEXT OF KIN" name="kin" required = true>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NEXT OF KIN CELL NO" name="kin_no" required = true>
                        </div>

                        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="p-t-20">
                                <button class="btn btn--radius btn--green" name ="reg_user" type="submit">Submit</button>  
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="p-t-20">
                                    <p>
                                        Already a member? <a href="index.php">Login</a>
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
