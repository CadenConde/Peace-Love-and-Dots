<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Product</h1>
            <br><br>
        
            <?php 
                $id=$_GET['id'];

                $sql="SELECT * FROM products WHERE id = $id";

                $res=mysqli_query($conn, $sql);

                if ($res==true)
                {
                    $count = mysqli_num_rows($res);

                    if ($count>=1)
                    {
                        $row=mysqli_fetch_assoc($res);

                        $id = $row['ID'];
                        $prod_name=$row['Name'];
                        $prod_descr=$row['Description'];
                        $image=$row['imageFile'];
                        $price = $row['Price'];
                    }
                    else{
                        header('location:'.SITEURL.'admin/manage-products.php');
                    }
                }
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>New Name: </td>
                        <td> 
                            <input type="text" name="Name" value="<?php echo $prod_name?>">
                        </td>
                    </tr>
                    <tr>
                        <td>New Description: </td>
                        <td> 
                            <input type="text" name="description" value="<?php echo $prod_descr?>">
                        </td>
                    </tr>
                    <tr>
                        <td>New Image File: </td>
                        <td> 
                            <input type="file" name="image" accept="image/png, image/jpeg">
                        </td>
                        <td width = 50%>
                            (Leave blank to keep image)
                        </td>
                    </tr>
                    <tr>
                        <td>New Price: </td>
                        <td> 
                            <input type="text" name="price" value="<?php echo $price?>">
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

    $Name = $_POST['Name'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    if ($image == null) {
        $image = $row['imageFile'];
    }
    $price = $_POST['price'];

    $sql = "UPDATE products SET Name = '$Name', Description = '$description', imageFile = '$image', price = '$price' WHERE ID = $id;";

    $res = mysqli_query($conn, $sql) or die();

    if ($res = TRUE)
    {
        header("location:".SITEURL.'admin/manage-products.php');
    }
    else{
        echo "Failed to Insert Data";
    }

}
?>