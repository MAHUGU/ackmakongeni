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

    <title>Members list</title>
    <!-- add icon link -->
    <link rel = "icon" href = "images/ack.ico" type = "image/x-icon"> 

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css2/vendor/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css2/vendor/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="css2/jquery.bdt.css" type="text/css" rel="stylesheet">
    <link href="css2/style.css" type="text/css" rel="stylesheet">
    
</head>
<body style="background-color: #3297a8">
    <div style="background-color: #3297a8" class="page-wrapper p-t-100 p-b-100 font-robo">
    <div style="background-color: #3297a8" class="container">
        <div class="row">
            <div class="box clearfix">
              <div class="row row-space">
                  <div class="col-md-10">
                     <div class="container-fluid" style="margin-bottom: 7px; margin-left: 7px">
                        <h3>ACK ST LUKES MEMBERS</h3>
                        <p>MOVING TO THE HEIGHTS.</p>
                        
                        <a style="background-color: #00B4CC;" class="btn btn-primary" href="register2.php">Add new member</a>
                    </div>
                  </div>
                  <div style=" margin-top: 20px; margin-left: 60px; font-size: 12px;" class="col-md-1">
                      <div style="padding-right: 10px;" class="p-t-20">
                        <form method="get" action="search.php">
                        <button name="logout" style="background-color: #ebd110;" class="btn btn--radius">Logout</button>  
                      </form>
                    </div> 
                  </div>
              </div>
              <?php
                date_default_timezone_set('Africa/Nairobi');

                  // Then call the date functions
                $date = date('Y/m/d');
              ?>
                <div class="col-md-10" style="height: 40px; margin-bottom: 20px; margin-right: 0px; margin-left: 40px; padding-top: 5px;">
<!--                   <div style="ma width: 100%;" class="row-space"> -->
                  <div class="wrap">
                   <div class="search">
                    <div class="custom-select" style="width:300px;">
                      <select>
                        <option disabled="disabled" selected="selected">ID</option>
                        <option value="2">Name</option>
                        <option value="3">Date</option>
                        <option value="4">Service</option>
                      </select>
                    </div>
                    <input class="input-group date" type="date" id="today">
                    <button type="submit" class="refreshButton">
                      <i class="fa fa-refresh fa-spin"></i>
                    </button>
                    <input type="text" class="searchTerm" placeholder="What are you looking for?">
                    <button type="submit" class="searchButton">
                      <i class="fa fa-search"></i>
                    </button>
                     
                   </div>
                </div>
<!--               </div> -->
                </div>
                 
                <?php

                  $sql="select * from user";
                  $sql_row=mysqli_query($db, $sql);

                  $num=@mysqli_num_rows($sql_row);

                  if($num > 0)

                    {

                ?>

                <table class="table table-hover" id="bootstrap-table">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Phone No</th>
                        <th>Residence</th>
                        <th>Service</th>
                        <th>Temperature</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <?php
                      
                      while($sql_res=@mysqli_fetch_assoc($sql_row))

                      {
                        $u_id = $sql_res["id"];
                        
                                     
                      ?>
                    <tbody>
                        <tr>
                            <td><?php echo $sql_res["id"]; ?></td>
                            <td><?php echo $sql_res["name"]; ?></td>
                            <td><?php echo $sql_res["phone_no"]; ?></td>
                            <td><?php echo $sql_res["residence"]; ?></td>
                            <?php

                                $query = "select * from attendance where user_id = '$u_id' and cr_date = '$date'";
                                $sq_row=mysqli_query($db, $query);

                                $num=@mysqli_num_rows($sq_row);

                                 if($num == 1)
                                 {
                                  $sql_r=@mysqli_fetch_assoc($sq_row)
                                 ?>
                                    <td style="background-color: #03fcca;"><?php echo $sql_r["service"]; ?></td>
                                    <td style="background-color: #03fcca;"><?php echo $sql_r["temperature"]; ?></td>
                                    <?php
                                }else{
                                     ?>
                                     <td style="background-color: #fcad03;">
                                         <a class="btn btn--radius btn--green" href="attendance2.php?id=<?php echo $sql_res["id"];?>">Add</a>
                                     </td>
                                     <td style="background-color: #fcad03;">
                                         <a class="btn btn--radius btn--green" href="attendance2.php?id=<?php echo $sql_res["id"];?>">Add</a>
                                     </td>
                                     <?php
                                 }
                                     ?>
                            <td>
                                <a class="btn btn--radius btn--green" href="profile.php?id=<?php echo $sql_res["id"];?>">View</a>
                            </td>
                        </tr>

                    <?php

                      }
                      
                     ?>

                    </tbody>
                </table>
                <?php

                  } ?>
                  
            </div>
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="js2/vendor/bootstrap.min.js" type="text/javascript"></script>
    <script src="js2/vendor/jquery.sortelements.js" type="text/javascript"></script>
    <script src="js2/jquery.bdt.min.js" type="text/javascript"></script>
    <script src="script.js" type="text/javascript"></script>
    <script>
        $(document).ready( function () {
            $('#bootstrap-table').bdt({
                showSearchForm: 0,
                showEntriesPerPageField: 0
            });
        });

     
    let today = new Date().toISOString().substr(0, 10);
    document.querySelector("#today").value = today;

    // or...

    document.querySelector("#today").valueAsDate = new Date();

      
    </script>
</body>
</html>