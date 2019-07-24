<?php
include 'posts.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>UT Blog</title>
  <link rel="icon" type="image/ico" href="../images/ut.ico" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
  <link rel="stylesheet" href="bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="css/w3.css">
        <script src="https://kit.fontawesome.com/1a1f127cec.js"></script>
<style>
  html, body { width:100%; height:100%; }
#wrap { 
min-height:100%;
height:auto !important;
height:100%;    
margin: 0 auto -120px;  /* Bottom value must = footer height */
}
#sfooter, .push { width:100%; height:120px; position:relative; bottom:0; }
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
.w3-quarter img:hover{
  -webkit-transform: scale(1.1);
}

</style>
  </head>
  <body>
    <div id="wrap">
  <nav class="navbar navbar-default navbar-fixed-top shadow p-3 mb-5 bg-white rounded" >
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a href="#" class="pull-left navbar-brand"><img src="images/UT.png" style="width: 180px; height: 40px;"></a> 
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../index.html">HOME</a></li>
            <li><a href="../index.html#about">ABOUT</a></li>
            <li><a href="../index.html#services">SERVICES</a></li>
            <li><a href="../index.html#partners">PARTNERS</a></li>
            <li><a href="../index.html#clients ">CLIENTS</a></li>
            <li><a href="../index.html#contact">CONTACT</a></li>
            <li><a href="#"> BLOG</a> </li>
            <li><a href="https://www.utsolutionsplc.com/uthelpdesk">HELP DESK</a></li>
          </ul>
        </div>
      </div>
    </nav>


<div class="w3-panel" style="padding-top: 100px;">
    <span class="w3-xxlarge w3-bottombar w3-border-blue w3-padding-16">UT Blog</span><br><br><br><br>
    <span class="w3-xlarge  w3-border-blue w3-padding-16">Recent Blogs</span>
</div>
  <?php

  $nextId = 1;
  $img_style="width:200px; height:200px; padding-top:30px;";
  echo '<div class="w3-row-padding w3-padding-16 w3-center" style="margin-top: 50px; width:90vw; padding-left: 100px;">';
  
  if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 8;
$offset = ($pageno-1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM blog";
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM blog ORDER BY time_created desc LIMIT $offset, $no_of_records_per_page ";

$res_data = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_array($res_data)){
          $time = strtotime($row['time_created']);
          $myFormatForView = date("m/d/y g:i A", $time);
            
            echo '<div class="w3-quarter" >';
                    echo '<a href="publicblog.php?id='. $row['id']. '" > <img class="cat_img" src="'.$row['img_path'].'" style="'.$img_style.'"></a> ';
                    echo '<a href="publicblog.php?id='. $row['id']. '" ><h3>'.$row['title'].'</h3></a>'; 
                    echo "<p>By ".$row['uname']." on ".$myFormatForView."</p>" ;
                    echo '<i class="glyphicon glyphicon-eye-open" style="padding-left:10px; padding-right:10px;"></i>'.$row['views'].'  Views</h4>';
                    echo '</div>';
        }


  ?><br><br><br>
  <div class="row">
    <div class="col-sm-12">
  <ul class="pagination">
    <li><a href="?pageno=1">First</a></li>
    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
    </li>
    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
    </li>
    <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>
    </div>
  </div>
    <script>

    </script>


  <!-- Pagination -->
  
  <div class="push"></div>    
</div>


 


</body>
 <div id="sfooter" class="">
                        <i class="fab fa-facebook fa-2x logos"></i>
                        <i class="fab fa-twitter fa-2x logos"></i>
                        <i class="fab fa-linkedin-in fa-2x logos"></i>
                        <i class="fab fa-skype fa-2x logos"></i>
                        <i class="fab fa-google-plus-g fa-2x logos"></i>
                        <h5>2019 UT solutions P.L.C</h5>
                        <h5>Delivering Ultimate Technologies</h5>
            </div>
</html>