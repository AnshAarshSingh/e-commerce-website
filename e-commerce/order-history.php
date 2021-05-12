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
                                    <h4 style="color:#000000">My Order History</h4>
                                </div>
                                    <div class="panel-body">
                                    <div class="rmvb">
                                        <table class="table table-responsive table-bordered container-fluid">
                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $query = $query = "SELECT items.price AS Price, items.id, items.name AS Name FROM users_items JOIN items ON users_items.item_id = items.id WHERE users_items.user_id='$user_id' and status='Confirmed'";
                                            $result = mysqli_query($con,$query) or die($mysqli_error($con));
                                            if (mysqli_num_rows($result)>=1)
                                            {
                                            ?>
                                            <thead style="background-color: #cecbcb;">
                                                <tr>
                                                    <th>Item Number</th>
                                                    <th>Item Name</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_array($result)) 
                                                {
                                                    $id = "";
                                                    $id .= $row["id"] . ",";
                                                    echo "<tr>
                                                            <td>" . "#" . $row["id"] . "</td>
                                                            <td>" . $row["Name"] . "</td>
                                                            <td>Rs " . $row["Price"] . "</td>
                                                        </tr>";
                                                }
                                                ?>
                                            </tbody>
                                               <?php
                                               }
                                               else 
                                               {
                                                   echo "<center><h4>Oops! No orders found.&nbsp;<a href='products.php'>Click here to order</a></h4></center>";
                                               }
                                               
                                               ?>
                                        </table>
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