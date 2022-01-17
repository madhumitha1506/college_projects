<?php include ('partials/menu.php');?>

<div class="main">
        <div class="wrapper">
             <h1>DASHBOARD</h1>
             <br><br>
            <?php
        
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                
            ?>
            <br><br>
             <div class="col-4 text-center">
                 <?php
                 
                    $sql = "SELECT * FROM category";

                    $res = mysqli_query($conn,$sql);

                    $count = mysqli_num_rows($res);
                 
                  ?>
                 <h1><?php echo $count; ?></h1>
                 <br>
                 Categories
             </div>
             <div class="col-4 text-center">
             <?php
                 
                 $sql2 = "SELECT * FROM service";

                 $res2 = mysqli_query($conn,$sql2);

                 $count2 = mysqli_num_rows($res2);
              
               ?>
                 <h1><?php echo $count2; ?></h1>
                 <br>
                 Services
             </div>
             <div class="col-4 text-center">
             <?php
                 
                 $sql3 = "SELECT * FROM appointments";

                 $res3 = mysqli_query($conn,$sql3);

                 $count3 = mysqli_num_rows($res3);
              
               ?>
                 <h1><?php echo $count3; ?></h1>
                 <br>
                Total Appointments
             </div>
             <div class="col-4 text-center">
                <?php
                 
                 $sql4 = "SELECT SUM(total) AS Total FROM appointments WHERE status = 'Accepted' ";

                 $res4 = mysqli_query($conn,$sql4);
                 
                 $row = mysqli_fetch_assoc($res4);

                 $total = $row['Total'];
              
               ?>
                 <h1>Rs.<?php echo $total; ?></h1>
                 <br>
                 Revenue Generated
             </div>
             <div class="clearfix"></div>
        </div>
    </div>
<?php include('partials/footer.php');?>