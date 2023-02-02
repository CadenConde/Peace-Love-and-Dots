<?php include('../config/constants.php') ?>

<head>
        <title>Rock Website - Login Page </title>
        <link rel="stylesheet" href="../css/admin.css">
</head>
<body style="background-color:#def1ff;">
    <div class="wrapper">
        <div>
        <br><br>
        <h1>Rock Site Admin Login</h1>
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
                <br>
                Username:  
                <input type="text" name="username" value="">
                <br><br><br>
                Password:
                <input type="password" name="password" value="">
                <br><br><br>
                <input type="submit" name="submit" value="Enter" class="btn-primary">
                <br><br><br>
            
        </form>
        </div>
        <?php
            if(isset($_POST['submit']))
            {
                $UsernameIn = $_POST['username'];
                $checkPass = md5($_POST['password']);
                if ($checkPass == $hashedPass && $UsernameIn == $username) {
                    $_SESSION["loggedIn"] = true;
                    header("location:" . SITEURL . 'admin/index.php'); 
                } else {
                    echo "Wrong Credentials";
                }
            }
        ?>
    </div>    
</body>


