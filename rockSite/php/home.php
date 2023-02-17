<?php include('partials/menu.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="../scripts/scroll.js" defer></script>
</head>
<body>
    <div class="center">
        <br><br><br><br>
        <!-- Featured products Start -->
        
        <section class="center">
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
                                <div class="img-spacing">
                                    <a href="order.php?id=<?php echo $id?>"><img src="<?php echo SITEURL;?>/images/<?php echo $image; ?>" alt="<?php echo $prod_descr; ?>" width = "90%" class="obs img-curve featured-img"></a>
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
