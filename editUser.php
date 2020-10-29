<!DOCTYPE html>
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
    <?php
    include 'conn.php';
    $id = $_GET['id'];
    $qu = "SELECT * FROM `MyGuests` WHERE id=$id";
    $rs = mysqli_query($conn, $qu);
    $row = mysqli_fetch_array($rs);

    if (isset($_POST["submitBtn"])) {
        //  print_r($_GET);die;
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $cPassword = $_POST['cPassword'];

        // $sql = "UPDATE `MyGuests`(`name`,`email`,`password`) VALUES ('$name', '$email', '$')";

        echo  $sql = "UPDATE `MyGuests` SET `id`=$id ,`name`='$name',`email`='$email',`gender`='$gender',`password`='$password',`cPassword`='$cPassword' WHERE `id`=$id";

        $rt = mysqli_query($conn, $sql);
        if (!$rt) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } else {
            echo "</br>New record created successfully";
            // header("location:main2.php");
        }
        header("Location:main2.php");
    }
    ?>

    <div class="container">
        <br>
        <div class="card bg-light">
            <article class="card-body mx-auto " style="min-width: 400px;">
                <h4 class="card-title mt-3 text-center">Update user</h4>
                <!-- <p class="text-center">Get started with your free account</p> -->

                <form method="post" action="
                <?php
                echo htmlspecialchars($_SERVER["PHP_SELF"]);
                ?>">
                    <input type="hidden" name="id" value="<?php echo (isset($_GET['id'])) ? $_GET['id'] : "" ?>">
                    <!-- username -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="name" id="name" class="form-control" placeholder="Full name" type="text" value="<?php echo $name = $row['name']; ?>">
                        <span id="nameErr" class="invalid-feedback"></span>

                    </div> <!-- form-group// -->

                    <!-- email -->
                    <div class=" form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="email" id="email" class="form-control" placeholder="Email address" type="email" value="<?php echo $email = $row['email']; ?>">
                        <span class="invalid-feedback" id="emailErr"></span>

                    </div>


                    <!-- gender -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-mars-stroke-h"></i></span>
                        </div>
                        <div class="form-check-inline ml-4">
                            <label class="form-check-label">
                                <input type="radio" name="gender" class="form-check-input" id="male" value="male" <?php if ($row['gender'] == 'male') echo "checked"; ?> ">Male
                            </label>

                        </div>
                        <div class=" form-check-inline ml-2">
                                <label class="form-check-label">
                                    <input type="radio" name="gender" class="form-check-input" id="female" value="female" <?php if ($row['gender'] == 'female') echo "checked"; ?> ">Female
                            </label>
                        </div>
                            <span class=" invalid-feedback" id="genderErr"></span>
                        </div>

                        <!-- password -->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input class="form-control" id="password" name="password" placeholder="password" type="text" value="<?php echo $password = $row['password']; ?>">
                            <span class="invalid-feedback" id="passwordErr"></span>
                        </div>

                        <!-- confirm password -->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="cPassword" id="cPassword" class="form-control" placeholder="Repeat password" type="text" value="<?php echo $cPassword = $row['cPassword']; ?>">
                            <span class="invalid-feedback" id="cPasswordErr"></span>
                        </div>

                        <!-- update button -->
                        <div class="form-group">
                            <button name="submitBtn" id="submitBtn" type="submit" class="btn btn-success">Submit</button>
                            <button type="cancel" class="btn btn-secondry"><a href="main2.php" style="text-decoration: none;">Back</a></button>

                        </div>
                </form>
            </article>
        </div> <!-- card.// -->
    </div>
    <!--container end.//-->
</body>

<!-- validation script  -->
<script src="JavaScript/editUserJS.js"></script>

</html>