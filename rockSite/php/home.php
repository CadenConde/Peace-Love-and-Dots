<?php include('partials/menu.php'); ?>


    <script src="../scripts/scroll.js" defer></script>
    <link href="../css/flickity.css" media="screen" rel="stylesheet">
    <script src="../scripts/flickity.pkgd.min.js"></script>
    
    <div class="center">
        <br><br><br><br><br>
        <!-- Featured products Start -->
        
        <section class="center">

            <div class="home-banner">
                <img src="../images/banner_heart_left.png" width="15%;" alt="Heart on left side of banner">
                <img src="../images/cropped_rockdudes_banner.png" width="40%;" alt="Peace love and dots text">
                <img src="../images/banner_heart_right.png" width="15%;" alt="Heart on right side of banner">
            </div>

            <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true, "autoPlay": true, "lazyLoad": true }'>

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
                                <div class="gallery-cell"><a href="order.php?id=<?php echo $id?>"><img src="<?php echo SITEURL;?>/images/<?php echo $image; ?>" alt="<?php echo $prod_descr; ?>" class="carousel-img"></a></div>
                                <?php
                            }
                        } else {
                            echo "no featured items found";
                        }
                    }
                ?>
            </div>
        </section>
    </div>   

    <?php include('partials/footer.php'); ?>
