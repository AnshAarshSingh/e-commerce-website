<?php

require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
$user_id = $_SESSION['user_id'];
$item_ids_string = $_GET['itemsid'];

//We will change the status of the items purchased by the user to 'Confirmed'
$query = "UPDATE users_items SET status='Confirmed' WHERE user_id=" . $user_id . " AND item_id IN (" . $item_ids_string . ") and status='Added to cart'";
mysqli_query($con, $query) or die($mysqli_error($con));
?>

<!DOCTYPE html>

<head>
    <title>Success | Life Style Store</title>
    <link rel="shortcut icon" href="img\srtcticon.png" type="image/png">

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Core CSS -->
      <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
      <link href="css/style.css" rel="stylesheet">
    <!-- jQuery -->
      <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
      <script src="js/bootstrap.min.js"></script>
</head>

    <body>
        <?php include 'includes/header.php'; ?>
        <div class="container" id="content">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h3 align="center">Thank you for shopping with us.</h3>
                    <h3 align="center">Your order is confirmed. Your order will be delivered to you soon.</h3>
                    <hr>
                    <h4 align="center"><a href="products.php">Click here</a> to continue shopping.</h4>
                </div>
            </div>
        </div>
        <?php include("includes/footer.php");
        ?>
    </body>
</html>
