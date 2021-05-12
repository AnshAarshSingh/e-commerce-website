<?php

require ("includes/common.php");


$select_query = "SELECT id,email,name,contact,city,address FROM users WHERE email='".$_SESSION['email']."' AND id='".$_SESSION['user_id']."'";
$select_query_result = mysqli_query($con,$select_query) or die(mysqli_error($con));
$row = mysqli_fetch_array($select_query_result);

$address = $_POST['address'];
$address = mysqli_real_escape_string($con,$address);

$city = $_POST['city'];
$city = mysqli_real_escape_string($con, $city);

if ($address != NULL and $city == NULL)
{
    $update_detail = "UPDATE users SET `address` = '$address' WHERE `users`.`email`='".$row['email']."'";
    mysqli_query($con, $update_detail) or die(mysqli_error($con));
}

elseif ($address == NULL and $city != NULL) 
{
    $update_detail = "UPDATE users SET `city` = '$city' WHERE `users`.`email`='".$row['email']."'";
    mysqli_query($con, $update_detail) or die(mysqli_error($con));
}

else
{
    $update_detail = "UPDATE users SET `address` = '$address' WHERE `users`.`email`='".$row['email']."'";
    mysqli_query($con, $update_detail) or die(mysqli_error($con));
    $update_detail = "UPDATE users SET `city` = '$city' WHERE `users`.`email`='".$row['email']."'";
    mysqli_query($con, $update_detail) or die(mysqli_error($con));
}

header ('location: edit-success.php');

?>
