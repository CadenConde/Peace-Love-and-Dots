<?php include('partials/menu.php'); ?>


    <script src="../scripts/scroll.js" defer></script>

    <div class="center">
        <br><br><br><br><br>
        <!-- Featured products Start -->
        
        <section class="center">

            <div class="home-banner">
                <img src="../images/banner_heart_left.png" width="15%;">
                <img src="../images/cropped_rockdudes_banner.png" width="40%;">
                <img src="../images/banner_heart_right.png" width="15%;">
            </div>


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
        
    </div>   

    <?php include('partials/footer.php'); ?>

