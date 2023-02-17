<?php include('partials/menu.php'); ?>
<div class="main-content">
        <div class="wrapper">
            <h1>Update Type</h1>
            <br><br>
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Type: </td>
                        <td> 
                            <input type="text" name="type" placeholder="Type">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Save" class="btn-secondary">
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
    $type = $_POST['type'];
    $sql = "INSERT INTO `prod_types` (`id`, `type`) VALUES (NULL, '$type')";;
    $res = mysqli_query($conn, $sql) or die();
    if ($res = TRUE)
    {
        header("location:".SITEURL.'admin/manage-types.php');
    }
    else{
        echo "Failed to Insert Data";
    }
}
?>