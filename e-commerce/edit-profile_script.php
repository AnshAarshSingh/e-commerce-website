<?php
require ("includes/common.php");

$select_query = "SELECT id,email,name,contact,city,address FROM users WHERE email='".$_SESSION['email']."' AND id='".$_SESSION['user_id']."'";
$select_query_result = mysqli_query($con,$select_query) or die(mysqli_error($con));
$row = mysqli_fetch_array($select_query_result);

$regex_num = "/^[789][0-9]{9}$/";

$name = $_POST['name'];
$name = mysqli_real_escape_string($con, $name);

$contact = $_POST['contact'];
$contact = mysqli_real_escape_string($con, $contact);


if ($name != NULL and $contact == NULL)
{
    $update_detail = "UPDATE users SET `name` = '$name' WHERE `users`.`email`='".$row['email']."'";
    mysqli_query($con, $update_detail) or die(mysqli_error($con));
}

elseif ($name == NULL and $contact != NULL) 
{
    $update_detail = "UPDATE users SET `contact` = '$contact' WHERE `users`.`email`='".$row['email']."'";
    mysqli_query($con, $update_detail) or die(mysqli_error($con));
}

else
{
    $update_detail = "UPDATE users SET `name` = '$name' WHERE `users`.`email`='".$row['email']."'";
    mysqli_query($con, $update_detail) or die(mysqli_error($con));
    $update_detail = "UPDATE users SET `contact` = '$contact' WHERE `users`.`email`='".$row['email']."'";
    mysqli_query($con, $update_detail) or die(mysqli_error($con));
}

header ('location: edit-success.php');

?>