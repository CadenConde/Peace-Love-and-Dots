<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Product</h1>
        <br><br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Rock Name: </td>
                    <td> 
                        <input type="text" name="Name" placeholder="Name">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td> 
                        <input type="text" name="description" placeholder="Description">
                    </td>
                </tr>
                <tr>
                    <td>Image File: </td>
                    <td> 
                        <input type="file" name="image" accept="image/png, image/jpeg">
                    </td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td> 
                        <input type="text" name="price" placeholder="Price">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Product" class="btn-secondary">
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
    $Name = $_POST['Name'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $price = $_POST['price'];

    $sql = "INSERT INTO `products` (`ID`, `Name`, `Description`, `imageFile`, `Price`) VALUES (NULL, '$Name', '$description', '$image', '$price')";

    $res = mysqli_query($conn, $sql) or die();

    if ($res = TRUE)
    {
        echo "Data Inserted";
        header("location:".SITEURL.'admin/manage-products.php');
    }
    else{
        echo "Failed to Insert Data";
        header("location:".SITEURL.'admin/manage-products.php');
    }

}
?>