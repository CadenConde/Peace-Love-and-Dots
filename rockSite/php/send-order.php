<?php  
    include('../config/constants.php');

    $id = $_GET['prod_id'];
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $email = $_GET['email'];
    $address = $_GET['address1'] . " " . $_GET['address2'] . " " . $_GET['address3'] . " " . $_GET['address4'];
    $time = time();
    $id = $_GET['prod_id'];

    $sql = "INSERT INTO `orders` (`order_id`, `prod_id`, `status`, `customer_address`, `customer_email`, `time`, `customer_first`, `customer_last`) VALUES (NULL, '$id', 'Pending', '$address', '$email', $time, $fname, $lname)";

    $res = mysqli_query($conn, $sql);

    if ($res==true)
    {
        header("location:".SITEURL.'php/home.php');
    }
    else{
        echo "error sending order"; 
    }
        
?>