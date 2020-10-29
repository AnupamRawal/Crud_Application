<!-- input member data -->
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
    <link href="Css/reg.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <br>
        <div class="card bg-light">
            <article class="card-body mx-auto " style="min-width: 400px;">
                <h4 class="card-title mt-3 text-center">Create Account</h4>
                <p class="text-center">Get started with your free account</p>

                <!-- to use fb and twitter login button -->
                <!-- <p>
                    <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
                    <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via
                        facebook</a>
                </p>
                <p class="divider-text">
                    <span class="bg-light">OR</span>
                </p> -->

                <form method="post" name="resigtrationForm" action="<?php
                                                                    echo htmlspecialchars($_SERVER["PHP_SELF"]);
                                                                    ?>">

                    <!-- username -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="name" id="name" class="form-control" placeholder="Full name" type="text" autocomplete="off">
                        <span id="nameErr" class="invalid-feedback"></span>
                    </div> <!-- form-group// -->

                    <!-- email -->
                    <div class=" form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="email" id="email" class="form-control" placeholder="Email address" type="email required" autocomplete="off">
                        <span class="invalid-feedback" id="emailErr"></span>

                    </div> <!-- form-group// -->


                    <!-- gender -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-mars-stroke-h"></i></span>
                        </div>
                        <div class="form-check-inline ml-4">
                            <label class="form-check-label">
                                <input type="radio" name="gender" <?php
                                                                    if (isset($gender) && $gender == 'male')
                                                                        echo "checked";
                                                                    ?> class="form-check-input" id="male" value="male">Male
                            </label>
                        </div>
                        <div class="form-check-inline ml-2">
                            <label class="form-check-label">
                                <input type="radio" name="gender" <?php
                                                                    if (isset($gender) && $gender == 'female')
                                                                        echo "checked";
                                                                    ?> class="form-check-input" id="female" value="female">Female
                            </label>
                        </div>
                        <span class="invalid-feedback" id="genderErr"></span>

                    </div>

                    <!-- phoneNUmber -->
                    <!-- <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <select class="custom-select" style="max-width: 120px;">
                            <option selected="">+91</option>
                            <option value="1">+972</option>
                            <option value="2">+198</option>
                            <option value="3">+701</option>
                        </select>
                        <input name="" class="form-control" placeholder="Phone number" type="text">
                    </div>  -->

                    <!-- occupation -->
                    <!-- <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                        </div>
                        <select class="form-control">
                            <option selected=""> Select job type</option>
                            <option>Designer</option>
                            <option>Manager</option>
                            <option>Accaunting</option>
                        </select>
                    </div> -->

                    <!-- password -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="mypassword" id="mypassword" class="form-control" placeholder="Create password" type="password" autocomplete="off">
                        <span class="invalid-feedback" id="passwordErr"></span>

                    </div>

                    <!-- confirm password -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="cPassword" id="cPassword" class="form-control" placeholder="Repeat password" type="password" autocomplete="off">
                        <span class="invalid-feedback" id="cPasswordErr"></span>
                    </div>

                    <!-- loginoption -->
                    <div class="form-group">
                        <button name="submitBtn" id="submitBtn" type="submit" class="btn btn-primary btn-block"> Create Account </button>
                    </div>
                    <p class="text-center">Have an account? <a href="index.php">Log In</a> </p>
                </form>
            </article>
        </div> <!-- card.// -->
    </div>
    <!--container end.//-->
</body>

<script src="JavaScript/userRegJS.js"></script>

</html>