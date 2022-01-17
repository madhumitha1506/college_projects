<html>
    <head></head>
    <body>

        <form method="POST">
            <input type="text" name="inpt1"/>
            <input type = "submit" name="submit" value="insert"/>
        </form>    
    </body>
</html>

<?php

$con = mysqli_connect('localhost','root','','test');

  if(isset($_POST['submit']))
    {
        $name = $_POST['inpt1'];
        $sql = "INSERT INTO test SET
        
            name = '$name'
        ";
        $res = mysqli_query($con,$sql);

    }


?>