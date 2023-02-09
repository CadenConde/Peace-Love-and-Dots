<?php include('partials/menu.php'); ?>
<br><br><br><br><br><br>

<?php 
    $id =  $_GET['id'];
    $sql = "SELECT * FROM products WHERE ID = '$id';";
    $res = mysqli_query($conn, $sql);
    if ($res == TRUE) {
        $rows = mysqli_fetch_assoc($res);
            $id = $rows['ID'];
            $prod_name=$rows['Name'];
            $prod_descr=$rows['Description'];
            $image=$rows['imageFile'];
            $price=number_format($rows['Price'], 2);
            
            ?>
            <div class="center">
                <h1>ORDER ITEM</h1>
                <img src="<?php echo SITEURL;?>/images/<?php echo $image; ?>" alt="<?php echo $prod_descr; ?>" width = "20%">
                <h3>$<?php echo $price; ?></h3>
            </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="rock-tbl">
                        <tr><td><u>CUSTOMER INFO</u></td></tr>
                        <tr>
                            <td>First Name: </td>
                            <td> 
                                <input type="text" name="fName" placeholder="First Name">
                            </td>
                        </tr>
                        <tr>
                            <td>Last Name: </td>
                            <td width = "20%";> 
                                <input type="text" name="lName" placeholder="Last Name">
                            </td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td> 
                                <input type="text" name="email" placeholder="e.g. johnsmith@gmail.com">
                            </td>
                        </tr>
                        <tr><td><u>SHIPPING INFO</u></td></tr>
                        <tr>
                            <td>Address Line 1: </td>
                            <td> 
                                <input type="text" name="line1" placeholder="Address Line 1">
                            </td>
                        </tr>
                        <tr>
                            <td>Address Line 2: </td>
                            <td> 
                                <input type="text" name="line2" placeholder="(optional)">
                            </td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td> 
                                <input type="text" name="city" placeholder="e.g. New York">
                            </td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td> 
                                <input type="text" name="state" placeholder="e.g. NY">
                            </td>
                        </tr>
                        <tr>
                            <td>Zip Code</td>
                            <td> 
                                <input type="text" name="zip" placeholder="e.g. 12345">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Proceed to Checkout" class="btn-secondary">
                            </td>
                        </tr>
                    </table>
                </form>         
            <?php
            
    }
    if (isset($_POST['submit'])) {
        $fname = $_POST['fName'];
        $lname = $_POST['lName'];
        $email = $_POST['email'];
        $address1 = $_POST['line1'];
        $address2 = $_POST['line2'];
        $address3 = $_POST['city'] . " " . $_POST['state'] . " " . $_POST['zip'];
        $vars = "?prod_id=$id&fname=$fname&lname=$lname&email=$email&address1=$address1&address2=$address2&address3=$address3";

        echo '<script type="text/javascript">function jsFunction(){location.href = "send-order.php'.$vars.'";}</script>';
        echo '<script type="text/javascript">jsFunction();</script>'; //things broke so i cheated the link

    }

    
    ?>


<?php include('partials/footer.php');?>