<?php
require ("includes/common.php");
?>
<!DOCTYPE html>

<html>
   
<head>
        <title>Profile | E-Store.com</title>
        <link rel="shortcut icon" href="img\srtcticon.png" type="image/png">
        
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
        <!-- jQuery -->
    <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
</head>
   
<body style="padding-top: 50px;">
            <!-- Header file -->
    <?php
        include 'includes/header.php';
        include 'includes/check-if-added.php';
        include 'includes/modal.php';
        ?>
            <br>
            <br>
            <?php
            $select_query = "SELECT id,email,name,contact,city,address FROM users WHERE email='".$_SESSION['email']."' AND id='".$_SESSION['user_id']."'";
            $select_query_result = mysqli_query($con,$select_query) or die(mysqli_error($con));
            $row = mysqli_fetch_array($select_query_result);
                                   ?> 
            <div class="container">
            <div class="jumbotron home-spacer" id="products-jumbotron">
                <center>
                    <h4>Welcome&nbsp;&nbsp;<?php echo $row ['name'] ?></h4>
              </center>
            </div>
                <hr>
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="panel-group">
                      <div class="col-sm-3">
                        <?php
                        include 'includes/profile_sidebar.php';
                        ?>
                      </div>  
                    </div>
                    <div class="panel-group">
                        <div class="col-sm-1 offset-sm-1"></div>
                    </div>
                    <div class="panel-group">
                        <div class="col-sm-8">
                            <div class="panel panel-default">
                                <div class="panel-heading color">
                                    <h4 style="color:#000000">My Info</h4>
                                </div>
                                    <div class="panel-body">
                                    <div class="rmvb">
                                        <h5>Name:&nbsp;<?php echo $row['name'];?></h5>
                                        <h5>Contact:&nbsp;<?php echo $row['contact'];?></h5>
                                        <h5>Address:&nbsp;<?php echo $row['address'];?></h5>
                                        <h5>City:&nbsp;<?php echo $row['city'];?></h5>
                                        <h6><a href="edit-profile.php">Edit&nbsp;
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
    <?php
        include 'includes/modal.php';
        ?>
    <?php
            include 'includes/footer.php';
    ?>
</body>
</html>
                                        