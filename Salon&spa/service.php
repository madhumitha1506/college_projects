<?php include('partials-front/menu.php'); ?>

    <section class="service-search text-center">
        <div class="container">
            <form action="<?php echo SITEURL;?>service-search.php">
                <input type="search" name="search" placeholder="Search for Services..." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
    </section>

    <section class="services">
        <div class="container">
            <h2 class="text-center">Services</h2>
            <?php

                $sql = "SELECT * FROM service WHERE active ='Yes'";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        ?>
                        <div class="services-box">
                            <div class="service-img">
                                <?php
                                    if($image_name =="")
                                    {
                                        echo "<div>Image Not Found.</div>";
                                    }
                                    else{
                                        ?>
                                            <img src="<?php echo SITEURL;?>images/service/<?php echo $image_name;?>"  alt="" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>
                            <div class="service-desc">
                                <h4><?php echo $title;?></h4>
                                <p class="service-price">Rs.<?php echo $price; ?></p>
                                <p class="service-detail">
                                    <?php echo $description;?>
                                </p>
                                <br>
                                <a href="<?php echo SITEURL;?>appointment.php?service_id=<?php echo $id; ?>" class="btn btn-primary">Appointment</a>
                            </div>
                            
                        </div>
            
                        <?php
                    }
                }
                else{
                    echo "<div class='error'>Service Not Found</div>";
                }
            ?>
            <div class="clear-fix"></div>
            </div>
            </section>
                        

<?php include('partials-front/footer.php'); ?>