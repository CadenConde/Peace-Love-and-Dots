<?php include('partials/menu.php');
    $sql = "SELECT * FROM products";
    $res = mysqli_query($conn, $sql);
    $prodCount = mysqli_num_rows($res);

    $sql = "SELECT * FROM orders WHERE status = 'Pending'";
    $res = mysqli_query($conn, $sql);
    $pendCount = mysqli_num_rows($res);

    $sql = "SELECT * FROM orders WHERE status = 'Complete'";
    $res = mysqli_query($conn, $sql);
    $complCount = mysqli_num_rows($res);
?>

    <div class="main-content">
        <div class="wrapper">
            <div class = "title"><h1>Home</h1></div>
            <div class="col-4 text-center home-box">
                <h1><?php echo $prodCount?></h1>
                Products Available
            </div>
            <div class="col-4 text-center home-box">
                <h1><?php echo $pendCount?></h1>
                Pending Orders
            </div>
            <div class="col-4 text-center home-box">
                <h1><?php echo $complCount?></h1>
                Completed Orders
            </div>
        </div>
    </div>
    <body onLoad="addElement();"></body>
    <div id="div1"></div>
    
    <section class="footer-bottom">
    <?php include('partials/footer.php'); ?>
    </section>
