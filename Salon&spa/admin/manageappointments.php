<?php include ('partials/menu.php');?>

    <div class="main">  
        <div class="wrapper">
             <h1>Manage Appointments</h1>
             <br><br>
             <?php
             
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
             
             ?>
             <br><br>
             <table class="tbl-full">
                 <tr>
                     <th>S.No</th>
                     <th>Service</th>
                     <th>Price</th>
                     <th>Total</th>
                     <th>Status</th>
                     <th>Date&Time</th>
                     <th>Name</th>
                     <th>Contact</th>
                     <th>Email</th>
                     <th>Action</th>
                 </tr>
                 <?php
                 
                 $sql = "SELECT * FROM appointments ORDER BY id DESC";

                 $res = mysqli_query($conn,$sql);

                 $count = mysqli_num_rows($res);
                
                 $sn = 1;
                 if($count>0)
                 {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $service = $row['service'];
                        $price = $row['price'];
                        $total = $row['total'];
                        $status = $row['status'];
                        $datetime = $row['datetime'];
                        $name = $row['name'];
                        $phone = $row['phone'];
                        $email =$row['email'];
                        ?>
                <tr>
                     <td><?php echo $sn++; ?></td>
                     <td><?php echo $service; ?></td>
                     <td><?php echo $price; ?></td>
                     <td><?php echo $total; ?></td>
                     <td>
                         <?php 
                         
                            if($status == "Requested")
                            {
                                echo "<label style= 'color: orange'>$status</label>";
                            }
                            elseif($status == "Accepted")
                            {
                                echo "<label style = 'color: green'>$status</label>";
                            }
                            elseif($status == "Cancelled")
                            {
                                echo "<label style='color: red'>$status</label>";
                            }
                         
                         
                         
                         ?>
                    </td>
                     <td><?php echo $datetime; ?></td>
                     <td><?php echo $name; ?></td>
                     <td><?php echo $phone; ?></td>
                     <td><?php echo $email; ?></td>
                     <td>
                         <a href="<?php echo SITEURL; ?>admin/updateappointment.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                     </td>
                 </tr>
                        <?php
                    }
                 }
                 else
                 {
                     echo "<tr><td colspan = '9' class='error'>Appointments Not Available.<td></tr>";
                 }
                 
                 
                 ?>
                
             </table>
             <div class="clearfix"></div>
        </div>
    </div>

<?php include('partials/footer.php');?>