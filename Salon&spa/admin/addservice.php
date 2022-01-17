<?php include('partials/menu.php');?>

<div class="main">
    <div class="wrapper">
        <h1>Add Service</h1>
        <br><br>
        <?php
             if(isset($_SESSION['upload']))
             {
                 echo $_SESSION['upload'];
                 unset($_SESSION['upload']);
             }
        ?>
        <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Enter Title">
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description"  cols="30" rows="5" placeholder="Enter Description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price" placeholder="Enter Price">
                    </td>
                </tr>
                <tr>
                    <td>Image:</td>
                    <td>
                        <input type="file" name="image" >
                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category" >
                            <?php
                            
                                $sql = "SELECT * FROM category WHERE active ='Yes' ";

                                $res = mysqli_query($conn,$sql);

                                $count = mysqli_num_rows($res);

                                if($count>0)
                                {
                                    while($row = mysqli_fetch_assoc($res))
                                    {
                                        $id = $row['id'];
                                        $title = $row['title'];
                            ?>
                                        <option value="<?php echo $id;?>"><?php echo $title;?></option>
                            <?php
                                    }
                                }
                                else{
                            ?>
                                    <option value="0">No Category Found</option>
                            <?php
                                }
                            
                            ?>
                            
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Add Service" name ="submit" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php

            if(isset($_POST['submit']))
            {
                // $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                if(isset($_POST['featured']))
               {
                   $featured = $_POST['featured'];
               }
               else{
                   $featured = 'No';
               }
               if(isset($_POST['active']))
               {
                   $active = $_POST['active'];
               }
               else{
                   $active = 'No';
               }
               if(isset($_FILES['image']['name']))
               {
                    $image_name = $_FILES['image']['name'];
                    if($image_name !="")
                    {
                        $ext = end(explode('.',$image_name));
                        $image_name = "Service_".rand(000,999).'.'.$ext;

                        $src = $_FILES['image']['tmp_name'];
                        $dst = "../images/service/".$image_name;
                        $upload = move_uploaded_file($src,$dst);

                        if($upload == False)
                        {
                                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
                                header('location:'.SITEURL.'admin/addservice.php');
                                die();
                        }
                    }
               }
               else{
                   $image_name  = "";
               }
            

               $sql2 = "INSERT INTO service SET
               title = '$title',
               description = '$description',
               price = $price,
               image_name = '$image_name',
               category_id = $category,
               featured = '$featured',
               active = '$active'
               ";

               $res2 = mysqli_query($conn,$sql2);
               if($res2 == True)
               {
                    $_SESSION['add'] = "<div class='success'>Service Added Successfully.</div>";
                    header('location:'.SITEURL.'admin/manageservice.php');
               }
               else
               {
                    
                    $_SESSION['add'] = "<div class='error'>Failed to Add Service.</div>";
                    header('location:'.SITEURL.'admin/manageservice.php');
               }
            }
        ?>
    </div>
</div>


<?php include('partials/footer.php');?>