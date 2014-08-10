<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Images</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/drop_zone.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <?php
  $last_id = Session::get('last_insert_id');
  Session::put('last_insert_id', $last_id);
  ?>
  <body>
    <h1>Step 2 Upload Images</h1>
	<h2><?php echo(Session::get('last_insert_id')); ?></h2>
	<form class="dropzone" action="upload_image" method="post">
	</form>
	
		<div class="errors">
		<ul>
		<?php 
		    foreach($errors->all() as $message)
			{
        echo("<li>" . $message . "</li>");
		}
		
		if(Session::has('failed_login'))
		{
			echo("<li>" . Session::get('failed_login')  . "</li>");
		}
		
		
							  
		
		?>
		</ul>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/dropzone.js"></script>
  </body>
</html>