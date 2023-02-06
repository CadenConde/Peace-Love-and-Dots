<?php include('../config/constants.php') ?>
<html>
    <head>
        <title>Rock Website - Home Page </title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
<body>
    <!-- Menu Section Starts -->
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
                
                <li><a href="index.php"><img src="<?php echo SITEURL;?>/images/icons/home.png" alt="Home Icon" width = "50%">
                <br>Home</a></li>
                <br><br><br>

                <li><a href="manage-products.php"><img src="<?php echo SITEURL;?>/images/icons/art-studies.png" alt="Product Icon" width = "50%">
                <br>Products</a></li>
                <br><br><br>

                <li><a href="manage-types.php"><img src="<?php echo SITEURL;?>/images/icons/menu.png" alt="Types Icon" width = "50%">
                <br>Types</a></li>
                <br><br><br>

                <li><a href="manage-orders.php"><img src="<?php echo SITEURL;?>/images/icons/box.png" alt="Order Icon" width = "50%">
                <br>Orders</a></li>
                <br><br><br>

                <li><a href="manage-account.php"><img src="<?php echo SITEURL;?>/images/icons/user.png" alt="User Icon" width = "50%">
                <br>Account</a></li>
            </ul>
        </div>
    </div>
<!-- Menu Section Ends-->

</body>
    <?php
        if ($_SESSION["loggedIn"] == null) {
            header("location:".SITEURL.'admin/login.php');
            $_SESSION["loggedIn"] = false;
            $_SESSION['timestamp'] = time();
        }

        else if((time() - $_SESSION['timestamp'])> 5) { //subtract new timestamp from the old one
            echo"<script>alert('Session Timeout: Please Log-In Again');</script>";
            $_SESSION["loggedIn"] = "sorry";
            header("location:".SITEURL.'admin/login.php');
        }

        if ($_SESSION["loggedIn"] == false) {
            header("location:".SITEURL.'admin/login.php');
        }

        else {
            $_SESSION['timestamp'] = time();
        }

        
        
    ?>
</html>