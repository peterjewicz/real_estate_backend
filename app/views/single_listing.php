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
	
<?php

$photo = DB::table('photos')->where('photos.listing_id', '=', $listing->id)->get();


?>
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
		
			<div class="main_image">
				<img src=" <?php echo('photos/' . $photo[0]->src . '.jpg" width="750px" height="500px" class="large_photo"'); ?> ">
			</div>
			
			<div class="mini_image">
				<div class="row">
				<?php
					$i = 1;
					while ( $i < sizeof($photo))
					{
						echo('
							<div class="col-sm-4 mini_image_wrap">
								<img src="photos/' . $photo[$i]->src . '.jpg" width="85%" height="150px" class="small_photo">
							</div>
						');
						$i++;
					}
				?>
				</div>
			</div>
			
			<div class="details">
				<h2> Property Details </h2>
				<div class="row">
				
					<div class="col-sm-4">
						County: <?php echo(" ". $listing->id); ?>
					</div>
					
					<div class="col-sm-4">
						Type: <?php echo(" ". $listing->type_of_land); ?>
					</div>
					
					<div class="col-sm-4">
						Acres: <?php echo(" ". $listing->acreage); ?>
					</div>
					
					<div class="col-sm-4">
						Address: <?php echo(" ". $listing->address); ?>
					</div>
					
					<div class="col-sm-4">
						State: <?php echo(" ". $listing->state); ?>
					</div>
					
					<div class="col-sm-4">
						City: <?php echo(" ". $listing->city); ?>
					</div>
					
					<div class="col-sm-4">
						Zip Code: <?php echo(" ". $listing->zip_code); ?>
					</div>
					
					<div class="col-sm-4">
						Price: <?php echo(" ". $listing->price); ?>
					</div>
					
					<div class="col-sm-4">
						Water Front: 
						<?php 
							if($listing->water_front == 1)
								{
									echo(" Yes");
								}
							else
							{
								echo(" No");
							}
						?>
					</div>
					
					<div class="col-sm-4">
						Status:
						<?php 
							if($listing->status == 1)
								{
									echo(" Available");
								}
							else
							{
								echo(" Sold");
							}
						?>
					</div>
					
				</div>
			</div>
			
			<div class="desc">
				<h2> Property Description </h2>
				<p>
				<?php
					echo($listing->description);
				?>
				</p>
			</div>
			
			<div class="google_maps">
			</div>
			
			
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
	
	<script>
	
		$('.small_photo').click(function(){
			small_photo = $(this).attr('src');
			large_photo = $('.large_photo').attr('src');
			$(this).attr('src', large_photo);
			$('.large_photo').attr('src', small_photo);
			
		});
		 
	</script>

	
  </body>
</html>