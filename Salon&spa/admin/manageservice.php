<?php include ('partials/menu.php');?>

    <div class="main">  
        <div class="wrapper">
             <h1>Manage services</h1>
             <br><br>
             <a href="<?php echo SITEURL;?>admin/addservice.php" class="btn-primary">Add Service</a>
             <br><br><br>
             <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
                if(isset($_SESSION['unauthorize']))
                {
                    echo $_SESSION['unauthorize'];
                    unset($_SESSION['unauthorize']);
                }
                if(isset($_SESSION['up']))
                {
                    echo $_SESSION['up'];
                    unset($_SESSION['up']);
                }
                if(isset($_SESSION['remove-failed']))
                {
                    echo $_SESSION['remove-failed'];
                    unset($_SESSION['remove-failed']);
                }
                
             
             ?>
             <br><br>
             <table class="tbl-full">
                 <tr>
                     <th>S.No</th>
                     <th>Title</th>
                     <th>Price</th>
                     <th>Image</th>
                     <th>Featured</th>
                     <th>Active</th>
                     <th>Actions</th>
                 </tr>
                 <?php
                 
                    $sql = "SELECT * FROM service";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                    $sn=1;
                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id=$row['id'];
                            $title= $row['title'];
                            $price = $row['price'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                            ?>
                                <tr>
                                    <td><?php echo $sn++;?></td>
                                    <td><?php echo $title;?></td>
                                    <td>Rs.<?php echo $price;?></td>
                                    <td>
                                        <?php 
                                        
                                            if($image_name == "")
                                            {
                                                echo "<div class='error'>Image Not Added.</div>";
                                            }
                                            else{
                                                ?>
                                                <img src="<?php echo SITEURL;?>images/service/<?php echo $image_name;?>" width='150px' />
                                                <?php
                                            }
                                        
                                        
                                        ?>
                                    </td>
                                    <td><?php echo $featured;?></td>
                                    <td><?php echo $active;?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/updateservice.php?id=<?php echo $id;?>" class="btn-secondary">Update</a>
                                        <a href="<?php echo SITEURL;?>admin/deleteservice.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    else{
                        echo "<tr><td colspan='2' class='error'>No service Found</td></tr>";
                    }
                 
                 ?>
                
             </table>
             <div class="clearfix"></div>
        </div>
    </div>

<?php include('partials/footer.php');?>