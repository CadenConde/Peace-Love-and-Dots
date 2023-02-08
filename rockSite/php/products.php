<?php include('partials/menu.php'); ?>

<!DOCTYPE html>

<html>
<body class="center">
    <br><br><br><br><br><br><br><br>
    <!--Start of Categories-->
    <section>
        <table class="rock-tbl">
            <tr>
                <td>
                    <img src="../images/shop_rock4.png" class="img-curve img-respond-medium " alt="Ornamant on tree">
                    
                </td>

                <td>
                    <img src="../images/shop_rock3.png" class="img-curve img-respond-medium ">
                    
                </td>

                <td>
                    <img src="../images/shop_rock2.png" class="img-curve img-respond-medium ">
                    
                </td>
                <td>
                    <img src="../images/shop_rock1.png" class="img-curve img-respond-medium ">
                    
                </td>
            </tr>
            <tr>
                <th>Ornaments & Key Chains</th>
                <th>Mushrooms</th>
                <th>Hearts</th>
                <th>Candle Holders</th>
            </tr>
        </table>
    </section>
    <br><br>
    <hr>
    <br><br>
    <!--Start of example Products-->
<section>
    <table>
    <?php 
                    $sql = "SELECT * FROM products";
                    $res = mysqli_query($conn, $sql);
                    if ($res==TRUE)
                    {
                        $count = mysqli_num_rows($res);
                        if ($count>0)
                        {
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

                                    <td><?php echo $prod_name;?></td>


                                    <td> $<?php echo $price;?></td>

                                    <td width = '20%'>
                                        <button onclick="orderProd(<?php echo $id;?>)" class="btn-secondary">Order</button><br>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr>no products found</tr>";
                        }
                    }
                ?>
            
            





        <!--
            <tr>
            <td>
                <img src="../images/shop_rock5.png" alt="Black blue and purple candle holder" class="img-respond-small img-curve">
                <h5><small>Blue & Gray Candle<br>Holder</small></h5>
            </td>

            <td>
                <img src="../images/shop_rock6.png" alt="black heart rock paiont with Rainbow color" class="img-respond-small img-curve">
                <h5><small>Black Painted Heart<br>With Rainbow</small></h5>
            </td>
        
            <td>
                <img src="../images/shop_rock7.png" alt="5 rocks in a circle" class="img-respond-small img-curve">
                <h5><small>Individually Colored<br>Rainbow Rocks</small></h5>
            </td>
        </tr>
        <tr>
            <td>
                <img src="../images/shop_rock8.png" alt="Black Mushroom rock with Rainbow dots" class="img-respond-small img-curve">
                <h5><small>Rainbow on<br>Mushroom Rock</small></h5>
            </td>

            <td>
                <img src="../images/shop_rock9.png" alt="3 black and colored dot keychains" class="img-respond-small img-curve">
                <h5><small>Three Painted<br>Keychains</small></h5>
            </td>

            <td>
                <img src="../images/shop_rock10.png" alt="Black candle holder rock with purple blue and White" class="img-respond-small img-curve">
                <h5><small>Green & Blue<br>on Painted<br>Candle Holder</small></h5>
            </td>
        </tr>
        -->
    </table>
</section>
        <script>
            function orderProd(id=0) {
                location.href = "order.php?id=" + id;
            }
        </script>
<br><br>
    <hr>
    <!-- End of Categories -->

    <!--Footer Start-->
    <section>
        <br><br><br><br>
        <div class="center">
            <img src="../images/Rock-Dudes-Logo.png" alt="Company Logo" class="img-logo img-curve">
        </div>
    </section>
    <!--Footer Ends-->
    </div>
</body>

</html>
