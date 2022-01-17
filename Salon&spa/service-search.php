<?php include('partials-front/menu.php'); ?>
<section class="service-search text-center">
        <div class="container">
            <?php
            
                $search = mysqli_real_escape_string($conn,$_GET['search']);
            
            ?>
            
        <h2>Service on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <section class="services">
        <div class="container">
            <h2 class="text-center">Services</h2>
            <?php
            
                

                $sql = "SELECT * FROM service WHERE title LIKE '%$search%' OR description LIKE '%$search%' ";

                $res = mysqli_query($conn,$sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];

                        ?>
                            <div class="services-box">
                                <div class="service-img">
                                    <?php
                                    
                                        if($image_name == "")
                                        {
                                            echo "<div class='error'>Image Not Available.</div>";
                                        }
                                        else
                                        {
                                            ?>
                                                <img src="<?php echo SITEURL;?>images/service/<?php echo $image_name;?>"  alt="" class="img-responsive img-curve">
                                            <?php
                                        }
                                    
                                    
                                    ?>
                                    
                                </div>
                                <div class="service-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="service-price">Rs<?php echo $price; ?></p>
                                    <p class="service-detail">
                                        <?php echo $description; ?>
                                    </p>
                                    <br>
                                    <a href="<?php echo SITEURL;?>appointment.php?service_id=<?php echo $id; ?>" class="btn btn-primary">Appointment</a>
                                </div>
                                
                            </div>
                        <?php
                    }
                }
                else{
                    echo "<div class='error'>Service Not Available</div>";
                }
            ?>
            
            <div class="clear-fix"></div>
        </div>
    </section>
<?php include('partials-front/footer.php'); ?>