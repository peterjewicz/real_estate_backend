<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ranch and Farm Lands</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	

  </head>
  <body>
	<div class="top_brown">
	</div>
	
	<div class="top_green">
	</div>
	
	<div class="footer_fix">
	
    <div class="container">
		
		<?php require ('includes/header.php'); ?>
		
		
		<div class="row main_wrap">
			<?php require ('includes/sidebar.php'); ?>
			
		<div class="col-sm-9 main_content">
		
			<?php
				$current_user = Session::get('user');
				var_dump($current_user);
				if($current_user[0]->user_level == 0)
				{
					$level = "Basic";
				}
				
				echo('
				
				<ul>
					<li>Membership Level: ' . $level . ' <a href="upgrade">Upgrade</a></li>
					<li>Next Payment Due: ' . $current_user[0]->next_payment .' Days</li>
					<li></li>
				</ul>
				
				')
					
			?>

			
			
		</div>
			
			<div class="footer row">
				<div class="col-sm-12">
				</div>
			</div>
			
		</div>
		

		
		
	</div>
	
	<div class="bottom_brown">
	</div>
	
	
	</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	


  </body>
</html>