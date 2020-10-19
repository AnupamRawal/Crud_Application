<?php 
    include 'conn.php';
    $name=$email=$mypassword=$gender=$cPassword="";


    if($_SERVER["REQUEST_METHOD"]=='POST'){
        $name=testInput($_POST['name']);
        $email = testInput($_POST['email']);
        $gender = testInput($_POST['gender']);
        $mypassword = testInput($_POST['mypassword']);
        $cPassword = testInput($_POST['cPassword']);
        }

    function testInput($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if(isset($_POST["submitBtn"])){
        $check = "SELECT `email` FROM `MyGuests` WHERE `email`='$email'";
        $emailexist= mysqli_query($conn,$check);
        $emailRow = mysqli_fetch_array($emailexist);

        // if(is_array($emailRow)){
            if($emailRow['email']==$email){
               echo "This email already exist please fill another email";
                echo "</br>";
                echo "<a href='userReg.php'>Go back to Resigtration</a>";
            }else{
                 $sql = "INSERT INTO `MyGuests`(`name`,`email`,`gender`,`password`,`cPassword`) 
                 VALUES('$name','$email','$gender','$mypassword','$cPassword')";
                 if (mysqli_query($conn, $sql)) {
                    header("Location:index.php");
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        // }
        

    // $sql = "INSERT INTO `MyGuests`(`name`,`email`,`gender`,`password`,`cPassword`) VALUES ('$name','$email','$gender','$mypassword','$cPassword')";
    // if (mysqli_query($conn, $sql)) {
    //     header("Location:index.php");
    // } else {
    //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    // }
}
    ?>

    <?php 
    include 'userReghtml.php';
    ?>
 