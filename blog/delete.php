<?php
    include 'session.php';


    $status=0;

    $title=$_POST['dtitle'];
    $conn = new mysqli('localhost','root','abdulaziz2','blogs');
    $stmt='SELECT * FROM blog';

    $result= $conn->query($stmt);
    

    while($rows = $result->fetch_assoc())
    {

            if($rows['title'] == $title)
            {
                $status=1;
                if($_SESSION['id'] == $rows['uname'])
                {
                    // echo "<script>if(confirm('Are you sure you want to delete this post?'))
                    //                 {

                    //                 }
                    //                 else
                    //                 {
                                    

                    //                 }

                    // </script>";
                    $stmt="DELETE FROM blog WHERE title='".$title."'";
                    $conn->query($stmt);
                    echo "<script>alert('Post deleted successfully')</script>";
                    include('admin.php');
                }
                else
                {
                    echo "<script>alert('you can not delete this post since you did not write it')</script>";
                    include('admin.php');

                }
            }
            
    }
    if($status== 0){
        echo "<script>alert('There is no post with the title you inserted')</script>";
        include('admin.php');
    }


    

    
?>