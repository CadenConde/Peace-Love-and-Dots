<?php include('../config/constants.php') ?>
<div class="main-content">
        <div class="wrapper">
            <h1>Admin Login</h1>
            <br><br>
        
            <?php
                $_SESSION["loggedIn"] = false;
                $sql="SELECT * FROM login;";

                $res=mysqli_query($conn, $sql);

                if ($res==true)
                {
                    $count = mysqli_num_rows($res);

                    if ($count>=1)
                    {
                        $row=mysqli_fetch_assoc($res);

                        $username = $row['Username'];
                        $hashedPass=$row['Password'];
                    }
                    else{
                        echo "problem";
                    }
                }
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Username: </td>
                        <td> 
                            <input type="text" name="username" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td> 
                            <input type="password" name="password" value="">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Enter" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>    
    </div>

<?php include('partials/footer.php'); ?>

<?php

if(isset($_POST['submit']))
{
    $UsernameIn = $_POST['username'];
    $checkPass = md5($_POST['password']);
    if ($checkPass == $hashedPass) {
        if ($UsernameIn == $username) {
            $_SESSION["loggedIn"] = true;
            header("location:" . SITEURL . 'admin/index.php');
        }else {
            echo "Wrong username";
        }
    } else {
        echo "Wrong password";
    }
}
?>