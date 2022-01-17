<?php include('partials/menu.php'); ?>
<?php
 
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql2 = "SELECT * FROM service WHERE id=$id";
        $res2 = mysqli_query($conn,$sql2);
        $row = mysqli_fetch_assoc($res2);

        $title = $row['title'];
        $description = $row['description'];
        $price = $row['price'];
        $current_image = $row['image_name'];
        $category = $row['category_id'];
        $featured = $row['featured'];
        $active = $row['active'];
    }
    else
    {
        header('location:'.SITEURL.'admin/manageservice.php');
    }
 
?>

    <div class="main">
        <div class="wrapper">
            <h1>Update Service</h1>
            <br><br><br>
            
            <form action="" method= "POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="title" value="<?php echo $title;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td>
                            <textarea name="description"  cols="30" rows="5"><?php echo $description; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td>
                            <input type="number" name="price" value="<?php echo $price;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Current Image:</td>
                        <td>
                           <?php 
                           
                            if($current_image == "")
                            {
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else{
                            ?>
                                <img src="<?php echo SITEURL; ?>images/service/<?php echo $current_image; ?>" width="150px">
                            <?php
                            }
                           
                           ?>
                        </td>
                    </tr>
                    <tr>
                        <td>New Image:</td>
                        <td>
                            <input type="file" name="image" >
                        </td>
                    </tr>
                    <tr>
                        <td>Category:</td>
                        <td>
                            <select name="category" >
                                <?php
                                
                                    $sql = "SELECT * FROM category WHERE active='Yes'";

                                    $res = mysqli_query($conn,$sql);

                                    $count = mysqli_num_rows($res);

                                    if($count>0)
                                    {
                                        while($row2 = mysqli_fetch_assoc($res))
                                        {
                                            $category_id = $row2['id'];
                                            $category_title = $row2['title'];

                                            // echo "<option value='$id'>$title</option>";
                                            ?>
                                            <option <?php if($category_id == $id){ echo "selected"; } ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    <?php
                                        }
                                    }
                                    else{
                                        echo "<option value='0'>Category Not Available.</option>";
                                    }
                                
                                
                                ?>
                               
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Featured:</td>
                        <td>
                            <input <?php if($featured=='Yes'){echo "checked";} ?> type="radio" name="featured" value="Yes" > Yes
                            <input <?php if($featured=='No'){echo "checked";} ?> type="radio" name="featured" value="No" > No
                        </td>
                    </tr>
                    <tr>
                        <td>Active:</td>
                        <td>
                            <input <?php if($active=='Yes'){echo "checked";} ?> type="radio" name="active" value="Yes" > Yes
                            <input <?php if($active =='No'){echo "checked";} ?> type="radio" name="active" value="No" > No
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                            <input type="submit" value="Update Service" name="submit" class="btn-secondary">
                        </td>
                    </tr>
                </table>
        </form>
        <?php
            
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];
                
                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];
                    if($image_name != "")
                    {
                        $ext = end(explode('.',$image_name));
                        $image_name = "service_".rand(000,999).'.'.$ext;
                        $src = $_FILES['image']['tmp_name'];
                        $dst = "../images/service/".$image_name;
                        $upload = move_uploaded_file($src,$dst);
                        if($upload == False)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to upload Image.</div>";
                            header('location:'.SITEURL.'admin/manageservice.php');
                            die();
                        }
                        
                        if($current_image !="")
                        {
                            $remove_path = "../images/service/".$current_image;
                            $remove = unlink($remove_path);
                            if($remove == False)
                            {
                                $_SESSION['remove-failed'] = "<div class='error'>Failed to Remove Current Image. </div>";
                                header('location:'.SITEURL.'admin/manageservice.php');
                                die();
                            }
                        }
                    }
                    else{
                        $image_name = $current_image;   
                    }
                }
                else{
                    $image_name = $current_image;
                }


                $sql3 = "UPDATE service SET
                
                title = '$title',
                description = '$description',
                price = $price,
                image_name = '$image_name',
                category_id = $category,
                featured = '$featured', 
                active = '$active'
                WHERE id=$id
                ";

                $res3 = mysqli_query($conn,$sql3);

                if($res3 == True)
                {
                    $_SESSION['up'] = "<div class='success'>Service updated Successfully.</div>";
                    // echo 'http://localhost/salon&spa/admin/manageservice.php';
                    echo("<script>location.href ='http://localhost/salon&spa/admin/manageservice.php';</script>");
                    // header('Location:http://localhost/salon&spa/admin/manageservice.php');
                    
                    
                }
                else{
                    $_SESSION['up'] = "<div class='error'>Failed to Updateservice.</div>";
                    echo("<script>location.href ='http://localhost/salon&spa/admin/manageservice.php';</script>");
                    // header('location:http://localhost/salon&spa/admin/manageservice.php');
                }
            }
        ?>

            
        </div>
    </div>

<?php include('partials/footer.php'); ?>