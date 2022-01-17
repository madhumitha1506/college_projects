<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    
    <link rel="stylesheet" href="./css/form.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   
</head>
<body>
    <div class="container" id ="contain">
        <div class="form-container signup-container">
            <form action="#">
                <h1>Create Account</h1>
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <button>SignUp</button>
            </form>
        </div>
        <div class="form-container signin-container">
            <form action="#">
                <h1>Sign In</h1>
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <button>SignIn</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <!-- <h1>Welcome</h1> -->
                    <button class="press" id="signin">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <!-- <h1>Signup</h1> -->
                    <button class="press" id="signup">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const signUpButton = document.getElementById("signup");
        const signInButton = document.getElementById("signin");
        const container = document.getElementById("contain");
        signUpButton.addEventListener('click',function signup(){
            container.classList.add("right-panel-active");
        });
        signInButton.addEventListener('click',function signin(){
            container.classList.remove("right-panel-active");
        });
    </script>
</body>

</html>