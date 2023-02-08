<?php include('partials/menu.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="center">
        <!--Image Wall Start-->
        <br><br><br><br><br><br><br>
        <section>
           <h2>Featured Items</h2> 
            <img src="../images/Rock7.png" alt="Mushroom Rock Painted with Rainbow Dots" class="img-respond img-curve">
            <img src="../images/Rock9.png" alt="Mushroom Rock Painted with Rainbow Dots" class="img-respond img-curve">
            <img src="../images/Rock8.png" alt="Mushroom Rock Painted with Rainbow Dots" class="img-respond img-curve">
            <img src="../images/Rock10.png" alt="Mushroom Rock Painted with Rainbow Dots" class="img-respond img-curve">
        </section>
        <br>
        <!-- Featured products Start -->
        <br><br>
        
        <section>
                <table width = 33%>
                <?php 
                    $sql = "SELECT * FROM products WHERE featured = '1';";
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
                                <tr>
                                    <td width = "20%"><img src="<?php echo SITEURL;?>/images/<?php echo $image; ?>" alt="<?php echo $prod_descr; ?>" width = "90%"></td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr>no featured items found</tr>";
                        }
                    }
                ?>
                </table>
        </section>
        <hr>
    </div>
</body>
</html>
        
<?php include('partials/footer.php'); ?>
            
        