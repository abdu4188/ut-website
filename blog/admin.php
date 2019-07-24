<?php
	include 'session.php';
	if(!isset($_SESSION['id']) || empty($_SESSION['id'])){

		echo "<script>alert('You must login first');";
		header('Location: login.html ');
		
	}
?>
<!Doctype html>
<html lang="en">
	<head>
		<style>
        	.btn
        	{
          		display: inline;
        	}
		</style>
		  
        <title>Admin</title>
        

        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
        <link rel="stylesheet" href="../style.css">

    </head>
    <body>

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
						<li><a href="catalog.php">BLOG</a></li>
						<li><a href="https://www.utsolutionsplc.com/uthelpdesk">HELP DESK</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<br><br><br><br>
		<a href="logout.php"><button class="btn btn-warning" style="margin-right:100px; float: right;"> Logout</button></a>
		<div class="row" style="padding-left:150px; padding-top: 20px;">
		
			<div class="col-sm-8 " style="width: 50%; float:left;">
				<h2>Write here<?php echo " ". $_SESSION['id']   ?></h2><br>
				
		
				<form class="form-group" action="upload.php" style="width: 500px;" method="post" enctype="multipart/form-data">
					<label> Title: </label>
					<input name="title" class="form-control" type="text" required placeholder="Title"/>
					<br><br>
					<label> Header Image: </label>
					<input class="form-control" type="file" name="file" id="file"><br><br>
					<label> Body: </label>
					<textarea name="content" id="summernote"></textarea>
					
					<button class="btn btn-primary" onclick="getContent()" name="submit"> Submit </button>
					
				
				</form>
			</div>

			<div class="col-sm-8" style=" width: 50%; padding-top:40px; float: right;">

				<form class="form-group" action="delete.php" method="POST">
					<label> Title of the post you want to delete</label>
					<input name="dtitle" class="form-control" style="width:300px;" type="text" required placeholder="Title of Post"/>
					<br><br>
					<input type="submit" class="btn btn-danger" value="Delete"/>
				</form>
				
			</div>

		</div>
	
    </body>
    
    <script>
		$(document).ready(function() {
			$('#summernote').summernote();
			
		});

  </script>
  
</html>