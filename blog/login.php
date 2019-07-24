<?php
include 'session.php';
$user= $_POST['username'];
$pass= $_POST['password'];
    $conn= new mysqli('localhost','root','abdulaziz2', 'login');
    if($conn->connect_error)
    {
        echo 'error';
    }
    else
    {
        $stmt= "SELECT * FROM login_info ";
        $result = mysqli_query($conn, $stmt);
        if(!$result){
            echo "result error";
        }
        
        while($row = mysqli_fetch_assoc($result)){
            if ($row["username"] == $user && $row["passw"] == $pass)
            {
                 $_SESSION['id']= $user;
                
                header('Location: admin.php');
                exit();
                
            }
            else{
                $_SESSION['id']= $user;
                header('login.html');
                echo "<script>alert('Your Username or Password is incorrect');</script>";
            }
        }
    }
?>