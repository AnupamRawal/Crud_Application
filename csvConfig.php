<?php
    function getdb(){
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $db = "myDB";
    //try {
       
        $conn = mysqli_connect($servername, $username, $password, $db);
      //  }
    //catch(exception $e)
      //  {
        //echo "Connection failed: " . $e->getMessage();
        //}
        return $conn;
    }
