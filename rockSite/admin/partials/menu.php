<?php include('../config/constants.php') ?>
<?php ?>
<html>
    <head>
        <title>Food Order Website - Home Page </title>
        <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <!-- Menu Section Starts -->
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-products.php">Products</a></li>
                <li><a href="manage-account.php">Account</a></li>
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