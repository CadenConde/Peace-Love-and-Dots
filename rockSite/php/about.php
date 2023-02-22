<?php include('partials/menu.php'); ?>
<br>
    <!--About Info Starts-->
   <section>
       
        <br><br>
        <h2 style="text-align:center">About Me!</h2>
        <?php 
               $sql = "SELECT * FROM about"; //get about from database
               $res = mysqli_query($conn, $sql);
               if ($res == TRUE) {
                   $row=mysqli_fetch_assoc($res);
                   $count = mysqli_num_rows($res);
                   if ($count > 0) {
                       $about = $row['about'];
                   }
               }
               ?>
        <div>
        <img src="../images/PPRock Dudes.png" alt="Owner's Profile Picture" class="img-respond" style="float: left;">
        </div>
        <div class="about-text">
            <?php echo $about?>
        </div>
        <!--About Info Ends-->
<hr>
   <?php include('partials/footer.php'); ?>