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
<style>
select, input
{
float: right;
clear: both;
display: block;
}
</style>

</div>
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
						<div class="left arrow">
							<img src="images/left.png" alt="Previous Listing">
						</div>
						
						<div class="right arrow">
							<img src="images/right.png" alt="Next Listing">
						</div>
				
				
				<?php
						$premier_listings = Session::get('premier_listings');
			
		foreach($premier_listings as  $listing)
			{
				$photo = DB::table('photos')->where('photos.listing_id', '=', $listing->id)->get();
				
				if($photo == NULL)
					{
						$photo = '1/no_image';
					}
				else
					{
						$photo = $photo[0]->src;
					}
				
				
				echo('
				<div class="row top_content">
					<div class="col-sm-7 slider_image">
						<img src="photos/' . $photo . '.jpg" width="100%" height="340px">
						

					</div>
					<div class="col-sm-5 desc">
					<h3>'. $listing->title . '</h3>' .
					substr($listing->description,0,500). '...
					<p class="more_details"><a href="single_listings?id=' . $listing->id . '">See full Listing Details</a></p>
					<ul>
						<li>ID: ' . $listing->id . '</li>
						<li>State: ' . $listing->state . '</li>
						<li>County: ' . $listing->county . '</li>
						<li>Price: ' . $listing->price . '</li>
						<li>Acreage: ' . $listing->acreage . '</li>
						<li>Listing: Agent: ' . $listing->first_name . " " . $listing->last_name . '</li>
					<ul>
					</div>
				</div>');
			}
			?>
				
				
	
				
				<div class="featured_content row">
					<div class="col-sm-12">
						<div class="row featured_row_wrap">
							<?php
								$premium_listings = Session::get('premium_listings');
								$for_each_counter = 0;
								foreach($premium_listings as  $listing)
								{
									if($for_each_counter == 4)
										{
										 break;
										}
									$photo = DB::table('photos')->where('photos.listing_id', '=', $listing->id)->get();
									
									if($photo == NULL)
									{
										$photo = '1/no_image';
									}
									else
									{
										$photo = $photo[0]->src;
									}
							
							
									
									echo(
									'	
										<a href="single_listings?id=' . $listing->id . '">
										<div class="col-sm-3 premium_listing_wrap">
											<img src="photos/' . $photo. '.jpg" width="100%" height="160px">
											<p>' . $listing->city . "," . $listing->state . " " . $listing->price . '</p>
										</div>
										</a>
	
									'
								);
								$for_each_counter++;
								}
							?>

						</div>
					</div>
				</div>
				
				<div class="featured_listings row">
					<?php
								$featured_listings = Session::get('featured_listings');
								foreach($featured_listings as  $listing)
								{
									$photo = DB::table('photos')->where('photos.listing_id', '=', $listing->id)->get();
									if($photo == NULL)
									{
										$photo = '1/no_image';
									}
									else
									{
										$photo = $photo[0]->src;
									}
							
					
									
									echo(
									'
										<div class="col-sm-12 featured_listings_wrap">
											<div class="row featured_wrap">
												<div class="col-sm-3">
													<img src="photos/' . $photo . '.jpg" width="100%" height="160px">
												</div>
											
												<div class="col-sm-7">
													<a href="single_listings?id=' . $listing->id . '"><h4>' . $listing->title . " - " . $listing->county . ", ". $listing->state . " " . $listing->zip_code . '</h4></a>
													<ul>
														<li>ID#: ' . $listing->id . '</li>
														<li>Price: ' . $listing->price . '</li>
														<li>Acreage: ' . $listing->acreage . '</li>
													</ul>
													
													<p><span class="description_text">Description: </span>' .
														substr($listing->description,0,150) . '</br>
														<span class="more_details"> <a href="single_listings?id=' . $listing->id . '"> See Full Listing Details </a></span>
														</p>
												</div>
											
												<div class="col-sm-2">
													realator pic
												</div>
											</div>
										</div>
									');
								}
					?>
				</div>
				
				<div class="regular_listings row">
					<?php
						$basic_listings = Session::get('basic_listings');
						foreach($basic_listings as  $listing)
						{
							$photo = DB::table('photos')->where('photos.listing_id', '=', $listing->id)->get();
							
							if($photo == NULL)
							{
								$photo = '1/no_image';
							}
							else
							{
								$photo = $photo[0]->src;
							}
							
							echo(
							'
								<div class="col-sm-12">
									<div class="row regular_listings_wrap">
										<div class="col-sm-3">
											<img src="photos/' . $photo . '.jpg" width="100%" height="160px">
										</div>
										
										<div class="col-sm-8">
											<a href="single_listings?id=' . $listing->id . '"><h4>' . $listing->title . " - " . $listing->county . ", ". $listing->state . " " . $listing->zip_code . '</h4></a>
											<ul>
												<li>ID#: ' . $listing->id . '</li>
												<li>Price: ' . $listing->price . '</li>
												<li>Acreage: ' . $listing->acreage . '</li>
											</ul>
													
											<p><span class="description_text">Description: </span>' .
												substr($listing->description,0,150) . '</br>
												<span class="more_details"> <a href="single_listings?id=' . $listing->id . '"> See Full Listing Details </a></span>
											</p>
										</div>
										
										<div class="col-sm-1">
										</div>
									</div>
								</div>
							');
						}
					?>

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



<!--
	<div class="errors">
		<ul>
		 <?php /* 
		    foreach($errors->all() as $message)
			{
        echo("<li>" . $message . "</li>");
		}
		
		if(Session::has('failed_login'))
		{
			echo("<li>" . Session::get('failed_login')  . "</li>");
		}
		
		*/
							  
		
		?>
		</ul>
	</div>
	
	-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
		<script>
  
  
  // Function for grabbing counties based on state
  $('.state').change(function(){

	current_state = $('.state').val();
	  $.ajax({
        url: 'ajax', 
        type: "POST",
        data: ({state: current_state}),
		success:function(data) {
			data = JSON.parse(data);
			i = 0;
			
			$('.county').find('option').remove(); // remove current select options
			
			$('.county')
			.append($("<option></option>")
			.attr("value","")
			.text("County"));
			
			while(i < data.length) // loop through and append new selects
			{
				$('.county')
				.append($("<option></option>")
				.attr("value",data[i].county)
				.text(data[i].county));
				i++;
			}
		
		}
		});
		
	});
	
	</script>

	
	<script>
		$( document ).ready(function() {
			slider_array = $('.top_content');
			slider_length = slider_array.length;
			i = 1;
			while( i < slider_length)
				{
					$(slider_array[i]).css("display", "none");
					i++;
				}
				
		   current_slide = 0;
		   
		   $('.right').click(function()
		   {
				$(slider_array[current_slide]).css("display", "none");
				
				if(current_slide  == slider_length -1)
				{
			    current_slide = 0;
				$(slider_array[current_slide]).css("display", "block");
				}
				else
				{
				current_slide++;
				$(slider_array[current_slide]).css("display", "block");
				}
		   });
		   
		   
		   $('.left').click(function()
		   {
				$(slider_array[current_slide]).css("display", "none");
				
				if(current_slide == 0)
				{
					current_slide = slider_length -1;
					$(slider_array[current_slide]).css("display", "block");
				}
				else
				{
					current_slide--;
					$(slider_array[current_slide]).css("display", "block");
				}
		   });
		   
		});
	</script>

  </body>
</html>