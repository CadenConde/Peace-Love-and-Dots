<?php include('../config/constants.php') ?>
<?php ?>
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

                <li><a href="manage-products.php"><img src="<?php echo SITEURL;?>/images/icons/art-studies.png" alt="Order Icon" width = "50%">
                <br>Products</a></li>
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
            $_SESSION["loggedIn"] = false;
        }
        if ($_SESSION["loggedIn"] == false) {
            header("location:".SITEURL.'admin/login.php');
        }
    ?>
</html>