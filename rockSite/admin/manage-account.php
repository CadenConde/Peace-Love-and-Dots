<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Account</h1>
        <?php 
               
            $sql = "SELECT * FROM login";
        
            $res = mysqli_query($conn, $sql);
            
        
            if ($res == TRUE) {
                $row=mysqli_fetch_assoc($res);
                $count = mysqli_num_rows($res);
                if ($count > 0) {
                    $username = $row['Username'];
                    $passwordLength = $row['passwordLength'];
                }
            }?>

            <br><br>
            <table class= "tbl-full">
                <tr>
                    <td>Username:</td>
                    <td><?php echo $username;?></td>
                    <td>
                        <a href="change-username.php" class="btn-secondary">Change Username</a>
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <?php for ( //just make the number of dots as password length
                        $x = 0;
                        $x < $passwordLength;
                        $x++
                    ) {
                        echo "●";
                    }?>
                    </td>
                    <td>
                        <a href="change-password.php" class="btn-secondary">Change Password</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button onclick="logOut()" class="btn-secondary">Log Out</button>
                    </td>
                </tr>
            </table>
            <script>
                function logOut(){
                    location.href = "login.php";
                }
            </script>
    </div>
</div>





<?php include('partials/footer.php'); ?>
