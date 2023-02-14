<?php include('partials/menu.php'); ?>

    <br><br><br>
    <!--Start of Categories-->
    <section>
        <div class="center">
            <h2>Shop</h2>
        </div>
        <div class="sortBy" align="right">
            <div class="dropdown"><u>Sort By Categories</u>
                <div class="dropdown-content">
                    <?php   
                    $sql = "SELECT * FROM prod_types";
                    $res = mysqli_query($conn, $sql);
                    if ($res==TRUE)
                    {
                        $count = mysqli_num_rows($res);
                        if ($count>0)
                        {
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                $id = $rows['id'];
                                $type = $rows['type'];
                    
                                
                                ?>
                                    <a href="products.php?sort=<?php echo $type;?>"><?php echo $type; ?></a>
                                <?php
                                
                            }
                        }
                    }
                    ?>
                    <a href="products.php">All</a>

                </div>
            </div>
            
            
        </div>
        <!--
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
        -->
    </section>
    
    <br><br>
    <!--Start of example Products-->
<section>
    <table>
    <?php 
        $sql = "SELECT * FROM products WHERE sold = 0";
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
                    if(isset($_GET['sort'])){
                        $sorter = $_GET['sort'];
                        if($prod_descr == $sorter){
                            $counter++;
                        ?>
                    
                        <tr>
                            <td width = "20%"><img src="<?php echo SITEURL;?>/images/<?php echo $image; ?>" alt="<?php echo $prod_descr; ?>" width = "90%"></td>
    
                            <td><?php echo $prod_name;?></td>
    
    
                            <td> $<?php echo $price;?></td>
    
                            <td width = '20%'>
                                <button onclick="sendOrder(<?php echo $id;?>)" class="btn-secondary">Order</button><br>
                            </td>
                        </tr>
                        <?php
                        }
                    }
                    else{
                        $counter++;
                        ?>
                    
                        <tr>
                            <td width = "20%"><img src="<?php echo SITEURL;?>/images/<?php echo $image; ?>" alt="<?php echo $prod_descr; ?>" width = "90%"></td>
    
                            <td><?php echo $prod_name;?></td>
    
    
                            <td> $<?php echo $price;?></td>
    
                            <td width = '20%'>
                                <button onclick="sendOrder(<?php echo $id;?>)" class="btn-secondary">Order</button><br>
                            </td>
                        </tr>
                        <?php
                    }
                    
                }
                if($counter == 0){
                    echo '<div class = "center">No Products Found</div>';
                }
            } else {
                echo '<div class = "center">No Products Found</div>';
            }
            
        }
    ?>
    </table>
</section>
        <script>
            function sendOrder(id=0) {
                location.href = "order.php?id=" + id;
            }
        </script>
<br><br>
    <hr>
    <!-- End of Categories -->

    
    </div>
</body>

</html>

<?php include('partials/footer.php'); ?>
