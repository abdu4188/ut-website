
<?php 
include 'session.php';




 if(isset($_POST['submit'])){
    $name       = $_FILES['file']['name'];  
    $temp_name  = $_FILES['file']['tmp_name'];  
    if(isset($name)){
        if(!empty($name)){      
            $location = 'uploads/';      
            if(move_uploaded_file($temp_name, $location.$name)){
                echo 'File uploaded successfully<br>';
                //echo "$name"."/$temp_name";
            }
        }       
    }  else {
        echo 'You should select a file to upload !!';
    }
}


$uname= $_SESSION['id'];
$title=$_POST['title'];
$path= "uploads/".$name;
$body= $_POST['content'];

$conn= new mysqli('localhost','root','abdulaziz2', 'blogs'); 

if($conn->connect_error)
    {
        echo 'error';
    }
else{
        echo $path;
        $stmt= "INSERT INTO blog (uname, title, img_path, body) VALUES ('$uname', '$title', '$path', '$body')";
        if ($conn->query($stmt) === TRUE) {
            echo "<script>alert(' Your blog has been posted successfuly')</script>";
            header('location: admin.php');
        } else {
            echo "Error: " . $stmt . "<br>" . $conn->error;
        }
    }


?>