<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link href="Css/reg.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <br>
        <div class="card bg-light">
            <article class="card-body mx-auto " style="min-width: 400px;">
                <h4 class="card-title mt-3 text-center">Log In</h4>
                <p>
                    <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
                    <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via
                        facebook</a>
                </p>
                <p class="divider-text">
                    <span class="bg-light">OR</span>
                </p>

                <form method="post" name="loginform" action="
                <?php
                echo htmlspecialchars($_SERVER["PHP_SELF"]);
                ?>">

                    <!-- username -->
                    <!-- <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="name" id="name" class="form-control" placeholder="Enter Your Name" type="text" 
                    
                        value="<?php
                                if (isset($_COOKIE['userName'])) {
                                    echo $_COOKIE['userName'];
                                };
                                ?>"
                        > -->
                    <!-- cookie consumed here/ -->
                    <!-- </div>  -->

                    <!-- username -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="email" id="email" class="form-control" placeholder="Enter Your email" type="email" value="
                        <?php
                        if (isset($_COOKIE['userEmail'])) {
                            echo $_COOKIE['userEmail'];
                        };
                        ?>">
                        <!-- cookie consumed here/ -->
                    </div>



                    <!-- password -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="mypassword" id="mypassword" class="form-control" placeholder="Your password" type="password" value="
                        <?php
                        if (isset($_COOKIE['userPassword'])) {
                            echo $_COOKIE['userPassword'];
                        }
                        ?>">
                    </div>


                    <!-- remember me option -->
                    <div>
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember"> Remember Me</label>
                    </div>


                    <!-- loginoption -->
                    <div class="form-group">
                        <button name="login" type="submit" class="btn btn-primary btn-block"> Log in </button></br>
                        <h6>Not have an account yet</h6>
                        <a href="userReg.php" class="btn btn-success btn-block"> Sign Up</a>

                    </div>
                    <div>
                        <?php
                        echo $nExist;
                        ?>
                        <div class="form-group">
                            <button name="back" type="submit" class="btn btn-secondry btn-block">
                                <?php
                                echo $goback;
                                ?>
                            </button>
                        </div>
                </form>
            </article>
        </div> <!-- card.// -->
    </div>
    <!--container end.//-->
</body>

</html>