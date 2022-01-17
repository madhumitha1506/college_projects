<?php include('partials-front/menu.php'); ?>

<?php

    if(isset($_GET['category_id']))
    {
        $category_id = $_GET['category_id'];

        $sql = "SELECT title FROM category WHERE id = $category_id";

        $res = mysqli_query($conn,$sql);

        $row = mysqli_fetch_assoc($res);

        $category_title = $row['title'];

    }
    else
    {
        header('location:'.SITEURL);
    }

?>


<section class="service-search text-center">
        <div class="container">
            
            <h2>Service on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    
    <section class="services">
        <div class="container">
            <h2 class="text-center">Services</h2>
            <?php
            
                $sql2 = "SELECT * FROM service WHERE category_id=$category_id";

                $res2 = mysqli_query($conn,$sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2 > 0 )
                {
                    while($row2= mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $description = $row2['description'];
                        $price = $row2['price'];
                        $image_name = $row2['image_name'];
                        ?>
                        <div class="services-box">
                            <div class="service-img">
                                <?php
                                
                                    if($image_name=="")
                                    {
                                        echo "<div class='error'>Image Not Available.</div>";
                                    }
                                    else
                                    {
                                        ?>
                                            <img src="<?php echo SITEURL;?>images/service/<?php echo $image_name; ?>"  alt="" class="img-responsive img-curve">
                                        <?php
                                    }
                                
                                ?>
                                
                            </div>
                            <div class="service-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="service-price">Rs <?php echo $price; ?></p>
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
                    echo "<div class='error'>Service Not Found.</div>";
                }
            
            
            ?>
            <div class="clear-fix"></div>
        </div>
    </section>

<?php include('partials-front/footer.php'); ?>