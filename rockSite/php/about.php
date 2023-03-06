<?php include('partials/menu.php'); ?>
<br>
    <!--About Info Starts-->
    
   <section>
        <br><br>
        <h2 style="text-align:center">About</h2>
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
        <table style="width:100%">
            <tr>
                <td>
                    <div class="about-text">
                        <?php echo $about?>
                    </div>
                </td>
                <td  style="padding-right:5%">
                    <div>
                        <img src="../images/PPRock Dudes.png" alt="Owner's Profile Picture" class="img-respond" style="float: right;" >
                    </div>
                </td>
            </tr>
        </table>
        <div class="center"><u>Socials</u></div>
        <table style="width:100%; padding-left:20%; padding-right:20%">
            <tr>
                <td><a href="https://www.facebook.com/Peacelovedots/" class="socials">Facebook</a></td>
                <td><a href="https://www.instagram.com/peacelovedots/" class="socials">Instagram</a></td>
                <td><a href="http://tiktok.com/@peacelovedots" class="socials">TikTok</a></td>
                <td><a href="http://www.pinterest.com/amykk727" class="socials">Pinterest</a></td>
            </tr>
        </table>
        <!--About Info Ends-->
    </section>
    <br><br><br>
   <?php include('partials/footer.php'); ?>