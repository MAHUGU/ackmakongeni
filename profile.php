<?php
    include('server.php');
 ?>
 <?php 

    if (!isset($_SESSION['id']) or !isset($_SESSION['role'])) {
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

    <title>Profile</title>

    <!-- add icon link -->
    <link rel = "icon" href = "images/ack.ico" type = "image/x-icon"> 

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css2/vendor/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css2/vendor/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="css2/jquery.bdt.css" type="text/css" rel="stylesheet">
    <link href="new css/style.css" type="text/css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <script src="js/bootstrap.min.js" type="text/javascript"></script>


    
</head>
<body>
    <?php
        if(isset($_GET['id']) && $_GET['id'] !== ''){
          $p_id = $_GET['id'];
        }
        if(isset($_SESSION['usr_id'])){
           $p_id =  $_SESSION['usr_id'];
        }

        $query = "SELECT * FROM user WHERE id='$p_id'";
        $results = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($results);
    ?>
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="images/stlksack.jpg" alt=""/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h3>
                                        <?php echo $row["name"]; ?>
                                    </h3>
                                    <h3>
                                        TEMPERATURE
                                    </h3>
                                    <p class="proile-rating">DATE : <span>
                                        <?php
                                        date_default_timezone_set('Africa/Nairobi');

                                        // Then call the date functions
                                        $date = date('Y-m-d H:i:s');
                                       echo $date;
                                        ?>
                                    </span></p>
                            <ul style="font-size: 20PX" class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="" role="tab" aria-controls="home" aria-selected="true">Personal details</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div style="font-size: 15px" class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                    </div>
                </div>
                <div class="row">
                    <div style="margin-top: 20px;" class="col-md-4">
                        <div class="profile-work">
                            
                            <a href="search.php">HOME</a><br/>
                            <a href="">ATTENDANCE</a><br/>
                                                        
                        </div>
                    </div>
                    <div style="font-size: 18px" class="col-md-8">
                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Member ID</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row["id"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Full Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row["name"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone No</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row["phone_no"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Residence</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row["residence"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Next of Kin</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row["kin"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Next of Kin No</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $row["kin_no"]; ?></p>
                                            </div>
                                        </div>
                            </div>
                            
                            
                    
                </div>
            </form>           
        </div>

    <script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="js2/vendor/bootstrap.min.js" type="text/javascript"></script>
    <script src="js2/vendor/jquery.sortelements.js" type="text/javascript"></script>
    <script src="js2/jquery.bdt.min.js" type="text/javascript"></script>
</body>
</html>