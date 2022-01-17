<?php include ('partials/menu.php');?>

<div class="main">
    <div class="wrapper">
        <h1>Update Appointment</h1>
        <br><br><br>
        <?php
        
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];

                $sql = "SELECT * FROM appointments WHERE id = $id";

                $res =mysqli_query($conn,$sql);

                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);

                    $service = $row['service'];
                    $status = $row['status'];
                    $email = $row['email'];

                }
                else{

                    header('location:'.SITEURL.'admin/manageappointments.php');    
                }
            }
            else{
                header('location:'.SITEURL.'admin/manageappointments.php');
            }
        
        
        ?>
        <form action="#" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Service Name</td>
                    <td><b><?php echo $service; ?></b></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status" >
                            <option <?php if($status == "Requested") { echo "selected"; }?> value="Requested">Requested</option>
                            <option <?php if($status == "Accepted") { echo "selected"; }?> value="Accepted">Accepted</option>
                            <option <?php if($status == "Cancelled") { echo "selected"; }?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="submit" value="Update Appointment" name="submit" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
        <?php
        
            if(isset($_POST['submit']))
            {
                $id =$_POST['id'];
                $status = $_POST['status'];
                // $email = $_POST['email'];
                // $from = 'madhumithasrmb@gmail.com';
                $sql2 = "UPDATE appointments SET 
                    status = '$status'
                    WHERE id = $id;
                ";
                // $headers = "To:" . $email;
                // $subject = "Online salon and Spa";
                // $message = $status;
                // $headers2 = "From:" . $to;
                // @mail($from,$subject,$message,$headers);
                $res2 = mysqli_query($conn,$sql2);
                if($res2 == True)
                {
                    
                    //mail($from,$subject2,$message2,$headers2);
                    
                    $_SESSION['update'] = "<div class='success'>Appointment Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manageappointments.php');
                    
                }
                else{
                    $_SESSION['update'] = "<div class='error'>Failed to Update Appointment.</div>";
                    header('location:'.SITEURL.'admin/manageappointments.php');
                }
            }
        
        
        ?>
    </div>
</div>

<?php include ('partials/footer.php');?>