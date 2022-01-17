
<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Salon And Spa Booking</title>
    <link rel="shortcut icon" href="./images/spa-and-relax.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/styles.css">
    <!-- <script src="https://use.fontawesome.com/4329107f53.js"></script> -->
</head>
<body>
    <!-- Navbar Section -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
               <img src="./images/spa-and-relax.png" alt="Spa logo" class="img-responsive">
            </div>
            <div class="menu text-right">
               <ul>
                   <li>
                       <a href="<?php echo SITEURL;?>">Home</a>
                   </li>
                   <li>
                       <a href="<?php echo SITEURL;?>category.php">Categories</a>
                  </li>
                  <li>
                       <a href="<?php echo SITEURL;?>service.php">Services</a>
                  </li>
                  <!-- <li>
                       <a href="contact.php">Contact</a>
                  </li> 
                  <li>
                      <a href="">Register</a>
                  </li> -->
                 
               </ul>
            </div>
            <div class="clear-fix"></div>
        </div>
        
    </section>
