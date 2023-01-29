<?php include('partials/menu.php'); ?>
    <div class="main-content">
        <div class="wrapper">

            <h1>Manage Orders</h1>
            <br>

            <?php
                if(isset($_SESSION['delete']))
                {
                    unset($_SESSION['delete']);
                }
            ?>
            <br><br>

            <table class= "tbl-full">
                <tr>
                    <th>Item</th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Shipping Address</th>
                    <th>Customer Email</th>
                    <th>Time of Order</th>
                    <th>Actions</th>
                </tr>

                <?php 
                    $sql = "SELECT * FROM orders INNER JOIN products ON orders.prod_id=products.ID;";
                    $res = mysqli_query($conn, $sql);
                    if ($res==TRUE)
                    {
                        $count = mysqli_num_rows($res);
                        if ($count>0)
                        {
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                $id = $rows['order_id'];
                                $status=$rows['status'];
                                $custName=$rows['customer_first']." ".$rows['customer_last'];
                                $image=$rows['imageFile'];
                                $address=$rows['customer_address'];;
                                $email = $rows['customer_email'];
                                $time = $rows['time'];
                                ?>
                               
                                <tr>
                                    <td width = "20%"><img src="<?php echo SITEURL;?>/images/<?php echo $image; ?>" alt="<?php echo $prod_descr; ?>" width = "90%"></td>
                                    <td><?php echo $status;?></td>
                                    <td><?php echo $custName;?></td>
                                    <td><?php echo $address;?></td>
                                    <td><?php echo $email?></td>
                                    <td><?php echo $time?></td>
                                    <td width = '20%'>
                                        <button onclick="setStatus(<?php echo $id;?>,'<?php echo $status;?>')" class="btn-secondary"><?php if ($status == "Pending") {
                                            echo "M";
                                        } else {
                                            echo "Unm";
                                        }?>ark as Complete</button>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr>no data found</tr>";
                        }
                    }
                ?>
            </table>
            <script>
                function setStatus(id=0, status = "Pending") {
                    location.href = "order-status.php?id=" + id + "&status=" + status;
                }
            </script>
        </div>
    </div>

<?php include('partials/footer.php'); ?>

