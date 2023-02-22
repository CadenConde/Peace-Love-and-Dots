<?php include('../config/constants.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Peace, Love, and Dots home page showcasing magnificent painted rocks">
    <script src="../scripts/scroll.js" defer></script>
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <script src="../scripts/menuClick.js"></script>
    <title>Peace, Love, & Dots</title>

    <style>
        @media (max-width: 750px) {
            .navlinks {
                display: inline;
            }

            .menu-lines {
                display: none;
            }
        }

    </style>
</head>
<body style="background-color:#F8E2C4; margin: 0 0;">
<div class="navbar">
    <div class="navlinks" style="text-align: center;">
        <a href="home.php">Home</a>
        <a href="products.php">Shop</a>
        <a href="about.php">About</a>
    </div>

    <div class="menu">
        <div class="menu-lines">
            <div class="hamburger" onclick="menuClick()">
                <div class="ham-line"></div>
                <div class="ham-line"></div>
                <div class="ham-line"></div>
            </div>
            <div id="dropdown" class="dropdown-content">
                <img src="../images/icons/homeicon.png" class="dropdown-img">
                <a href="home.php">Home</a>
                <img src="../images/icons/shopicon.png" class="dropdown-img">
                <a href="products.php">Shop</a>
                <img src="../images/icons/abouticon.png" class="dropdown-img">
                <a href="about.php">About</a>
            </div>
        </div>
    </div>
</div>

    <div class="center">
        <br><br><br><br>
        <!-- Featured products Start -->
        
        <section class="center">
            <div class="home-banner">
                <img src="../images/banner_heart_left.png" width="15%;">
                <img src="../images/cropped_rockdudes_banner.png" width="40%;">
                <img src="../images/banner_heart_right.png" width="15%;">
            </div>
            
            <h2>Featured Items</h2>
                <?php 
                    $sql = "SELECT * FROM products WHERE featured = '1' && sold = '0';";
                    $res = mysqli_query($conn, $sql);
                    if ($res==TRUE)
                    {
                        $count = mysqli_num_rows($res);
                        if ($count>0)
                        {
                            $counter = 0;
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                $id = $rows['ID'];
                                $prod_name=$rows['Name'];
                                $prod_descr=$rows['Description'];
                                $image=$rows['imageFile'];
                                $price=number_format($rows['Price'], 2);
                                ?>
                                <div class="img-spacing obs">
                                    <a href="order.php?id=<?php echo $id?>"><img src="<?php echo SITEURL;?>/images/<?php echo $image; ?>" alt="<?php echo $prod_descr; ?>" width="90%" class="img-curve featured-img"></a>
                                </div>
                                <?php
                            }
                        } else {
                            echo "no featured items found";
                        }
                    }
                ?>
        </section>
        <hr>
    </div>
</body>
</html>
        
<?php include('partials/footer.php'); ?>
