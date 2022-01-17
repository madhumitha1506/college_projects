
<?php include('partials-front/menu.php'); ?>

<!-- Service-Search Section -->
    <section class="service-search text-center">
        <div class="container">
            <form action="<?php echo SITEURL;?>service-search.php">
                <input type="search" name="search" placeholder="Search for Services..." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
    </section>

    <?php

        if(isset($_SESSION['appointment']))
        {
            echo $_SESSION['appointment'];
            unset($_SESSION['appointment']);
        }
    ?>

    <!-- Categories Section -->
    <section class="categories">
        <div class="container">
           <h2 class="text-center">Explore Categories</h2>
           <?php
           
            $sql = "SELECT * FROM category WHERE active ='Yes' AND featured = 'Yes' LIMIT 3";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count > 0)
            {
                while($row = mysqli_fetch_assoc($res))
                {
                    $id  = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                     <a href="<?php echo SITEURL; ?>category-service.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php
                            
                                if($image_name =="")
                                {
                                    echo "<div class='error'>Image Not Available.</div>";
                                }
                                else{
                                    ?>
                                    <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="spa" class="img-responsive img-curve"/>
                                    <?php
                                }
                            
                            ?>
                            
                            <h3 class="float-text text-white"><?php echo $title;?></h3>
                        </div>
                    </a>
                    <?php
                }
            }
            else{

            }
           
           ?>
          

            
           
          <div class="clear-fix"></div>
        </div>
    </section>
    <!-- Services Section-->
    <section class="services">
        <div class="container">
            <h2 class="text-center">Services</h2>
            <?php

                $sql2 = "SELECT * FROM service WHERE active = 'Yes' AND featured = 'Yes' LIMIT 6";
                $res2 = mysqli_query($conn,$sql2);
                $count2 = mysqli_num_rows($res2);
                if($count>0)
                {
                    while($row2 = mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $image_name = $row2['image_name'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        ?>
                        
                        <div class="services-box">
                        <div class="service-img">
                            <?php
                                if($image_name == "")
                                {
                                    echo "<div class='error'>Image Not Found.</div>";
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
                            <h4><?php echo $title;?></h4>
                            <p class="service-price">Rs.<?php echo $price; ?></p>
                            <p class="service-detail">
                                <?php echo $description;?>
                            </p>
                            <br>
                            <a href="<?php echo SITEURL;?>appointment.php?service_id=<?php echo $id; ?>" class="btn btn-primary">Appointment</a>
                        </div>
                        <div class="clear-fix"></div>
                    </div>
                    <?php
                    }
                }
                else{
                    echo "<div class='error'>Service Not Found.</div>";
                }
            ?>
            
            
           
            <div class="clear-fix"></div>
        </div>
    </section>
    <?php include('partials-front/footer.php'); ?>