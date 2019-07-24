<?php
$conn = new mysqli('localhost','root','abdulaziz2','blogs');
$id=$_GET['id'];
$stmt='SELECT * FROM blog WHERE id='.$id;

$result= $conn->query($stmt);
$row = mysqli_fetch_assoc($result);
$views= $row['views']+1;
$stmt='UPDATE blog SET views='.$views.' WHERE id='.$id;
$conn->query($stmt);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>UT Blog</title>
        <link rel="icon" type="../image/ico" href="../images/ut.ico" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
                
        <link rel="stylesheet" href="css/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="../style.css">
        <script src="js/modernizr.custom.js"></script>
        <script src="https://kit.fontawesome.com/1a1f127cec.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <style>
                html,body,h1,h2,h3,h4 {font-family:"Lato", sans-serif}
                .mySlides {display:none}
                .w3-tag, .fa {cursor:pointer}
                .w3-tag {height:15px;width:15px;padding:0;margin-top:6px}
        </style>

    </head>
    <body>
            <div class="body-container ">
                    <nav class="navbar navbar-default navbar-fixed-top shadow p-3 mb-5 bg-white rounded" >
                      <div class="container">
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>                        
                          </button>
                          <a href="#" class="pull-left navbar-brand"><img src="images/UT.png" style="width: 180px; height: 40px"></a> 
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                          <ul class="nav navbar-nav navbar-right">
                            <li><a href="../index.html">HOME</a></li>
                            <li><a href="../index.html#about">ABOUT</a></li>
                            <li><a href="../index.html#services">SERVICES</a></li>
                            <li><a href="../index.html#partners">PARTNERS</a></li>
                            <li><a href="../index.html#clients ">CLIENTS</a></li>
                            <li><a href="../index.html#contact">CONTACT</a></li>
                            <li><a href="catalog.php"> BLOG</a> </li>
                            <li><a href="">HELP DESK</a></li>
                          </ul>
                        </div>
                      </div>
                    </nav>

<div class="w3-content" style="max-width:1400px;margin-top:80px;margin-bottom:80px">

  <div class="services_header container" style="background-image: url(<?php echo $row['img_path'] ?>)">
    <h1><?php echo $row['title']?></h1>

    </div>
    
  <div class="w3-panel" style="padding-top: 60px; padding-bottom: 30px;">
  <span class="w3-xlarge w3-bottombar w3-border-blue w3-padding-16"><?php echo "By ".$row['uname']?></span><br><br><br>
  <h4><?php echo "Posted On ". $row['time_created']?><br>
  <i class="glyphicon glyphicon-eye-open" style="padding-left:10px; padding-right:10px;"></i><?php echo  " ".$row['views']. " Views"?></h4>
  <p><?php echo $row['body'] ?></p>  
</div>



        </div>
        <div id="sfooter" class="">
                        <i class="fab fa-facebook fa-2x logos"></i>
                        <i class="fab fa-twitter fa-2x logos"></i>
                        <i class="fab fa-linkedin-in fa-2x logos"></i>
                        <i class="fab fa-skype fa-2x logos"></i>
                        <i class="fab fa-google-plus-g fa-2x logos"></i>
                        <h5>2019 UT solutions P.L.C</h5>
                        <h5>Delivering Ultimate Technologies</h5>
            </div>
    </body>
            
</html>