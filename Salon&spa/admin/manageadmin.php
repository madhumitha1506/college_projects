<?php include ('partials/menu.php');?>
    <div class="main">
        <div class="wrapper">
             <h1>Manage Admin</h1>
             <br>
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
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }
                if(isset($_SESSION['pwd-not-match']))
                {
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                }
                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                }
             
             
             
             ?>
             <br>
             <br>
             <a href="addadmin.php" class="btn-primary">Add Admin</a>
             <br><br><br>
             <table class="tbl-full">
                 <tr>
                     <th>S.No</th>
                     <th>FullName</th>
                     <th>UserName</th>
                     <th>Actions</th>
                 </tr>
                 <?php
                 
                    $sql = "SELECT * FROM admin";

                    $res = mysqli_query($conn,$sql);

                    if($res == True)
                    {
                        $count = mysqli_num_rows($res);
                        $sn = 1;
                        if($count>0)
                        {
                            while($rows = mysqli_fetch_assoc($res))
                            {
                                $id = $rows['id'];
                                $full_name = $rows['full_name'];
                                $username = $rows['username'];

                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?>.</td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        
                                        <a href="<?php echo SITEURL;?>admin/updateadmin.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                        <a href="<?php echo SITEURL;?>admin/deleteadmin.php?id=<?php echo $id; ?>" class="btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else{

                        }
                    }
                 
                 
                 
                 ?>
             </table>
             <div class="clearfix"></div>
        </div>
    </div>
<?php include('partials/footer.php');?>