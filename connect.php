

<?php

session_start();
session_regenerate_id(true);
// register 
    error_reporting(0);
    $servername = "97.74.93.233";
    $username = "techindi_Develop";
    $password = "A*-fcV6gaFW0"; 
    $dbname = "techindi_Dev";

    $conn = mysqli_connect($servername, $username,$password, $dbname );

    if($conn)
    {
        // echo "connection ok";
    }
    else{
        die("connection failed".mysqli_connect_error());
    }

if(isset($_POST['register']))
{
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$events = $_POST['events'];     
$password = $_POST['password'];
// $repeatpassword = $_POST['repeatpassword'];         
$sql = "INSERT INTO `register_form`(`Name`, `username`,`events`, `email`, `password`) VALUES ('$name','$username','$events','$email','$password')";
if(mysqli_query($conn, $sql)){
 echo "<script>alert('new data inserted')</script>";
 $_SESSION["uname"] = $username;
$_SESSION["desc"] = $events;
$_SESSION["email"] = $email;
 header('Location: index.php');
}
else{
 echo "<script>alert(' data not inserted')</script>".mysqli_error($conn);
}
mysqli_close($conn);
}                                                              



// login page

if(!empty($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
                    // syntax: select * from tablename where condition
        $query = "select * from register_form where email= '$email'";
                    
        $result= mysqli_query($conn,$query);
        $count=mysqli_num_rows($result);
        if($count>0)
        { 
            $data = mysqli_fetch_assoc($result);
             if($data['password'] == $password){
                $_SESSION["uname"] = $data['username'];
                $_SESSION["desc"] = $data['events'];
                $_SESSION["email"] = $data['email'];
                header('Location: index.php');
             }
         else
         {
             echo "<script>alert('wrong password')</script>".mysqli_error($conn);
         }
        }

        else{
            echo "<script>alert('wrong email/username')</script>".mysqli_error($conn);
        }
    
 }

?>
