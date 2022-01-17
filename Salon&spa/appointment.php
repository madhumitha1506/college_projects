<?php include('partials-front/menu.php'); ?>

<?php

    if(isset($_GET['service_id']))
    {
        $service_id = $_GET['service_id'];

        $sql = "SELECT * FROM service WHERE id = $service_id";

        $res = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);

        if($count == 1)
        {
            while($row = mysqli_fetch_assoc($res))
            {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
        }
        else{
            header('location:'.SITEURL);
        }


    }
    else{

        header('location:'.SITEURL);
    }


?>

<section class="service-search">
        <div class="container">
            
            <h2 class="text-center text-white">Make your Appointment</h2>

            
            <form action="" class="order" method = "POST" >
                <fieldset>
                    <legend>Selected Service</legend>

                    <div class="service-img">
                        <?php
                        
                            if($image_name=="")
                            {
                                echo "Image not Available";
                            }
                            else
                            {
                            ?> 
                                <img src="<?php echo SITEURL; ?>images/service/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                            <?php
                            }
                        
                        ?>
                        
                    </div>
    
                    <div class="service-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="service" value="<?php echo $title; ?>">
                        <p class="service-price">Rs. <?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                    </div>
                </fieldset>

                    <fieldset>
                        <legend>Appointment</legend>
                        <div class="order-label">Full Name</div>
                        <input type="text" name="full-name" placeholder="E.g. Madhumitha" class="input-responsive" required>

                        <div class="order-label">Phone Number</div>
                        <input type="text" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                        <div class="order-label">Email</div>
                        <input type="email" name="email" placeholder="E.g madhu@gmail.com" class="input-responsive" required>

                        <div class="order-label">Date & Time</div>
                        <input type="datetime-local" name="datetime" class="input-responsive" >
                            <br><br>
                        <input type="submit" name="submit" value="Appointment" class="btn btn-primary">
                </fieldset>


                    
            </form>
            <?php

                if(isset($_POST['submit']))
                {
                    $id = $_POST['id'];
                    $service = $_POST['service'];
                    $price = $_POST['price'];
                    $total = $price;
                    $datetime = $_POST['datetime'];
                    $status = "Requested";
                    $name = $_POST['full-name'];
                    $phone = $_POST['contact'];
                    $email = $_POST['email'];

                    $sql2 = "INSERT INTO appointments SET
                    
                    service = '$service',
                    price = $price,
                    total = $total,
                    datetime = '$datetime',
                    status = '$status',
                    name = '$name',
                    phone = '$phone',
                    email = '$email'
                    ";

                    $res2 = mysqli_query($conn,$sql2);

                    if($res2 == True)
                    {
                        $_SESSION['appointment'] = "<div class='success text-center'>Appointment Requested Successfully.</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        $_SESSION['appointment'] = "<div class='error text-center'>Failed To Request Appointment.</div>";
                        header('location:'.SITEURL);
                    }

                }


            ?>
        </div>
    </section>
    

<?php include('partials-front/footer.php'); ?>