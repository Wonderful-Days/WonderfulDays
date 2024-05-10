<?php
// register 
    error_reporting(0);
    $servername = "127.0.0.1";
    $username = "root";
    $password = ""; 
    $dbname = "wonderfulldays";

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
$password = $_POST['password'];
$repertpassword = $_POST['repeatpassword'];
$sql = "insert into `register_form`(`Name`, `username`, `email`, `password`, `repertpassword`) VALUES ('$name','$username','$email','$password','$repertpassword')";
if(mysqli_query($conn, $sql)){
 echo "<script>alert('new data inserted')</script>";
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
                echo "<script>alert('login sucessfull')</script>";  
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