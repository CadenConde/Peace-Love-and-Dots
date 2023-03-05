<?php include('partials/menu.php'); ?>

    
    <!--Start of Categories-->
    <section>
    <br><br><br>
        <div class="center">
            <h2>Shop</h2>
        </div>
        </section>
    <!--Start of example Products-->
<section>
    
        <div class="sortBy" align="right">
            <div class="ddropdown"><u>Sort By Categories</u>
                <div class="ddropdown-content">
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

    
    <table class="pro-tbl">
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
                        if($prod_descr != $sorter){
                            continue;
                        }
                    }
                    $counter++;
                    ?>
                    <?php 
                    if ($counter % 2 != 0)
                    {
                        echo "<tr>";
                    } ?>
                        <td style="padding-right: 15px; padding-bottom:10px;"><img src="<?php echo SITEURL;?>/images/<?php echo $image; ?>" alt="<?php echo $prod_descr;?>" width="300px" class="img-curve"></td>
                        <td style="padding-right: 145px; padding-bottom:10px;"><?php echo $prod_name;?><br> $<?php echo $price;?><br>
                            <button onclick="sendOrder(<?php echo $id;?>)" class="btn-secondary">Order</button><br>
                        </td>
                    <?php
                    if($counter % 2 == 0){
                        echo "</tr>";
                    }
                    ?>
                    <?php
                }
                if($counter == 0){
                    echo '<br><div class = "center">No Products Found</div>';
                }
            } else {
                echo '<br><div class = "center">No Products Found</div>';
            }
            
        }
    ?>
    </table>
    <br><br>
    
</section>
        <script>
            function sendOrder(id=0) {
                location.href = "order.php?id=" + id;
            }
        </script>
    <!-- End of Categories -->

    
    </div>

<?php include('partials/footer.php'); ?>
