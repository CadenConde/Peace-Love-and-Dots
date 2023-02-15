<?php include('partials/menu.php'); ?>

    
    <!--Start of Categories-->
    <section style=background-color:#8fa4a8;>
    <br><br><br>
        <div class="center">
            <h2>Shop</h2>
        </div>
        <br><br>
       <hr style="margin: 0">
        </section>
    
    
    <!--Start of example Products-->
<section style=background-color:#b4d2fd;>
    <br>
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
                        if($prod_descr != $sorter){
                            continue;
                        }
                    }
                    $counter++;
                    ?>
                    <tr>
                    <td width = "inherit"><img src="<?php echo SITEURL;?>/images/<?php echo $image; ?>" alt="<?php echo $prod_descr; ?>" width = "90%"></td>

                    <td width = "inherit"><?php echo $prod_name;?></td>


                    <td> $<?php echo $price;?></td>

                    <td width = "inherit">
                        <button onclick="sendOrder(<?php echo $id;?>)" class="btn-secondary">Order</button><br>
                    </td>
                    </tr>
                    <?php
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
    <br><br>
    <hr>
</section>
        <script>
            function sendOrder(id=0) {
                location.href = "order.php?id=" + id;
            }
        </script>
    <!-- End of Categories -->

    
    </div>

<?php include('partials/footer.php'); ?>
