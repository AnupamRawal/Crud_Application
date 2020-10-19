     <!-- starting session to store user details -->
     <?php session_start();
     if($_SESSION["username"]){
         header('Location:main2.php');
     }
    //  header('Location:logOut.php');
     ?>

     <!-- match data from database -->
    <?php 
    include 'conn.php';

    if($_SERVER["REQUEST_METHOD"]=='POST'){
        $email=testInput($_POST['email']);
        $mypassword = testInput($_POST['mypassword']);
        }

        // for the security purpose
    function testInput($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(isset($_POST["login"])){

        if($email=="" || $mypassword==""){
         echo "user email or password is emppty"; 
         echo "</br>";
         echo "<a href='index.php'> go back</a";  
        }else{
        $q = "SELECT * FROM `MyGuests` WHERE `email`='$email' AND `password`='$mypassword'";
        $result = mysqli_query($conn,$q); 
        // or die ("can't exicute");
        $row = mysqli_fetch_array($result);
       
        if(is_array($row)&& !empty($row)){
            $validUser = $row['email'];
            $validPass = $row['password'];

            if($validUser=$email && $validPass=$mypassword){
                header("Location:main2.php");
            }
        }else{
            $nExist= "This user doesn't exist";
            $goback="<a href='index.php'>Go back to login</a>";
        }
    }

    // //cookies are set for remember me
    if(isset($_POST["remember"])){
        // $userName;$userPassword;
        setcookie('userEmail',$email,time()+3600);
        setcookie('userPassword',$mypassword,time()+3600);
        header('Location:index.php');
    }

    // use session to display name
    $_SESSION["username"]=$row['name'];
    }
    
    ?>
    
    <?php 
    include 'indexhtml.php';
    ?>
    

